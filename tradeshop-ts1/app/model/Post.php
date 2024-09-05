<?php
class Post{
    public $id_post; 
    public $traderDPI;
    public $productID;
    public $date;
    public $description;
    public $isAvailable;

    public function __construct($id_post,  $date, $description, $isAvailable){
        $this->id_post = $id_post;
        $this->date = $date;
        $this->description = $description;
        $this->isAvailable = $isAvailable;
    }

    public function getID(){
        return $this->id_post;
    }

    public function getTrader(){
        return $this->traderDPI;
    }

    public function getProduct(){
        return $this->productID;
    }

    public function getDate(){
        return $this->date;
    }

    public function getDescription(){
        return $this->description;
    }


    public function getIsAvailable(){
        return $this->isAvailable;
    }

    public function setProduct($product){
        $this->productID = $product;
    }

    public function setTrader($trader){
        $this->traderDPI = $trader;
    }

}