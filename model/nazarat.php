<?php
require_once 'db.php';
require_once './core/jdf.php';
$database = new db();
if (isset($_POST['Email'])) {
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Com = $_POST['Nazar'];
    $Tarihk = jdate('l j F Y');
    $Saat = jdate('g:i:s');
    if (isset($_POST['IdComent'])) {
        $ComId = $_POST['IdComent'];
        $sql = "INSERT INTO replay (Name,Email,Tarihk,Saat,Mtn,CommentId) VALUES ('$Name','$Email','$Tarihk','$Saat','$Com','$ComId')";
        mysqli_query($database->getDb(), $sql);

    } else {
        $sql = "INSERT INTO comment (Name,Email,Tarihk,Saat,Mtn) VALUES ('$Name','$Email','$Tarihk','$Saat','$Com')";
        mysqli_query($database->getDb(), $sql);
    }
}

controller::redirect('./taghvim');
