<?php

class Trade{
    public $id_trade;
    public $date;
    public $offer;
    public $type;

    public function __construct($id_trade, $date, $type){
        $this->id_trade = $id_trade;
        $this->date = $date;
        $this->type = $type;
    }

    public function getID(){
        return $this->id_trade;
    }

    public function getDate(){
        return $this->date;
    }

    public function setOffer($offer){
        $this->offer = $offer;
    }

    public function getOffer(){
        return $this->offer;
    }

    public function getType(){
        return $this->type;
    }

    public function __toString(){
        return $this->id_trade . " " . $this->date . " " . $this->offer . " " . $this->type;
    }

}

?>