<?php


class signup extends controller
{
    public function __construct()
    {
        if (empty($_SESSION['LogIn'])) {
            $_SESSION['LogIn'] = false;
        }
        if (isset($_SESSION['logIn'])) {
           $this->redirect('./PanelUser');
        }else{

        $this->loadView('Register');
        }
    }
    public function Reg(){
        $this->redirect('./Reg');
    }


}