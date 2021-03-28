<?php
require_once 'db.php';
$database = new db();

if (isset($_SESSION['logIn']) && !isset($_GET['Token']) && !isset($_SESSION['validatiionShow'])) {
    $_SESSION['validatiionShow'] = true;
    $TOKEN = "ES_";
    $TOKEN .= uniqid("e_estekhdam", 2);
    $TOKEN .= MD5(rand());
    $TOKEN .= Sha1(rand());
    $_SESSION['TOKEN_Mail'] = $TOKEN;
    if (isset($_SESSION['Email_validation'])) {
        $dataBaseCheck = mysqli_query($database->getDb(), "SELECT * FROM user WHERE Email = '" . $_SESSION['Email_validation'] . "'   ");
        if (mysqli_num_rows($dataBaseCheck) > 0) {
            while ($row = mysqli_fetch_assoc($dataBaseCheck)) {
                $_SESSION['Name_Mail'] = $row['Name'];
                $_SESSION['Email_Mail'] = $row['Email'];
            }
            $sql = "UPDATE user SET Token='$TOKEN'   WHERE Email = '" . $_SESSION['Email_validation'] . "' ";
            if (mysqli_query($database->getDb(), $sql)) {
                if (isset($_SESSION['Email_Mail']) && isset($_SESSION['Name_Mail']) && $_SESSION['TOKEN_Mail']) {
                    echo "<div v-show='0' style='color: white'>";
                    $_SESSION['validate'] = "1";
                    controller::mailsender();
                    unset($_SESSION['validate']);
                    echo "<validate></validate>";
                    echo "</div>";
                }
            }
        }
    }
//    controller::loadView('validationReg');
} else {
//    controller::loadView('validationReg');
}
if (!isset($_SESSION['logIn'])) {
    controller::loadView('404');
}
?>
<?php
if (isset($_GET['Token']) && isset($_GET['Email'])) {
    $dataBaseCheck = mysqli_query($database->getDb(), "SELECT * FROM user WHERE Email = '" . $_GET['Email'] . "' AND Token = '" . $_GET['Token'] . "'");
    if (mysqli_num_rows($dataBaseCheck) > 0) {
        $sql = "UPDATE user SET Validate=true   WHERE Email = '" . $_GET['Email'] . "' ";
        if (mysqli_query($database->getDb(), $sql)) {
//            echo "khosh amad";
        }
        $sql = "UPDATE user SET Token=null   WHERE Email = '" . $_GET['Email'] . "' ";
        if (mysqli_query($database->getDb(), $sql)) {
//            echo "token null";
        }
        $_SESSION['validatiionShow'] = false;
    }
    controller::redirect('PanelUser');
}
if (isset($_SESSION['logIn'])) {
    $dataBaseCheck = mysqli_query($database->getDb(), "SELECT * FROM user WHERE Email = '" . $_SESSION['logIn'] . "'   ");
    if (mysqli_num_rows($dataBaseCheck) > 0) {
        while ($row = mysqli_fetch_assoc($dataBaseCheck)) {
            $validate = $row['Validate'];
            if ($validate == 1) {
                $this->loadView('panelUserMeno');
                $this->loadModel('UserInfo');
            }else{
                controller::loadView('validationReg');
            }
        }

    }
}
if (isset($_SESSION['validatiionShow']))
    if ($_SESSION['validatiionShow'] == false) {
        controller::redirect('PanelUser');
    }
