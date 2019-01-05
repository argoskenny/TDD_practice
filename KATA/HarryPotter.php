<?php

class HarryPotter
{
    private $bookPrice = 100;

    public function getTotalPriceByQuantity($quantity) {
        if ($quantity <= 0) {
            return 0;
        }
        if ($quantity == 1) {
            return $quantity * $this->bookPrice;
        }
        if ($quantity == 2) {
            return $quantity * $this->bookPrice * 0.95;
        }
        if ($quantity == 3) {
            return $quantity * $this->bookPrice * 0.9;
        }
        if ($quantity == 4) {
            return $quantity * $this->bookPrice * 0.8;
        } 
        if ($quantity >= 5) {
            return $quantity * $this->bookPrice * 0.75;
        }
        writeLog("不是數字");
        return 0;
    }
    
}

interface SaleCalculate {
    function calculateSalePrice($bookPrice, $quantiy);
}

class NormalSale implements SaleCalculate
{
    public function calculateSalePrice($bookPrice, $quantiy) {
        return $bookPrice * $quantiy;
    }   
}

class TwoSale implements SaleCalculate
{
    public function calculateSalePrice($bookPrice, $quantiy) {
        return $bookPrice * $quantiy * 0.95;
    }   
}

class ThreeSale implements SaleCalculate
{
    public function calculateSalePrice($bookPrice, $quantiy) {
        return $bookPrice * $quantiy * 0.9;
    }   
}

class FourSale implements SaleCalculate
{
    public function calculateSalePrice($bookPrice, $quantiy) {
        return $bookPrice * $quantiy * 0.8;
    }   
}

class FiveUpSale implements SaleCalculate
{
    public function calculateSalePrice($bookPrice, $quantiy) {
        return $bookPrice * $quantiy * 0.75;
    }   
}

