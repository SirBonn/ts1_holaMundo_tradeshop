<?php
class Payment {
    public $id_payment;
    public $trader_pay;
    public $trader_recipe;
    public $trade_pay;

    public function __construct($id_payment, $trader_pay, $trader_recipe, $trade_pay) {
        $this->id_payment = $id_payment;
        $this->trader_pay = $trader_pay;
        $this->trader_recipe = $trader_recipe;
        $this->trade_pay = $trade_pay;
    }

    public function getId() {
        return $this->id_payment;
    }

    public function getTraderPay() {
        return $this->trader_pay;
    }

    public function getTraderRecipe() {
        return $this->trader_recipe;
    }

    public function getTradePay() {
        return $this->trade_pay;
    }

    public function toString() {
        return $this->id_payment . " -- " . $this->trader_pay . " -- " . $this->trader_recipe . " -- " . $this->trade_pay;
    }
}
?>