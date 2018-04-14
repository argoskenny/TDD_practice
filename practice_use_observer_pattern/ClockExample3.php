<?php
interface ClockObserver
{
    public function update($hour, $min, $sec);
}

class MockTimeSink implements ClockObserver
{
    private $hour;
    private $min;
    private $sec;

    public function update($hour, $min, $sec) {
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