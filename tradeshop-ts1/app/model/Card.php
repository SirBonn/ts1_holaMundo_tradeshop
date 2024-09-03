<?php
class Card{

    public $card_name;
    public $card_number;
    public $card_cvv;
    public $card_expiration;

    public function __construct($card_name, $card_number, $card_cvv, $card_expiration) {
        $this->card_name = $card_name;
        $this->card_number = $card_number;
        $this->card_cvv = $card_cvv;
        $this->card_expiration = $card_expiration;
    }

    public function getName() {
        return $this->card_name;
    }

    public function getNumber() {
        return $this->card_number;
    }

    public function getCvv() {
        return $this->card_cvv;
    }

    public function getExpiration() {
        return $this->card_expiration;
    }

    public function toString() {
        return $this->card_name . " -- " . $this->card_number . " -- " . $this->card_cvv . " -- " . $this->card_expiration;
    }
}