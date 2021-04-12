<?php
require_once "db.php";
require_once "my_funcs.php";
require_once "func_adv.php";
$db = new db();
if (isset($_GET["id"])):
$adv_id = $_GET["id"];
$query = "SELECT * FROM global_advertise WHERE g_advertise_id='$adv_id'";
$run = mysqli_query($db->getDb(), $query);
$row = mysqli_fetch_array($run);
$adv_title = $row["g_advertise_title"];
$Options = $row["g_advertise_info_first"];
$Options = str_replace(' " '," ' ",$Options);
$adv_time = $row["g_advertisie_time_insert"];
$adv_time = explode("-", $adv_time);
$year = $adv_time[0];
$month = $adv_time[1];
$day = $adv_time[2];
$mo = get_month_name($month);
$when = get_when($adv_time[0], $adv_time[1], $adv_time[2], $adv_time[3], $adv_time[4]);
 $adv_second_titlle = $row["g_advertise_second_title"];

 require_once __DIR__ .'../../view/sarasari.phtml';
 endif;
 ?>


