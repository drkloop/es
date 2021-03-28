<?php


class app
{
    public $controller = 'Home';
    public $e404 =false;
    public $method = 'index';
    public $params = [];

    public function __construct()
    {
//        آدرس سايت بايد اينجا وارد شه
         $URL="http://$_SERVER[HTTP_HOST]";
        $url = $this->parseURL();
       $parturl=$this->partURL();
          if(!empty($parturl[1])){
//              $this->redirect($URL);
              require_once "./view/404.phtml";
          }
//        print_r($url);
       else if(empty($url[0])){
            require_once './view/home.phtml';
        }
       elseif(!empty($url[0]))
        if (file_exists('./controller/' . $url[0] . '.php')) {
//            echo "Ok exists";
$U =$url[0];
require_once './controller/' . $url[0] . '.php';
$this->controller= new $url[0];
unset($url[0]);
//            print_r($url);
            if(!empty($url[1])) {
                if (method_exists($this->controller, $url[1])) {
                    $this->method = $url[1];
//                echo $url[1];
                    unset($url[1]);
//                print_r($url);
                    call_user_func_array([$this->controller, $this->method], $url);
                }else{
//                    $this->redirect("./$U");
                    require_once "./view/404.phtml";
                }
            }
        }else{
            if (!empty($url[0])) {
            require_once "./view/404.phtml";
            }
        }
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url_array = explode('_', $_GET['url']);
            return $url_array;
        }
    }
    public function partURL()
    {
        $URL=$_SESSION['PATH_PROJECT'];
        if (isset($_GET['url'])) {
            $flag =$_GET['url'];
            $flag=strrev($flag);
            if ($flag[0]=='/') {
//                $this->redirect($URL);
                require_once "./view/404.phtml";
            }
//            foreach ($_GET['url'] as $key){
//              echo "$key<br>";
//            }
//         echo $_GET['url'][1];
            $url_array = explode('/', $_GET['url']);
//        print_r($url_array);
            return $url_array;
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