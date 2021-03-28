<?php
require_once 'db.php';
$database=new db();
$user= $_SESSION['logIn'];
$dataBaseCheck = mysqli_query($database->getDb(), "SELECT * FROM User Where  Email ='" . $user . "' ");
    $fetch = mysqli_fetch_array($dataBaseCheck);
    $_SESSION['Name']=$fetch['Name'];
    $_SESSION['Sex']=$fetch['Sex'];
?>