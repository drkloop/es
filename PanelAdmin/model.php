<?php
$database = new db();
if (isset($_POST['Email']) && isset($_POST['Pass']) && isset($_POST['ReC'])) {
    $Email = $_POST['Email'];
    $ReC = $_POST['ReC'];
    $Pass = md5($_POST['Pass']);
    if (isset($_SESSION['ReCaptCha']))
        if ($ReC == $_SESSION['ReCaptCha']) {
            $dataBaseCheck = mysqli_query($database->getDb(), "SELECT * FROM user");
            $Email = $_POST['Email'];
            $Pass = md5($_POST['Pass']);
            $check = mysqli_query($database->getDb(), "SELECT * FROM user where   Email='$Email' AND Pass='$Pass'");
            if (mysqli_num_rows($check) > 0) {
                $fetch = mysqli_fetch_array($check);
                if ($fetch['semat'] === '1') {
                    $_SESSION['ADMINLOGIN'] = "Admin";
                }
            } else {
                $_SESSION['ERR_ADMIN'] = "خطايي رخ داد دوباره تلاش كنيد.";
            }
        }else {
            $_SESSION['ERR_ADMIN'] = "كد كپچا اشتباه وارد شده است دوباره امتحان كنيد";
        }

}