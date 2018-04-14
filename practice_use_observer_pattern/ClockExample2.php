<?php
class ClockDriver
{
    private $timeSource;
    private $timeSink;

    public function __construct($timeSource, $timeSink) {
        $this->timeSource = $timeSource;
        $this->timeSource->setDriver($this);
        $this->timeSink = $timeSink;
    }

    public function update($hour, $min, $sec) {
        $this->timeSink->setTime($hour, $min, $sec);
    }
}

interface TimeSource
{
    public function setDriver($driver);
}

class MockTimeSource implements TimeSource
{
    private $driver;

    public function setDriver($driver) {
        $this->driver = $driver;
    }
    
    public function setTime($hour, $min, $sec) {
        $this->driver->update($hour, $min, $sec);
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