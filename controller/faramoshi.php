<?php


class faramoshi extends controller
{
    public function __construct()
    {
        if (!isset($_SESSION['logIn'])) {

            if (!isset($_GET['Token'])) {
                if (!isset($_POST['Email'])) {
                    $this->loadView('faramoshi');
                } else {
                    $this->loadModel('faramoshi');
                }
            } else {
                $this->loadModel('reset');
            }
        }else{
            $this->redirect('PanelUser');
        }
    }

}