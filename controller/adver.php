<?php

//$_SESSION['id'] = ;
class adver extends controller
{
    public function __construct()
    {
        if (empty($_GET['id'])) {
            $this -> loadView('advertises');
        } else {

             $this->loadView('adv');
               
        }
        
    }
}