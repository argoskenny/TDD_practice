<?php

$f = new FizzBuzz();
$f->set();

class FizzBuzz
{
    private $data;

    public function set() {
        for ($i=1; $i <= 100; $i++) { 
            $result = "";
            if ($i % 3 == 0) {
                $result .= "fizz";
            }
            if ($i % 5 == 0) {
                $result .= "buzz";
            }
            $this->data[$i] = $result;
            echo $i." - ".$result."<br>";
        }
    }

    public function getPrintText($index) {
        return $this->data[$index];
    }
}
