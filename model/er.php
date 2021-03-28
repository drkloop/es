<?php
require_once 'db.php';
$database = new db();
if (!empty($_POST['title'])) {
    $title=$_POST['title'];
    $coment=$_POST['coment'];
    $email=$_POST['email'];
    $dataBaseCheck = mysqli_query($database->getDb(), "INSERT INTO report_er (title,coment,email) VALUES ('$title','$coment','$email')");
    $this->Sucses='Sucses';
    $_POST=array();
}
else{
    $this->Sucses="Not Sucses";
}