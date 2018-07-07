<?php
class MemberDiscount
{
    public function getDiscount($memberLevel, $totalPrice, $quantity) {
        if (is_numeric($totalPrice) == false || is_numeric($quantity) == false) {
            return 'totalPrice or quantity not number';
        }
        switch ($memberLevel) {
            case 'vip':
                return $this->getVIPDiscount($totalPrice, $quantity);
            case 'normal':
                return $this->getNormalDiscount($totalPrice, $quantity);
            default:
                return $this->getNoneMemberDiscount($totalPrice, $quantity);
        }
    }
    
    private function getVIPDiscount($totalPrice, $quantity) {
        return $totalPrice < 500 ? 1.0 : 0.8;
    }

    private function getNormalDiscount($totalPrice, $quantity) {
        if ($totalPrice >= 1000 && $quantity >= 3) {
            return 0.85;
        }
        return 1.0;
    }
    
    private function getNoneMemberDiscount($totalPrice, $quantity) {
        return 1.0;
    }
}
