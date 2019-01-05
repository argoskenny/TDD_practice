<?php
require('HarryPotter.php');

use PHPUnit\Framework\TestCase;

class HarryPotterTest extends TestCase
{
    public function testHarryPotter() {
        $harryPotter = new HarryPotter();
        $this->assertEquals(100, $harryPotter->getTotalPriceByQuantity(1));
        $this->assertEquals(190, $harryPotter->getTotalPriceByQuantity(2));
        $this->assertEquals(270, $harryPotter->getTotalPriceByQuantity(3));
        $this->assertEquals(320, $harryPotter->getTotalPriceByQuantity(4));
        $this->assertEquals(375, $harryPotter->getTotalPriceByQuantity(5));
        $this->assertEquals(450, $harryPotter->getTotalPriceByQuantity(6));

        $this->assertEquals(0, $harryPotter->getTotalPriceByQuantity("aklscnaklsncklancs"));
    }
}