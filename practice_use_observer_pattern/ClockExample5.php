<?php
interface Observer
{
    public function update();
}

class MockTimeSink implements Observer
{
    private $hour;
    private $min;
    private $sec;
    private $timeSource;

    public function __construct(TimeSource $timeSource) {
        $this->timeSource = $timeSource;
    }

    public function update() {
        $this->hour = $this->timeSource->getHour();
        $this->min = $this->timeSource->getMin();
        $this->sec = $this->timeSource->getSec();
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
    public function getHour();
    public function getMin();
    public function getSec();
}

// 專責處理註冊與更新事宜
class Subject {

    private $observers;

    public function registerObserver(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update();
        }
    }
}

class MockTimeSource extends Subject implements TimeSource
{
    private $hour;
    private $min;
    private $sec;

    public function setTime($hour, $min, $sec) {
        $this->hour = $hour;
        $this->min = $min;
        $this->sec = $sec;
        $this->notify();
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