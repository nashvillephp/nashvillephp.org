<?php

namespace App\Http\Controllers;

use DMS\Service\Meetup\MeetupKeyAuthClient;

class IndexController extends Controller
{
    /**
     * The root home page
     *
     * @return Response
     */
    public function home()
    {
        // Default values for the next meetup.
        $nextMeetup = [
            'name' => 'Our Next Meetup',
            'description' => '<p>Our regular meetings are held on the second Tuesday of each month at 6pm.</p>',
            'link' => 'https://www.meetup.com/nashvillephp/',
            'photo' => '',
        ];

        // Fetch next meetup information from Meetup.com.
        try {
            $meetup = MeetupKeyAuthClient::factory([
                'scheme' => 'https',
                'key' => config('meetup.api_key'),
            ]);

            $meetupEvents = $meetup->getGroupEvents([
                'urlname' => 'nashvillephp',
                'scroll' => 'next_upcoming',
                'status' => 'upcoming',
                'only' => 'name,status,time,utc_offset,yes_rsvp_count,link,description,visibility,featured_photo',
            ]);

            foreach ($meetupEvents->getData() as $event) {
                if (stripos($event['name'], 'lunch') === false) {
                    // Get the next event that's not a lunch.
                    $nextMeetup = array_merge($nextMeetup, $event);
                    break;
                }
            }
        } catch (\Exception $e) {
            // Do nothing; use the $nextMeetup default values.
        }

        return view('welcome', [
            'nextMeetup' => $nextMeetup,
        ]);
    }
}
