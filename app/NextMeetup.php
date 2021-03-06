<?php
declare(strict_types=1);

namespace App;

use Camel\CaseTransformerInterface;
use DateTime;
use DateTimeZone;
use DMS\Service\Meetup\AbstractMeetupClient;

/**
 * Represents the next Meetup.com event for Nashville PHP
 */
class NextMeetup
{
    use ValueObjectTrait;

    /**
     * Parameters to use when requesting group events from Meetup.com
     */
    private const GROUP_EVENTS_PARAMS = [
        'urlname' => 'nashvillephp',
        'scroll' => 'next_upcoming',
        'status' => 'upcoming',
        'fields' => 'description_images,event_hosts,featured,featured_photo,group_key_photo,group_photo'
            . ',plain_text_description,plain_text_no_images_description,short_link',
    ];

    /**
     * The raw details for the event
     *
     * @var array
     */
    private $nextMeetupDetails = [];

    /**
     * The client used when sending requests to Meetup.com
     *
     * @var AbstractMeetupClient
     */
    private $client;

    /**
     * Creates an object representing the next event by loading data from Meetup.com
     *
     * @param AbstractMeetupClient $client The client to use for Meetup.com requests
     * @param CaseTransformerInterface $caseTransformer A transformer for converting method names
     */
    public function __construct(
        AbstractMeetupClient $client,
        CaseTransformerInterface $caseTransformer
    ) {
        $this->client = $client;
        $this->setCaseTransformer($caseTransformer);

        try {
            $this->nextMeetupDetails = $this->loadNextMeetup($client);
        } catch (\Exception $e) {
            // Do nothing. The allows the NextMeetup to return null for requested data.
        }
    }

    /**
     * Returns the client used when making requests to Meetup.com
     *
     * @return AbstractMeetupClient
     */
    public function getClient(): AbstractMeetupClient
    {
        return $this->client;
    }

    /**
     * Returns the raw array of data for the value object
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->getNextMeetupDetails();
    }

    /**
     * Returns the raw array of meeting details for the next Meetup
     *
     * @return array
     */
    public function getNextMeetupDetails(): array
    {
        return $this->nextMeetupDetails;
    }

    /**
     * Returns the name of the next Meetup, or the default meeting name
     *
     * @return string
     */
    public function getName(): string
    {
        if (empty($this->getNextMeetupDetails()['name'])) {
            return 'PHP Monthly Meetup';
        }

        return $this->getNextMeetupDetails()['name'];
    }

    /**
     * Returns the link to the next Meetup, or the default Meetup URL
     *
     * @return string
     */
    public function getLink(): string
    {
        if (empty($this->getNextMeetupDetails()['link'])) {
            return 'https://www.meetup.com/nashvillephp/';
        }

        return $this->getNextMeetupDetails()['link'];
    }

    /**
     * Returns the event start time in seconds since the Unix epoch
     *
     * Meetup.com returns the start time as a UTC timestamp in milliseconds
     * since the Unix epoch. We add the timezone UTC offset to this and
     * divide by 1000 to determine the number of seconds.
     *
     * @return int
     */
    public function getStartTime(): int
    {
        // Convert from milliseconds to seconds.
        $time = $this->getTime() / 1000;
        $utcOffset = $this->getUtcOffset() / 1000;

        if (!$time) {
            // If this month's meeeting hasn't happened yet, then use the
            // second Tuesday of this month; otherwise, use next month.
            $time = strtotime('second tuesday of this month 6pm America/Chicago');
            if (time() > $time) {
                $time = strtotime('second tuesday of next month 6pm America/Chicago');
            }
        }

        if (!$utcOffset) {
            $timeZone = new DateTimeZone('America/Chicago');
            $dateTime = new DateTime('@' . $time, $timeZone);
            $utcOffset = $timeZone->getOffset($dateTime);
        }

        return $time + $utcOffset;
    }

    /**
     * Returns the event end time in seconds since the Unix epoch
     *
     * Meetup.com returns the event duration in milliseconds. We divide this
     * by 1000 to get the seconds and add it to the start time to determine
     * the end time.
     *
     * @return int
     */
    public function getEndTime(): int
    {
        // Convert from milliseconds to seconds.
        $duration = $this->getDuration() / 1000;

        if (!$duration) {
            // Default the duration to 2 hours.
            $duration = 60 * 60 * 2;
        }

        return $this->getStartTime() + $duration;
    }

    /**
     * Returns a photo to use for the next event
     *
     * @return string
     */
    public function getPhotoUrl(): ?string
    {
        if ($this->getFeaturedPhoto()) {
            return $this->getFeaturedPhoto()->getPhotoLink();
        }

        if ($this->getGroup() && $this->getGroup()->getKeyPhoto()) {
            return $this->getGroup()->getKeyPhoto()->getPhotoLink();
        }

        return null;
    }

    /**
     * Returns true if the meeting name indicates it is a valid meeting for this class
     *
     * The meeting name will include keywords that are used to determine if it
     * is the correct type of meeting that matches the goal of this class.
     *
     * @param string $name The meeting name
     * @return bool
     */
    protected function isValidMeeting(string $name): bool
    {
        // Return true if the meeting is not a lunch.
        return stripos($name, 'lunch') === false;
    }

    /**
     * Returns an array of the next Meetup details, requested from Meetup.com
     *
     * @param AbstractMeetupClient $client The client to use for Meetup.com requests
     * @return array
     */
    private function loadNextMeetup(AbstractMeetupClient $client): array
    {
        $details = [];
        $events = $client->getGroupEvents(self::GROUP_EVENTS_PARAMS);

        foreach ($events->getData() as $event) {
            if ($this->isValidMeeting($event['name'])) {
                $details = $event;
                break;
            }
        }

        return $details;
    }
}
