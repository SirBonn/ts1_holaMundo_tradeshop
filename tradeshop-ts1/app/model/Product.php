<?php 
class Product {
    public $id_product;
    public $name_product;
    public $price_product;
    public $description_product;
    public $isIntercambiable;

    public function __construct($id_product, $name_product, $description_product, $price_product, $isIntercambiable) {
        $this->id_product = $id_product;
        $this->name_product = $name_product;
        $this->price_product = $price_product;
        $this->description_product = $description_product;
        $this->isIntercambiable = $isIntercambiable;
    }
    

    public function getName() {
        return $this->name_product;
    }

    public function getPrice() {
        return $this->price_product;
    }

    public function getDescription() {
        return $this->description_product;
    }

    public function isIntercambiable() {
        return $this->isIntercambiable;
    }

    public function toString() {
        return $this->name_product . " -- " . $this->price_product . " -- " . $this->description_product . " -- " . $this->isIntercambiable;
    }
}

?>