<?php

class Clock
{
    public $hour = 15;
    public $min = 15;
    public $sec = 15;
}

class MyClock
{
    private $clock;

    public function displayTime() {
        $this->clock = new Clock();
        while (true) {
            sleep(1);
            $hour = $this->clock->hour;
            $min = $this->clock->min;
            $sec = $this->clock->sec;
            $this->showTime($hour, $min, $sec);
        }
    }
    
    private function showTime($hour, $min, $sec) {
        echo "H:".$hour." M:".$min." S:".$sec;
    }
}

$myClock = new MyClock();
$myClock->displayTime();