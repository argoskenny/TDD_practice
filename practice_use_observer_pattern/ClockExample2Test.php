<?php
require('ClockExample2.php');
// require('ClockExample2-2.php');

use PHPUnit\Framework\TestCase;

class ClockExample2Test extends TestCase
{
    public function testClockDriver() {
        $timeSource = new MockTimeSource();
        $timeSink = new MockTimeSink();
        $clockDriver = new ClockDriver($timeSource, $timeSink);
        
        $timeSource->setTime(15,30,50);
        $this->assertEquals(15, $timeSink->getHour());
        $this->assertEquals(30, $timeSink->getMin());
        $this->assertEquals(50, $timeSink->getSec());

        $timeSource->setTime(4,5,6);
        $this->assertEquals(4, $timeSink->getHour());
        $this->assertEquals(5, $timeSink->getMin());
        $this->assertEquals(6, $timeSink->getSec());

    }
}