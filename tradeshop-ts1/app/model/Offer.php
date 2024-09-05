<?php
class Offer
{
    public $id_offer;
    public $date;
    public $amount;
    public $paidProduct;
    public $state;
    public $message;
    public $dpiTrader;
    public $post;

    public function __construct(
        $id_offer,
        $date,
        $amount,
        $state,
        $message

    ) {
        $this->id_offer = $id_offer;
        $this->date = $date;
        $this->amount = $amount;
        $this->state = $state;
        $this->message = $message;
    }

    public function getId()
    {
        return $this->id_offer;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setPaidProduct($paidProduct)
    {
        $this->paidProduct = $paidProduct;
    }

    public function getPaidProduct()
    {
        return $this->paidProduct;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setTrader($dpiTrader)
    {
        $this->dpiTrader = $dpiTrader;
    }

    public function getTrader()
    {
        return $this->dpiTrader;
    }

    public function setPost($post)
    {
        $this->post = $post;
    }

    public function getPost()
    {
        return $this->post;
    }

    public function toString()
    {
        return $this->id_offer . " -- " . $this->date . " -- " . $this->amount . " -- " . $this->paidProduct . " -- " . $this->state . " -- " . $this->message . " -- " . $this->dpiTrader;
    }
}
