<?php
declare(strict_types=1);

namespace Tests\Unit;

use App\NextLunch;
use App\Exceptions\MeetupNotFoundException;
use Camel\CaseTransformer;
use Camel\Format\CamelCase;
use Camel\Format\SnakeCase;
use DMS\Service\Meetup\AbstractMeetupClient;
use Mockery;
use Tests\TestCase;

class NextLunchTest extends TestCase
{
    public function testConstructorThrowsException()
    {
        $meetupClient = Mockery::mock(AbstractMeetupClient::class, [
            'getGroupEvents' => Mockery::Mock([
                'getData' => [
                    [
                        'name' => 'PHP Monthly Meeting',
                    ],
                ],
            ]),
        ]);

        $caseTransformer = new CaseTransformer(new CamelCase(), new SnakeCase());

        $this->expectException(MeetupNotFoundException::class);
        $this->expectExceptionMessage(
            'No lunch event could be found at Meetup.com'
        );

        $nextLunch = new NextLunch($meetupClient, $caseTransformer);
    }
}
