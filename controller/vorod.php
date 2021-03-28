<?php


class vorod extends controller
{
public function __construct()
{
    $this->loadModel('Info');
    $this->loadView('vorod');
}
}