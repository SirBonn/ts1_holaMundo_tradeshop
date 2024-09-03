<?php
class User{

    private $DPI;
    private $username;
    private $usrpass;
    private $email;
    private $rol;
    private $isActive;

    public function __construct($DPI, $username, $usrpass, $email, $rol, $isActive){
        $this->DPI = $DPI;
        $this->username = $username;
        $this->usrpass = $usrpass;
        $this->email = $email;
        $this->rol = $rol;
        $this->isActive = $isActive;
    }

    public function getDPI(){
        return $this->DPI;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getUsrpass(){
        return $this->usrpass;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getRol(){
        return $this->rol;
    }

    public function getIsActive(){
        return $this->isActive;
    }

    public function __toString(){
        return $this->DPI . " " . $this->username . " " . $this->usrpass . " " . $this->email . " " . $this->rol . " " . $this->isActive;
    }

}

?>