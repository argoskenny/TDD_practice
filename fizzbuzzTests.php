<?php
require('fizzbuzz.php');

use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    public function testFizzBuzz() {
        $fizzbuzz = new Fizzbuzz();
        $this->assertEquals("", $fizzbuzz->getStringByNumber(2));
        $this->assertEquals("fizz", $fizzbuzz->getStringByNumber(9));
        $this->assertEquals("buzz", $fizzbuzz->getStringByNumber(20));
        $this->assertEquals("fizzbuzz", $fizzbuzz->getStringByNumber(30));
    }
}