<?php
require_once 'db.php';
require_once 'my_funcs.php';
$db = new db();
$query = "SELECT * FROM global_advertise ORDER BY g_advertise_id DESC";
$run = mysqli_query($db->getDb(), $query);
while ($row = mysqli_fetch_array($run)):
    $g_advertise_title = $row["g_advertise_title"];
    $g_advertise_id = $row["g_advertise_id"];
    $g_advertise_time_insert = $row["g_advertisie_time_insert"];
    $g_advertise_info_first = $row["g_advertise_info_first"];
    $kholase = $row["kholase"];
    $time = explode("-", $g_advertise_time_insert);
    $month = get_month_name($time[1]);
    $day = $time[2];
    $date = "انتشار در " . $day . " " . $month;
    ?>
  <div val-adver-sarasari='<?= $g_advertise_id ?>' class="col-md-6 adver_sarasari">
    <div class="adver_sarasari_for_pad">
      <p class="title_adver_sarasari"><?= $g_advertise_title ?></p>
      <p class="info_adver_sarasari">
          <?= $kholase ?>
      </p>
      <i class="fa fa-angle-left\"></i>
      <p class="footer_adver_sarasari">
          <?= $date ?>
      </p>
    </div>
  </div>
<?php endwhile; ?>