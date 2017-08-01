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
        $this->assertTrue(true);
    }

    public function testCronCase()
    {
        $date = '40 09 01 08 2';
        $schedule = new Schedule($date);
        $this->assertTrue($schedule->cron('* * * * *'));
        $this->assertTrue($schedule->cron('40 * * * *'));
        $this->assertTrue($schedule->cron('40 * 01 * *'));
        $this->assertTrue($schedule->cron('* * 01 08 02'));
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

}