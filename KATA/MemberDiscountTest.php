<?php
require('MemberDiscount.php');

use PHPUnit\Framework\TestCase;

class MemberDiscountTest extends TestCase
{
    public function testMemberDiscount() {
        $memberDiscount = new MemberDiscount();
        $this->assertEquals(1.0, $memberDiscount->getDiscount('vip', 300, 5));
        $this->assertEquals(0.8, $memberDiscount->getDiscount('vip', 800, 3));
        $this->assertEquals(0.85, $memberDiscount->getDiscount('normal', 1100, 3));
        $this->assertEquals(1.0, $memberDiscount->getDiscount('normal', 1100, 1));
        $this->assertEquals(1.0, $memberDiscount->getDiscount('normal', 800, 5));

        $this->assertEquals(1.0, $memberDiscount->getDiscount('bbb', 800, 5));
        $this->assertEquals(1.0, $memberDiscount->getDiscount('bbb', 5000, 50));
        $this->assertEquals(0.8, $memberDiscount->getDiscount('vip', 5000, -1));
        $this->assertEquals('totalPrice or quantity not number', $memberDiscount->getDiscount('vip', 'ggg', 'ggg'));
    }
}