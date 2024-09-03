<?php
class Shipment{
    public $id_shipment;
    public $emitedDate;
    public $receivedDate;
    public $thirdPersonShip;
    public $emisorDPI;
    public $receiverDPI;
    public $tradeUIDC;

    public function __construct($id_shipment, $emitedDate, $receivedDate, $thirdPersonShip, $emisorDPI, $receiverDPI, $tradeUIDC){
        $this->id_shipment = $id_shipment;
        $this->emitedDate = $emitedDate;
        $this->receivedDate = $receivedDate;
        $this->thirdPersonShip = $thirdPersonShip;
        $this->emisorDPI = $emisorDPI;
        $this->receiverDPI = $receiverDPI;
        $this->tradeUIDC = $tradeUIDC;
    }

    public function getID(){
        return $this->id_shipment;
    }

    public function getEmitedDate(){
        return $this->emitedDate;
    }

    public function getReceivedDate(){
        return $this->receivedDate;
    }

    public function getThirdPersonShip(){
        return $this->thirdPersonShip;
    }

    public function getEmisorDPI(){
        return $this->emisorDPI;
    }

    public function getReceiverDPI(){
        return $this->receiverDPI;
    }

    public function getTradeUIDC(){
        return $this->tradeUIDC;
    }

    public function __toString(){
        return $this->id_shipment . " " . $this->emitedDate . " " . $this->receivedDate . " " . $this->thirdPersonShip . " " . $this->emisorDPI . " " . $this->receiverDPI . " " . $this->tradeUIDC;
    }

}