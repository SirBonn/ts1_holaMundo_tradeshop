<?php 
class Offer{
    public $id_offer;
    public $date;
    public $amount;
    public $paidProduct;
    public $state;
    public $message;
    public $dpiTrader;

    public function __construct($id_offer, $date, $amount, $paidProduct, $state, $message, $dpiTrader) {
        $this->id_offer = $id_offer;
        $this->date = $date;
        $this->amount = $amount;
        $this->paidProduct = $paidProduct;
        $this->state = $state;
        $this->message = $message;
        $this->dpiTrader = $dpiTrader;
    }

    public function getId() {
        return $this->id_offer;
    }

    public function getDate() {
        return $this->date;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getPaidProduct() {
        return $this->paidProduct;
    }

    public function getState() {
        return $this->state;
    }

    public function getMessage() {
        return $this->message;
    }

    public function getDpiTrader() {
        return $this->dpiTrader;
    }

    public function toString() {
        return $this->id_offer . " -- " . $this->date . " -- " . $this->amount . " -- " . $this->paidProduct . " -- " . $this->state . " -- " . $this->message . " -- " . $this->dpiTrader;
    }

    
}
?>