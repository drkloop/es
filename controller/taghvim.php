<?php


class taghvim extends controller
{
    public function __construct()
    {
        $this->loadModel('Info');
        $this->loadView('taghvim');
}
}