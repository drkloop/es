<?php
session_start();

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
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/styles.css">

  <!--  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/duotone.css" integrity="sha384-R3QzTxyukP03CMqKFe0ssp5wUvBPEyy9ZspCB+Y01fEjhMwcXixTyeot+S40+AjZ" crossorigin="anonymous"/>-->
  <!--  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/fontawesome.css" integrity="sha384-eHoocPgXsiuZh+Yy6+7DsKAerLXyJmu2Hadh4QYyt+8v86geixVYwFqUvMU8X90l" crossorigin="anonymous"/>-->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <title>پنل ادمین</title>
</head>
<body id="body-pd">
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

          <span>

          <a href="#" class="nav__link" @click="showdash=!showdash">
            <i class='bx bx-mail-send bx-tada'></i>
            <span class="nav__name">
              ایمیل ها
              <i class='bx bx-chevron-up' v-if="showdash"></i>
            <i class='bx bx-chevron-down' v-if="!showdash"></i>
            </span>
          </a>
            <a href="#" class="nav__link " v-if="showdash">
              <i class='bx bxs-message-rounded-add '></i>
              <span class="nav__name">ارسال ایمیل جدید</span>
            </a>
            <a href="#" class="nav__link " v-if="showdash">
              <i class='bx bx-envelope'></i>
              <span class="nav__name">ایمیل های دریافتی</span>
            </a>

          </span>
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
<!--===== MAIN JS =====-->
<script src="assets/js/vue.js"></script>
<script src="https://unpkg.com/vue-router@3.4.9/dist/vue-router.js"></script>
<script src="assets/js/ckeditor.js"></script>
<script src="assets/js/ckeditor2.js"></script>
<script src="../asetes/js/axios.js"></script>
<script src="https://unpkg.com/vue-chartjs@2.5.7-rc3/dist/vue-chartjs.full.min.js"></script>
<script src="assets/js/App.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
