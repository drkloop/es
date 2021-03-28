<?php
require_once 'db.php';
if (isset($_SESSION['captcha'])):
    $database = new db();
    $TOKEN = "ES_";
    $TOKEN .= uniqid("e_estekhdam", 2);
    $TOKEN .= MD5(rand());
    $TOKEN .= Sha1(rand());
    $_SESSION['TOKEN_Mail'] = $TOKEN;
    if (isset($_POST['Email'])) {
        $dataBaseCheck = mysqli_query($database->getDb(), "SELECT * FROM user WHERE Email = '" . $_POST['Email'] . "'   ");
        if (mysqli_num_rows($dataBaseCheck) > 0) {
            while ($row = mysqli_fetch_assoc($dataBaseCheck)) {
                $_SESSION['Name_Mail'] = $row['Name'];
                $_SESSION['Email_Mail'] = $row['Email'];
            }
            $sql = "UPDATE user SET Token='$TOKEN'   WHERE Email = '" . $_POST['Email'] . "' ";
            if (mysqli_query($database->getDb(), $sql)) {
                if (isset($_SESSION['Email_Mail']) && isset($_SESSION['Name_Mail']) && $_SESSION['TOKEN_Mail']) {
                    echo "<div v-show='0' style='color: white'>";
                    $_SESSION['faramoshi']="1";
                    controller::mailsender();
                    unset($_SESSION['faramoshi']);
                    echo "</div>";
                    echo "<forget></forget>";
                }
            }
        }
    }
    unset($_SESSION['captcha']);
endif;

controller::loadView('vorod');