<?php
class Inventory{
    public $trader_dpi;
    public $product_id;

    public function __construct($trader_dpi, $product_id) {
        $this->trader_dpi = $trader_dpi;
        $this->product_id = $product_id;
    }

    public function getTraderDpi() {
        return $this->trader_dpi;
    }

    public function getProductId() {
        return $this->product_id;
    }

    public function toString() {
        return $this->trader_dpi . " -- " . $this->product_id;
    }

}

?>