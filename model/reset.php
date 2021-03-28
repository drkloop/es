<?php
require_once 'db.php';
$database = new db();
if ($_GET['Token']!=null):
if(isset($_POST['RePass'])){
    $dataBaseCheck = mysqli_query($database->getDb(), "SELECT * FROM user WHERE Email = '" .$_GET['Email'] ."' AND Token = '" .$_GET['Token'] ."'");
    if (mysqli_num_rows($dataBaseCheck) > 0) {
        $sql = "UPDATE user SET Pass='". MD5($_POST['RePass'])."'   WHERE Email = '" . $_GET['Email'] . "' ";
        if (mysqli_query($database->getDb(), $sql)) {
            echo "<paschen></paschen>";
            controller::loadView('vorod');
            $sql = "UPDATE user SET Token=null   WHERE Email = '" . $_GET['Email'] . "' ";
            if (mysqli_query($database->getDb(), $sql)) {

            }
        }
    }   else{
        controller::loadView('404');
    }
}
else if (isset($_GET['Token'])) {
    $dataBaseCheck = mysqli_query($database->getDb(), "SELECT * FROM user WHERE Token = '" .$_GET['Token'] ."'");
    if (mysqli_num_rows($dataBaseCheck) > 0) {
     controller::loadView('reset');
//        $sql = "UPDATE user SET Pass='$TOKEN'   WHERE Email = '" . $_POST['Email'] . "' ";
//        if (mysqli_query($database->getDb(), $sql)) {
//        }

    }
    else{
        controller::loadView('404');
    }
}

endif;

