<?php
require_once 'db.php';
$database=new db();
if (!isset($_SESSION['logIn'])){
$Email=$_POST['Email'];
$Pass=md5($_POST['Pass']);
$check = mysqli_query($database->getDb(), "SELECT * FROM user where   Email='$Email' AND Pass='$Pass'");
if (mysqli_num_rows($check) > 0) {
    $fetch = mysqli_fetch_array($check);
    $_SESSION['logIn'] = $Email;
    $_SESSION['Name'] = $fetch['Name'];
echo "<accsu></accsu>";
    controller ::redirect('./PanelUser');
} else {
    echo "<eracc></eracc>";
    controller :: loadView('vorod');
  }
}
if (isset($_SESSION['logIn'])) {
    controller :: loadView('vorod');
}
?>
