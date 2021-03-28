<?php


class dargEr extends controller
{
    public  $Sucses='';
    public function __construct()
    {
        $this->loadModel('er');
        if ( $this->Sucses==='Sucses') {
            $_SESSION['Sucses']='Sucses';
            $this->redirect('./home');
        }
        $this -> loadView('er');
    }
}