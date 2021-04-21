<?php
class db
{
    public $database;
    public $controller;
    /**
     * @return mixed
     */
    public function getDb()
    {
        return $this ->database= mysqli_connect('localhost', 'root', '', 'e_estekhdam');
    }
    /**
     * @return mixed
     */
//    public function getController()
//    {
//        include_once 'core/controller.php';
//        $controller = new controller();
////        return $this ->$controller;
//    }


}