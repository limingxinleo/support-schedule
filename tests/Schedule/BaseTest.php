<?php
// +----------------------------------------------------------------------
// | BaseTest.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests\Str;

use limx\Support\Schedule;
use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{
    public function testBaseCase()
    {
        $schedule = new Schedule();
        if ($schedule->everyMinute()) {
            $this->assertTrue(true);
        }
    }

    public function testCronCase()
    {
        $date = '40 09 01 08 2';
        $schedule = new Schedule($date);
        $this->assertTrue($schedule->cron('* * * * *'));
        $this->assertTrue($schedule->cron('40 * * * *'));
        $this->assertTrue($schedule->cron('40 * 01 * *'));
        $this->assertTrue($schedule->cron('* * 01 08 02'));
        $this->assertTrue($schedule->cron('*/2 * * * *'));
        $this->assertTrue($schedule->cron('40,*/3 * * * *'));
        $this->assertTrue($schedule->cron('*/3,40 * * * 2'));
    }

    public function testDailyCase()
    {
        $date = '0 0 01 08 2';
        $schedule = new Schedule($date);
        $this->assertTrue($schedule->daily());

        $date = '3 0 01 08 2';
        $schedule = new Schedule($date);
        $this->assertFalse($schedule->daily());
    }

    public function testDailyAtCase()
    {
        $date = '0 0 01 08 2';
        $schedule = new Schedule($date);
        $this->assertFalse($schedule->dailyAt(0, 3));

        $date = '3 0 04 08 2';
        $schedule = new Schedule($date);
        $this->assertTrue($schedule->dailyAt(0, 3));
    }

    public function testEveryMinuteCase()
    {
        $date = '33 10 01 08 2';
        $schedule = new Schedule($date);
        $this->assertTrue($schedule->everyMinute());
    }

    public function testEveryFiveMinuteCase()
    {
        $date = '15 10 01 08 2';
        $schedule = new Schedule($date);
        $this->assertTrue($schedule->everyFiveMinute());

        $date = '18 10 01 08 2';
        $schedule = new Schedule($date);
        $this->assertFalse($schedule->everyFiveMinute());
    }

    public function testHourlyCase()
    {
        $date = '18 10 01 08 2';
        $schedule = new Schedule($date);
        $this->assertFalse($schedule->hourly());

        $date = '00 12 01 08 2';
        $schedule = new Schedule($date);
        $this->assertTrue($schedule->hourly());
    }

    public function testHourlyAtCase()
    {
        $date = '22 10 01 08 2';
        $schedule = new Schedule($date);
        $this->assertFalse($schedule->hourlyAt(18));
        $this->assertTrue($schedule->hourlyAt(22));
    }

}