<?php
declare(strict_types=1);

namespace App;

use App\Exceptions\MeetupNotFoundException;
use Camel\CaseTransformerInterface;
use DMS\Service\Meetup\AbstractMeetupClient;

/**
 * Represents the next Meetup.com lunch for Nashville PHP
 */
class NextLunch extends NextMeetup
{
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
        parent::__construct($client, $caseTransformer);

        if (empty($this->getNextMeetupDetails())) {
            throw new MeetupNotFoundException(
                'No lunch event could be found at Meetup.com'
            );
        }
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
        // Return true if the meeting is a lunch
        return stripos($name, 'lunch') !== false;
    }
}
