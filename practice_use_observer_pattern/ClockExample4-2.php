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

abstract class TimeSource
{
    private $clockObservers;

    public function registerObserver($clockObserver) {
        $this->clockObservers[] = $clockObserver;
    }

    protected function notify($hour, $min, $sec)
    {
        foreach ($this->clockObservers as $observer) {
            $observer->update($hour, $min, $sec);
        }
    }
}

class MockTimeSource extends TimeSource
{
    public function setTime($hour, $min, $sec) {
        $this->notify($hour, $min, $sec);
    }
}