<?php

//require_once '../model/do_register.php';
class home extends controller
{
    public function __construct()
    {
        $this->loadModel('Info');
        $this->loadView('home');

    }

}