<?php
require_once "db.php";
$db=new db();
$email = $_SESSION["logIn"];
$query = "SELECT * FROM user WHERE Email='$email'";
$run=mysqli_query($db->getDb(),$query);
$row = mysqli_fetch_array($run);
$name = $row["Name"];
$sex=$row["Sex"];
$phone=$row["Phone"];
$city=$row["Shaher"];
$ostan=$row["Ostan"];
$ostan_query = "SELECT * FROM ostan";
$ostan_run=mysqli_query($db->getDb(),$ostan_query);
$ostanha_value = [0];
$ostanha_name = [""];
while ($ostan_row = mysqli_fetch_array($ostan_run)){
    $ostan_id = $ostan_row["ostan_id"];
    $ostan_name = $ostan_row["ostan_name"];
    if($ostan_id!=$ostan){
        array_push($ostanha_value,$ostan_id);
        array_push($ostanha_name,$ostan_name);
    }elseif ($ostan_id==$ostan){
        $ostanha_value[0]=$ostan_id;
        $ostanha_name[0]=$ostan_name;
    }
}
?>