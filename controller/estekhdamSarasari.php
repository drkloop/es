<?php


class estekhdamSarasari extends controller
{
    public function __construct()
    {
        if (empty($_GET['id'])) {
            $this->loadView('estekhdamSarasari');
        } else {
            $this->loadView('esSarasari');
        }

    }
}