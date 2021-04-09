<?php
require_once "db.php";
require_once __DIR__ ."/../jdf.php";
$Res_data = json_decode(file_get_contents("php://input"));
$database = new db();
if ($Res_data->action == "User") {
    $query = "UPDATE user SET
     Name='" . $Res_data->Name . "', Madrak='" . $Res_data->Madrak . "' ,Phone='" . $Res_data->Phone . "', Reshte='" . $Res_data->Reshte . "',Semat='" . $Res_data->Semat . "', Sex='" . $Res_data->Sex . "', Shaher='" . $Res_data->Shaher . "',Pass='" . md5($Res_data->Password) . "',Email='" . $Res_data->Email . "',Ostan='" . $Res_data->Ostan . "'
     WHERE Id='" . $Res_data->Id . "'";
    try {
        $update = mysqli_query($database->getDb(), $query);
    } catch (Exception $e) {
        echo $e->errorMessage();
    }
}elseif ($Res_data->action == "deleteUser") {
    echo "$Res_data->Id";
    $query ="DELETE FROM user
WHERE Id = $Res_data->Id
    ";
    try {
        $delete = mysqli_query($database->getDb(), $query);
    } catch (Exception $e) {
        echo $e->errorMessage();
    }
}elseif ($Res_data->action == "CommentRep"){
    echo "$Res_data->Id";
    $query ="DELETE FROM replay
WHERE Id = $Res_data->Id
    ";
    try {
        $delete = mysqli_query($database->getDb(), $query);
    } catch (Exception $e) {
        echo $e->errorMessage();
    }
}elseif ($Res_data->action == "CommentCo"){
    echo "$Res_data->Id";
    $query ="DELETE FROM comment
WHERE Id = $Res_data->Id
    ";
    try {
        $delete = mysqli_query($database->getDb(), $query);
    } catch (Exception $e) {
        echo $e->errorMessage();
    }
}
if  ($Res_data->action == "Comment") {
    $tarikh=jdate('l j F Y');
    $Saat = jdate('g:i:s');
    $query = "INSERT INTO replay (Name, Email, Mtn,Tarihk,Saat,CommentId)
VALUES ('".$Res_data->Name."', '".$Res_data->Email."', '".$Res_data->comment."','".$tarikh."','".$Saat."','".$Res_data->CommentId."')";
    try {
        $update = mysqli_query($database->getDb(), $query);
    } catch (Exception $e) {
        echo $e->errorMessage();
    }
}