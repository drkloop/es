<?php
session_start();
include "db.php";
$db = new db();
if(isset($_SESSION["logIn"]) && isset($_POST['val'])){
    $user_mail = $_SESSION["logIn"];
    $user_id = $_POST["val"];
    $query = "INSERT INTO star (user_mail,adver_id) VALUES ('$user_mail','$user_id')";
    $run = mysqli_query($db->getDb(),$query);
    if($run){
        echo "1";
    }else{
        echo 0;
    }
}
if(isset($_SESSION["logIn"]) && isset($_POST['del_val'])){
    $user_mail = $_SESSION["logIn"];
    $adver_id = $_POST["del_val"];
    $query = "DELETE FROM star WHERE adver_id='$adver_id' AND user_mail='$user_mail'";
    $run = mysqli_query($db->getDb(),$query);
    if($run){
        echo "1";
    }
    else{
        echo 0;
    }
}
if(!isset($_SESSION["logIn"])){
    echo "OH";
}
?>