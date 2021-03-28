<?php


class Out extends controller
{
    public function __construct()
    {
        session_destroy();
        $this->loadModel('Out');
    }
}