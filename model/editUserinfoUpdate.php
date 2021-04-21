<?php
require_once "db.php";
$db = new db();
session_start();
$mail = $_SESSION["logIn"];

if (isset($_POST["edit_user"]) && $_POST["edit_user"] == 0) {
    $email = $_SESSION["logIn"];
    $name = $_POST["name"];
    $sex = $_POST["gender"];
    if ($sex == "female") {
        $sex = 2;
    } else {
        $sex = 1;
    }
    $phone = $_POST["mobile"];
    $city = $_POST["city"];
    $ostan = $_POST["ostan_select"];
    $query = "UPDATE user SET Name='$name', Shaher='$city', Sex='$sex',Phone='$phone',Ostan='$ostan' WHERE Email='$email'";
    $run = mysqli_query($db->getDb(), $query);
    if ($run) {
        echo "با موفقیت انجام شد";
    } else {
        echo "باموفقیت انجام نشد";
    }
}

if (isset($_POST["new_email"])) {
    $email = $_POST["new_email"];
    $cur_email = $_SESSION["logIn"];

    $query = "UPDATE user SET Email='$email' WHERE Email='$cur_email'";
    $run = mysqli_query($db->getDb(), $query);

    if ($run) {
        echo "تغییرات انجام شد";
        $_SESSION["logIn"] = $email;
    } else {
        echo "مشکلی وجود دارد";
    }
}

if (isset($_POST["editjobinfo"])) {
    $jobstatusselect = $_POST["jobstatusselect"];
    $salaryselect = $_POST["salaryselect"];
    $workinselect = $_POST["workinselect"];
    $mail = $_SESSION["logIn"];
    $query = "UPDATE resume SET job_status='$jobstatusselect',work_in='$workinselect',salary='$salaryselect'
WHERE user_mail='$mail'";
    $run = mysqli_query($db->getDb(), $query);
    if ($run) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST["addlang"])) {
    $level = $_POST["level"];
    $lang = $_POST["lang"];
    $query = "SELECT languages,languages_level FROM resume WHERE user_mail='$mail'";
    $run = mysqli_query($db->getDb(), $query);
    $row = mysqli_fetch_array($run);
    $cur_lang = $row["languages"];
    $cur_level = $row["languages_level"];
    $cur_lang_ar = explode("-", $cur_lang);
    $res = 0;
    foreach ($cur_lang_ar as $l) {
        if ($l == $lang) {
            $res++;
        }
    }
    if ($res == 0) {
        $cur_lang .= $lang . "-";
        $cur_level .= $level . "-";
        $query = "UPDATE resume SET languages='$cur_lang',languages_level='$cur_level' WHERE user_mail='$mail'";
        $run = mysqli_query($db->getDb(), $query);
        if ($run) {
            echo 1;
        } else {
            echo 0;
        }
    } else {
        echo 0;
    }
}

if (isset($_POST["editlang"])) {
    $level = $_POST["level"];
    $lang = $_POST["lang"];
    $query = "SELECT languages,languages_level FROM resume WHERE user_mail='$mail'";
    $run = mysqli_query($db->getDb(), $query);
    $row = mysqli_fetch_array($run);
    $cur_lang = $row["languages"];
    $cur_level = $row["languages_level"];
    $cur_level = explode("-", $cur_level);
    $cur_lang_ar = explode("-", $cur_lang);
    $level_pos = array_search($lang, $cur_lang_ar);
    $cur_level[$level_pos] = $level;
    $cur_leve = "";
    $cur_lang = "";
    foreach ($cur_lang_ar as $l) {
        if($l!= ""){
            $cur_lang .= $l . "-";
        }
    }
    foreach ($cur_level as $l) {
        if($l != ""){
            $cur_leve .= $l . "-";
        }
    }
    $query = "UPDATE resume SET languages='$cur_lang',languages_level='$cur_leve' WHERE user_mail='$mail'";
    $run = mysqli_query($db->getDb(), $query);
    if ($run) {
        echo 1;
    } else {
        echo 0;
    }
}
?>