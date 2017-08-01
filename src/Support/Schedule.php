<?php
// +----------------------------------------------------------------------
// | Cron.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace limx\Support;

class Schedule
{
    // 分钟[0-59] 小时[0-23] 天[1-31] 月[1-12] 星期几[0-6]
    public $expression = '* * * * *';

    protected $now = '';

    public function __construct($date = null)
    {
        $this->now = isset($date) ? $date : date('i H d m w');
    }

    public function cron($expression)
    {
        $expected = explode(' ', $expression);
        $actual = explode(' ', $this->now);
        foreach ($expected as $i => $v) {
            if ($v != '*' && intval($expected[$i]) !== intval($actual[$i])) {
                return false;
            }
        }
        return true;
    }

    public function daily()
    {
        return $this->cron('0 0 * * *');
    }

    public function dailyAt($hour, $minute)
    {
        return $this->cron("{$minute} {$hour} * * *");
    }

    public function everyMinute()
    {
        return $this->cron("* * * * *");
    }

}