<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://v1.fontapi.ir/css/Tanha" rel="stylesheet">
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="StyleOfPanelAdminLogIn.css"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.0/vue.js"
          integrity="sha512-4EMifNzsGH/ixIeXTy7stkY1hrlVrYfOXlBBG0sGkCtVzHoCsyVxfXkzILZAMs/TI6MBrfDDK9YYWmhaG6BF2A=="
          crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.js"
          integrity="sha512-otOZr2EcknK9a5aa3BbMR9XOjYKtxxscwyRHN6zmdXuRfJ5uApkHB7cz1laWk2g8RKLzV9qv/fl3RPwfCuoxHQ=="
          crossorigin="anonymous"></script>
  <title>پنل ادمين</title>
</head>
<body>
<div class="container" >
  <div class="forms-container" >
    <div class="signin-signup">
      <form action="" method="post" class="sign-in-form">
        <h2 class="title">ورود به پنل مديريت</h2>
        <div class="input-field">
          <i class="fas fa-user"></i>
          <input type="email" dir="rtl" placeholder="ايميل مديريت" name="Email" required/>
        </div>
        <div class="input-field">
          <i class="fas fa-lock"></i>
          <input type="password" dir="rtl" placeholder="رمز مدير" name="Pass" required/>
        </div>
        <div class="input-field">
          <i class="fas fa-redo" id="recaptchaRep" @click="sendReq()"
             onclick="javascript:document.location.reload()"></i>
          <input type="text" dir="rtl" placeholder="كد كپچا" required/>
          <div id="recaptcha">
            <img id="imgRec" src="http://es.local/PanelAdmin/chaptcha.png">
          </div>
        </div>
        <input type="submit" value="ورود" class="btn solid"/>
      </form>
    </div>
  </div>
  <div class="panels-container">
    <div class="panel left-panel">
      <div class="content">
        <h3>دوست عزيز</h3>
        <h4>
          به پنل مديرت نمونه سايت اي استخدام خوش آمديد
        </h4>
      </div>
      <img src="img/log.svg" class="image" alt=""/>
    </div>
  </div>
</div>
<script src="ApplogIn.js"></script>
</body>
</html>
<?php
require_once __DIR__ . '\reCaptcha.php';
require_once "db.php";
$database = new db();
if (isset($_POST['Email']) && isset($_POST['Pass'])) {
    $Email = $_POST['Email'];
    $Pass = md5($_POST['Pass']);
    $dataBaseCheck = mysqli_query($database->getDb(), "SELECT * FROM user");
    $Email = $_POST['Email'];
    $Pass = md5($_POST['Pass']);
    $check = mysqli_query($database->getDb(), "SELECT * FROM user where   Email='$Email' AND Pass='$Pass'");
    if (mysqli_num_rows($check) > 0) {
        $fetch = mysqli_fetch_array($check);
        if ($fetch['semat'] == 1) {
            $_SESSION['ADMINLOGIN'] = "Admin";
        }
    }
}
?>