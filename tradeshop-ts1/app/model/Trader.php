<?php
class Trader
{
    public $dpi_user;
    public $name;
    public $forename;
    public $address;
    public $card;
    public $phone;
    public $birth;

    public function __construct($dpi_user, $name, $forename, $address, $card, $phone, $birth)
    {
        $this->dpi_user = $dpi_user;
        $this->name = $name;
        $this->forename = $forename;
        $this->address = $address;
        $this->card = $card;
        $this->phone = $phone;
        $this->birth = $birth;
    }

    public function getDPI()
    {
        return $this->dpi_user;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getForename()
    {
        return $this->forename;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getCard()
    {
        return $this->card;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getBirth()
    {
        return $this->birth;
    }

    public function __toString()
    {
        return $this->dpi_user . " " . $this->name . " " . $this->forename . " " . $this->address . " " . $this->card . " " . $this->phone . " " . $this->birth;
    }
}
