<?php
require('FizzBuzz.php');
// require('ClockExample2-2.php');

use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    public function testFizzBuzz() {
        $fizzBuzz = new FizzBuzz();
        $fizzBuzz->set();
        $this->assertEquals("fizz", $fizzBuzz->getPrintText(3));
        $this->assertEquals("buzz", $fizzBuzz->getPrintText(5));
        $this->assertEquals("fizzbuzz", $fizzBuzz->getPrintText(15));
        $this->assertEquals("fizz", $fizzBuzz->getPrintText(9));
        $this->assertEquals("buzz", $fizzBuzz->getPrintText(20));
        $this->assertEquals("fizzbuzz", $fizzBuzz->getPrintText(30));
        $this->assertEquals("", $fizzBuzz->getPrintText(67));
        $this->assertEquals("fizzbuzz", $fizzBuzz->getPrintText(90));
    }
}