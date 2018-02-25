<?php
declare(strict_types=1);

namespace Tests\Feature;

use DMS\Service\Meetup\MeetupKeyAuthClient;
use Mockery;
use Tests\TestCase;

class LoadHomePageTest extends TestCase
{
    public function testHomePage()
    {
        $meetupClient = Mockery::mock(MeetupKeyAuthClient::class, [
            'getGroupEvents' => Mockery::mock([
                'getData' => [
                    [
                        'name' => 'February PHP Meeting',
                    ],
                ],
            ]),
        ]);

        $this->app->instance(MeetupKeyAuthClient::class, $meetupClient);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSeeText('February PHP Meeting');
    }
}
