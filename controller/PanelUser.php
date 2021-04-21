<?php


class PanelUser extends controller
{


    public function __construct()
    {
        if ($_GET['url'] == 'PanelUser') {
            $this->redirect('PanelUser_index');
        }
//        if (isset($_SESSION['validatiionShow']) && $_SESSION['validatiionShow'] == false):
//            if (isset($_SESSION['Register_first'])) {
//                $yse = $_SESSION['Register_first'];
//                if ($yse == "yes") {
//                    echo '<job></job>';
//                }
//                $_SESSION['Register_first'] = 'no';
//
//            }
//            if (isset($_SESSION['logIn'])) {
//                $this->loadView('404');
        $this->loadModel('UserInfo');
//            } else {
//               $this->loadView('vorod');
//            }
//        elseif (isset($_SESSION['validatiionShow']) && $_SESSION['validatiionShow'] == true):
//            $this->loadModel('validationReg');
//        else:
//            $this->loadModel('validationReg');
//        endif;
    }

    public function index()
    {
        $this->notFound = 1;
        if (isset($_SESSION['logIn'])) {
            $this->loadView('pishkhan');
        } else {
            $this->redirect('vorod');
        }
    }

    public function userAdvertise()
    {
        if (isset($_SESSION['logIn'])) {
            $this->loadView("userAdvertise");
        } else {
            $this->redirect('vorod');
        }

    }

    public function editUserAdvertise()
    {
        if (isset($_SESSION['logIn'])) {
            $url = $_SERVER["REQUEST_URI"];
            $id = parse_url($url, PHP_URL_QUERY);
            $id = explode("=", $id);
            if ($id[0] == "id" && count($id) == 2) {
                $this->loadView("editUserAdvertise");
            } else {
                $this->redirect("PanelUser_userAdvertise");
            }
        } else {
            $this->redirect('vorod');
        }
    }

    public function editResume()
    {
        if (isset($_SESSION["logIn"])) {
            $this->loadView("editResume");
        }
        else{
            $this->redirect('vorod');
        }
    }

    public function editUserInfo()
    {
        if (isset($_SESSION["logIn"])) {
            $this->loadView("editUserInfo");
        }
        else{
            $this->redirect('vorod');
        }
    }

    public function editEmail()
    {
        if (isset($_SESSION["logIn"])) {
            $this->loadView("editEmail");
        } else{
            $this->redirect('vorod');
        }
    }

    public function jobinfo()
    {
        if (isset($_SESSION["logIn"])) {
            $this->loadView("jobInfo");
        }
        else{
            $this->redirect('vorod');
        }
    }

    public function other()
    {
        if (isset($_SESSION["logIn"]) && isset($_GET["action"])) {
            $this->loadView("other");
        } else{
        $this->redirect('vorod');
    }
    }

    public function adverStared()
    {
        if (isset($_SESSION["logIn"])) {
            $this->loadView("adver_stared");
        }
        else{
            $this->redirect('vorod');
        }
    }

}