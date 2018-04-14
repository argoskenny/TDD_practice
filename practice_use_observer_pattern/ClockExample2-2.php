<?php
interface ClockObserver
{
    public function update($hour, $min, $sec);
}

class ClockDriver implements ClockObserver
{
    private $timeSource;
    private $timeSink;

    public function __construct($timeSource, $timeSink) {
        $this->timeSource = $timeSource;
        $this->timeSource->setObserver($this);
        $this->timeSink = $timeSink;
    }

    public function update($hour, $min, $sec) {
        $this->timeSink->setTime($hour, $min, $sec);
    }
}

interface TimeSource
{
    public function setObserver($clockObserver);
}

class MockTimeSource implements TimeSource
{
    private $clockObserver;

    public function setObserver($clockObserver) {
        $this->clockObserver = $clockObserver;
    }

    public function setTime($hour, $min, $sec) {
        $this->clockObserver->update($hour, $min, $sec);
    }
}

interface TimeSink
{
    public function setTime($hour, $min, $sec);
}

class MockTimeSink implements TimeSink
{
    private $hour;
    private $min;
    private $sec;

    public function setTime($hour, $min, $sec) {
        $this->hour = $hour;
        $this->min = $min;
        $this->sec = $sec;
    }

    public function getHour() {
        return $this->hour;
    }
    
    public function getMin() {
        return $this->min;
    }
    
    public function getSec() {
        return $this->sec;
    }
}