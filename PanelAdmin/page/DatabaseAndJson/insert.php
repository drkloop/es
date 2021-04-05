<?php
require_once "db.php";
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
} elseif ($Res_data->action == "deleteUser") {
    echo "$Res_data->Id";
    $query ="DELETE FROM user
WHERE Id = $Res_data->Id
    ";
    try {
        $delete = mysqli_query($database->getDb(), $query);
    } catch (Exception $e) {
        echo $e->errorMessage();
    }
}