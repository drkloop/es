<?php
session_start();
require_once __DIR__ . "/page/DatabaseAndJson/db.php";
require_once __DIR__ . "/model.php";
require_once __DIR__ . '/reCaptcha.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- ===== BOX ICONS ===== -->
  <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
  <!---->
  <!-- ===== CSS ===== -->
  <link href="https://v1.fontapi.ir/css/Tanha" rel="stylesheet">
    <?php if (isset($_SESSION['ADMINLOGIN'])): ?>
      <link rel="stylesheet" href="assets/css/bootstrap.css">
      <link rel="stylesheet" href="assets/css/styles.css">
    <?php endif; ?>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <?php if (!isset($_SESSION['ADMINLOGIN'])): ?>
      <link rel="stylesheet" href="StyleOfPanelAdminLogIn.css"/>
    <?php endif; ?>
  <title>پنل ادمین</title>
</head>
<body id="body-pd">
<?php if (isset($_SESSION['ADMINLOGIN'])): ?>
  <div>
      <?php
      require_once __DIR__ . "/page/dashbord.phtml";
      require_once __DIR__ . "/page/errors.phtml";
      require_once __DIR__ . "/page/exit.php";
      require_once __DIR__ . "/page/Users.phtml";
      require_once __DIR__ . "/page/advertise.phtml";
      require_once __DIR__ . "/page/Comment.phtml";
      require_once __DIR__ . "/page/404.html";

      ?>
  </div>
<?php endif; ?>
<!--ورود به سايت-->
<?php if (!isset($_SESSION['ADMINLOGIN'])): ?>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="" method="post" class="sign-in-form">
          <h2 class="title">ورود به پنل مديريت</h2>
          <h4 style="color: crimson">
              <?php
              if (isset($_SESSION['ERR_ADMIN'])) {
                  echo $_SESSION['ERR_ADMIN'];

              }

              ?>
          </h4>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="email" dir="rtl" placeholder="ايميل مديريت" name="Email" required/>
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" dir="rtl" placeholder="رمز مدير" name="Pass" required/>
          </div>
          <div class="input-field">
            <i class="fas fa-redo" id="recaptchaRep"
               onclick="javascript:document.location.reload()"></i>
            <input type="text" dir="rtl" placeholder="كد كپچا" name="ReC" required/>
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
  <!--#-->
<?php endif; ?>
<!--پنل ادمين-->
<?php if (isset($_SESSION['ADMINLOGIN'])): ?>
  <div id="wraper">

    <header class="header" id="header">
      <div class="header__toggle">
        <i class='bx bx-menu' id="header-toggle"></i>
      </div>

      <b> نام مدیر</b>
      <div class="header__img">
        <i class='bx bxs-user-circle bx-spin bx-md'></i>
      </div>
    </header>

    <div class="l-navbar" id="nav-bar">
      <nav class="nav">
        <div>
          <a href="#" class="nav__logo">
            <i class='bx bx-layer nav__logo-icon'></i>
            <span class="nav__logo-name">پنل مدیریت</span>
          </a>

          <div class="nav__list">
            <router-link to="/panelAdmin" title="داشبورد">
              <a href="#" class="nav__link active">
                <i class='bx bxs-dashboard bx-tada'></i>
                <span class="nav__name">داشبورد

              </span>

              </a>
            </router-link>
            <router-link to="/users" title="كاربران">
              <a href="#" class="nav__link">
                <i class='bx bx-user bx-tada'></i>
                <span class="nav__name">کاربران</span>
              </a>
            </router-link>


            <router-link to="/comments" title="نظرات">
              <a href="#" class="nav__link">
                <i class='bx bxs-comment-detail bx-tada'></i>
                <span class="nav__name">نظرات</span>
              </a>
            </router-link>
            <router-link to="/advertise" title="آگهی ها">
              <a href="#" class="nav__link">
                <i class='bx bxs-megaphone bx-tada'></i>
                <span class="nav__name">آگهی ها </span>
              </a>
            </router-link>

            <router-link to="/errors" title="اشكالات">
              <a href="#" class="nav__link">
                <i class='bx bxs-message-alt-error bx-tada bx-rotate-90'></i>
                <span class="nav__name">اشکالات</span>
              </a>
            </router-link>
          </div>
        </div>
        <router-link to="/exit">
          <a href="#" class="nav__link">
            <i class='bx bx-log-out nav__icon'></i>
            <span class="nav__name">خروج </span>
          </a>
        </router-link>
      </nav>
    </div>
    <div dir="rtl">
      <router-view></router-view>
    </div>

  </div>

  <!--پنل ادمين-->
  <!--===== MAIN JS =====-->
  <script src="assets/js/vue.js"></script>
  <script src="https://unpkg.com/vue-router@3.4.9/dist/vue-router.js"></script>
  <script src="assets/js/ckeditor.js"></script>
  <script src="assets/js/ckeditor2.js"></script>
  <script src="../asetes/js/axios.js"></script>
  <script src="https://unpkg.com/vue-chartjs@2.5.7-rc3/dist/vue-chartjs.full.min.js"></script>
  <script src="assets/js/App.js"></script>
  <script src="assets/js/main.js"></script>
<?php endif; ?>
</body>
</html>

