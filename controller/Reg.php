<?php


class Reg extends controller
{
    public function __construct()
    { 
        if(!isset($_SESSION['logIn'])){
        $this->loadModel('Reg');
        }else {
           $this->loadModel('validationReg');
        }
    }
}