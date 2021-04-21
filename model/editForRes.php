<?php
session_start();
require_once 'db.php';
$db = new db();
if(isset($_POST["lang"])){
    $lang = $_POST["lang"];
    $user_mail = $_SESSION["logIn"];
    $query = "SELECT languages FROM resume WHERE user_mail='$user_mail'";
    $run = mysqli_query($db->getDb(),$query);
    $row = mysqli_fetch_array($run);
    $langs = $row["languages"];
    $langs = explode("-",$langs);
    foreach (array_keys($langs, $lang) as $key) {
        unset($langs[$key]);
    }
    $language = "";
    foreach ($langs as $lan){
        if($lan != ""){
            $language .= $lan."-";
        }
    }
    $query = "UPDATE resume SET languages='$language'";
    $run = mysqli_query($db->getDb(),$query);
    if($run){
        echo "1";
    }else{
        echo "0";
    }
}

?>