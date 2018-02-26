<?php
declare(strict_types=1);

namespace Tests\Feature;

use App\NextLunch;
use Camel\CaseTransformer;
use Camel\Format\CamelCase;
use Camel\Format\SnakeCase;
use DMS\Service\Meetup\AbstractMeetupClient;
use Mockery;
use Tests\TestCase;

class NextLunchFindsNextLunchMeetupTest extends TestCase
{
    public function testGetNextLunch()
    {
        $meetupClient = Mockery::mock(AbstractMeetupClient::class, [
            'getGroupEvents' => Mockery::Mock([
                'getData' => [
                    [
                        'name' => 'PHP Monthly Meeting',
                    ],
                    [
                        'name' => 'Another Monthly Meeting',
                    ],
                    [
                        'name' => 'Hot Chicken Meeting',
                    ],
                    [
                        'name' => 'Hot Chicken Lunch',
                        'link' => 'http://example.com',
                        'time' => 1519516800 * 1000,
                        'utc_offset' => 60 * 60 * 6 * 1000 * -1,
                        'duration' => 60 * 60 * 2 * 1000,
                    ],
                    [
                        'name' => 'BBQ Lunch',
                    ],
                ],
            ]),
        ]);

        $caseTransformer = new CaseTransformer(new CamelCase(), new SnakeCase());

        $nextLunch = new NextLunch($meetupClient, $caseTransformer);

        $this->assertSame($meetupClient, $nextLunch->getClient());
        $this->assertSame('Hot Chicken Lunch', $nextLunch->getName());
        $this->assertSame('http://example.com', $nextLunch->getLink());
        $this->assertSame(1519495200, $nextLunch->getStartTime());
        $this->assertSame(1519502400, $nextLunch->getEndTime());
    }
}
