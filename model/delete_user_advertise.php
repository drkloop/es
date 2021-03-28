<?php
require_once "db.php";
$val = $_POST["val"];
$db = new db();
$query = "DELETE FROM advertise WHERE advertise_id='$val'";
$run = mysqli_query($db->getDb(),$query);
if($run){
    echo "1";
}else{
    echo "2";
}
?>
