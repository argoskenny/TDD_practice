<?php
interface ISell {
    public function getPrice();
}

class Item implements ISell {
    public function getPrice() {
        return "100元";
    }
}

abstract class SellDeco implements ISell {
    protected $sell;
    
    public function __construct(ISell $sell) {
       $this->sell = $sell;
    }
    
   abstract public function getPrice();
}

class BuyManyRebateDeco extends SellDeco {
    public function getPrice() {
        return "滿千送百的".$this->sell->getPrice();
    }
}

class PresentOffDeco extends SellDeco {
    public function getPrice() {
        return "88折的".$this->sell->getPrice();
    }
}

class XMasDeco extends SellDeco {
    public function getPrice() {
        return "聖誕節特賣的".$this->sell->getPrice();
    }
}

$Item = new Item();
$buyManyRebateItem = new BuyManyRebateDeco($Item);
$presentOffItem = new PresentOffDeco($buyManyRebateItem);
$xMasDecoItem = new XMasDeco($presentOffItem);
$price = $xMasDecoItem->getPrice();
echo $price;