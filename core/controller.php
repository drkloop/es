<?php


class controller
{

    public function mailsender(){
        if (file_exists('./core/phpMailSender.php')){
            require_once './core/phpMailSender.php';
        }
    }
    public function loadHome(){

        if (file_exists('./index.php')){
            require_once './index.php';
        }
    }
    public function loadModel($name)
    {
        if (file_exists('./model/' . $name . '.php')) {
            require_once './model/' . $name . '.php';

        }
    }


    public function loadView($name)
    {
        if (file_exists('./view/' . $name . '.phtml')) {
            require_once './view/' . $name . '.phtml';
        }
    }
    public function redirect($url)
    {
        if (!headers_sent())
        {
            header('Location: '.$url);
            exit;
        }
        else
        {
            echo '<script type="text/javascript">';
            echo 'window.location.href="'.$url.'";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
            echo '</noscript>';
            exit;
        }
    }

}
