<?php
declare(strict_types=1);

namespace Tests\Unit;

use App\NextMeetup;
use DateTime;
use DateTimeZone;
use Mockery;
use phpmock\mockery\PHPMockery;
use Tests\TestCase;

class NextMeetupTest extends TestCase
{
    public function testGetPhotoUrlReturnsNullWhenNoPhotoFound()
    {
        $nextMeetup = Mockery::mock(NextMeetup::class, [
            'getFeaturedPhoto' => null,
            'getGroup' => null,
        ]);

        $nextMeetup->shouldReceive('getPhotoUrl')->passthru();

        $this->assertNull($nextMeetup->getPhotoUrl());
    }

    public function testGetPhotoUrlReturnsFeaturedPhoto()
    {
        $nextMeetup = Mockery::mock(NextMeetup::class, [
            'getFeaturedPhoto' => Mockery::mock([
                'getPhotoLink' => 'foo',
            ]),
        ]);

        $nextMeetup->shouldReceive('getPhotoUrl')->passthru();

        $this->assertEquals('foo', $nextMeetup->getPhotoUrl());
    }

    public function testGetPhotoUrlReturnsGroupPhoto()
    {
        $nextMeetup = Mockery::mock(NextMeetup::class, [
            'getFeaturedPhoto' => null,
            'getGroup' => Mockery::mock([
                'getKeyPhoto' => Mockery::mock([
                    'getPhotoLink' => 'bar',
                ]),
            ]),
        ]);

        $nextMeetup->shouldReceive('getPhotoUrl')->passthru();

        $this->assertEquals('bar', $nextMeetup->getPhotoUrl());
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function testGetStartTimeCalculatesTimeAndUtcOffsetForThisMonth()
    {
        // Consider the current time as 5pm on the second Tuesday of the
        // current month in the America/Chicago timezone. This means the
        // calculated start time should be exactly one hour from now.
        $time = strtotime('second tuesday of this month 5pm America/Chicago');
        $timeMock = PHPMockery::mock('App', 'time')->andReturn($time);

        $timeZone = new DateTimeZone('America/Chicago');
        $dateTime = new DateTime('@' . $time, $timeZone);
        $utcOffset = $timeZone->getOffset($dateTime);

        $expectedStartTime = $time + 3600 + $utcOffset;

        $nextMeetup = Mockery::mock(NextMeetup::class, [
            'getTime' => null,
            'getUtcOffset' => null,
        ]);

        $nextMeetup->shouldReceive('getStartTime')->passthru();

        $this->assertSame($expectedStartTime, $nextMeetup->getStartTime());
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function testGetStartTimeCalculatesTimeAndUtcOffsetForNextMonth()
    {
        // Consider the current time as 7pm on the second Tuesday of the
        // current month in the America/Chicago timezone. This means the
        // calculated start time should be next month.
        $time = strtotime('second tuesday of this month 7pm America/Chicago');
        $timeMock = PHPMockery::mock('App', 'time')->andReturn($time);

        $nextMonth = strtotime('second tuesday of next month 6pm America/Chicago');

        $timeZone = new DateTimeZone('America/Chicago');
        $dateTime = new DateTime('@' . $nextMonth, $timeZone);
        $utcOffset = $timeZone->getOffset($dateTime);

        $expectedStartTime = $nextMonth + $utcOffset;

        $nextMeetup = Mockery::mock(NextMeetup::class, [
            'getTime' => null,
            'getUtcOffset' => null,
        ]);

        $nextMeetup->shouldReceive('getStartTime')->passthru();

        $this->assertSame($expectedStartTime, $nextMeetup->getStartTime());
    }

    public function testGetEndTimeCalculatesDurationWhenNotFound()
    {
        $nextMeetup = Mockery::mock(NextMeetup::class, [
            'getStartTime' => 0,
            'getDuration' => null,
        ]);

        $nextMeetup->shouldReceive('getEndTime')->passthru();

        $this->assertSame(7200, $nextMeetup->getEndTime());
    }
}
