<?php

require_once(__DIR__ . '/../interface/Payment.php');

class WingMethod implements Payment
{
    public function __construct(
        protected string $Item,
        protected float $Price,
        protected int $Qty       
    ) {}

    public function getItems()
    {
        return 'item ' . $this->Item;
    }
    public function getPrice()
    {
        return $this->Price;
    }
    public function getQty()
    {
        return $this->Qty;
    }
    public function getType()
    {
        return 'Wing';
    }
    public function getNumTotal()
    {
        return $this->Price * $this->Qty;
    }
}

?>