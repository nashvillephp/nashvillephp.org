<?php
declare(strict_types=1);

namespace Tests\Feature;

use App\NextMeetup;
use Camel\CaseTransformer;
use Camel\Format\CamelCase;
use Camel\Format\SnakeCase;
use DMS\Service\Meetup\AbstractMeetupClient;
use Mockery;
use Tests\TestCase;

class NextMeetupParsesMeetupDetailsTest extends TestCase
{
    public function testParseMeetupDetails()
    {
        $meetupClient = Mockery::mock(AbstractMeetupClient::class, [
            'getGroupEvents' => Mockery::Mock([
                'getData' => [
                    [
                        'name' => 'Meetup Lunch Date',
                    ],
                    [
                        'name' => 'Another Time for LUNCH',
                    ],
                    [
                        'name' => 'Lunch Is Hot Chicken',
                    ],
                    [
                        'name' => 'PHP Monthly Meeting',
                        'link' => 'http://example.com',
                        'time' => 1519516800 * 1000,
                        'utc_offset' => 60 * 60 * 6 * 1000 * -1,
                        'duration' => 60 * 60 * 2 * 1000,
                    ],
                ],
            ]),
        ]);

        $caseTransformer = new CaseTransformer(new CamelCase(), new SnakeCase());

        $nextMeetup = new NextMeetup($meetupClient, $caseTransformer);

        $this->assertSame($meetupClient, $nextMeetup->getClient());
        $this->assertSame('PHP Monthly Meeting', $nextMeetup->getName());
        $this->assertSame('http://example.com', $nextMeetup->getLink());
        $this->assertSame(1519495200, $nextMeetup->getStartTime());
        $this->assertSame(1519502400, $nextMeetup->getEndTime());
    }

    public function testWhenMeetupRequestThrowsException()
    {
        $meetupClient = Mockery::mock(AbstractMeetupClient::class);

        $meetupClient
            ->shouldReceive('getGroupEvents')
            ->andThrow(new \Exception());

        $caseTransformer = new CaseTransformer(new CamelCase(), new SnakeCase());

        $nextMeetup = new NextMeetup($meetupClient, $caseTransformer);

        $this->assertSame('PHP Monthly Meetup', $nextMeetup->getName());
        $this->assertSame('https://www.meetup.com/nashvillephp/', $nextMeetup->getLink());
        $this->assertNull($nextMeetup->getTime());
        $this->assertNull($nextMeetup->getUtcOffset());
        $this->assertNull($nextMeetup->getDuration());
        $this->assertNull($nextMeetup->getDescription());
    }
}
