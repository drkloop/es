<?php
require_once "db.php";
$db = new db();
$mail = $_SESSION["logIn"];
$query = "SELECT * FROM resume WHERE user_mail='$mail'";
$run = mysqli_query($db->getDb(),$query);
$row = mysqli_fetch_array($run);
$job_status = $row["job_status"];
$work_in = $row["work_in"];
$salary = $row["salary"];
$languages = $row["languages"];
$languages_level = $row["languages_level"];
?>