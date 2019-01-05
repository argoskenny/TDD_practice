<?php
class Fizzbuzz
{
    public function printAllNumber() {
        for ($i = 1; $i <= 100; $i++) {
            echo $i." - ".$this->getStringByNumber();
        }
    }
    
    public function getStringByNumber($number) {
        $result = "";
        if ($number % 3 == 0) {
            $result .= "fizz";
        }
        if ($number % 5 == 0) {
            $result .= "buzz";
        }
        return $result;
    }
}