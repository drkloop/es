<?php
require_once "db.php";
include "my_funcs.php";
$database=new db();
date_default_timezone_set("Iran");
$date_year = date("Y");
$date_month = date("m");
$date_day = date("d");
$date_hour = date("H");
$date_minute = date("i");
$my_date = gregorian_to_jalali($date_year,$date_month,$date_day);
$my_date = $my_date."-".$date_hour."-".$date_minute;
$for_what = $_POST["for_what"];
$adver_fname_lname = $_POST["adver_fname_lname"];
$adver_phone_number = $_POST["adver_phone_number"];
$adver_factory_name = $_POST["adver_factory_name"];
$adver_call_phone = $_POST["adver_call_phone"];
$adver_before_main = $_POST["adver_before_main"];
$adver_after_main = $_POST["adver_after_main"];
$adver_email = $_POST["adver_email"];
$adver_but = $_POST["adver_but"];
$adver_txtarea_ide = $_POST["adver_txtarea_ide"];
$adver_txtarea_profit = $_POST["adver_txtarea_profit"];
$adver_txtarea_rela = $_POST["adver_txtarea_rela"];
$adver_fast = $_POST["adver_fast"];
$adver_job = $_POST["adver_job"];
$adver_major = $_POST["adver_major"];
$adver_address = $_POST["adver_address"];
//halfTiming -- totalTiming -- both
$adver_timing = $_POST["adver_timing"];
if($adver_timing=="halfTiming"){
    $adver_timing=1;
}elseif ($adver_timing=="totalTiming"){
    $adver_timing=2;
}else{
    $adver_timing=3;
}
$adver_title = $_POST["adver_title"];
$adver_sex = $_POST["adver_sex"];
//man -- woman -- both
if($adver_sex=="man"){
    $adver_sex=1;
}elseif ($adver_sex=="woman"){
    $adver_sex=2;
}else{
    $adver_sex=3;
}
$adver_show = $_POST["adver_show"];
$adver_img = $_POST["adver_img"];
if($for_what==1){
    $query = "INSERT INTO advertise (advertise_fname_lname,advertise_title,advertise_factory,advertise_time_insert,advertise_city,advertise_timing,advertise_major,
advertise_job,advertise_sex,advertise_fast,advertise_ide,advertise_profit,advertise_rela,advertise_show,advertise_img,advertise_mobile,advertise_phone,
advertise_email,advertise_address,advertise_before,advertise_after) VALUES
 ('$adver_fname_lname','$adver_title','$adver_factory_name','$my_date','$adver_but','$adver_timing','$adver_major','$adver_job',
 '$adver_sex','$adver_fast','$adver_txtarea_ide','$adver_txtarea_profit','$adver_txtarea_rela','$adver_show','$adver_img','$adver_phone_number'
 ,'$adver_call_phone','$adver_email','$adver_address','$adver_before_main','$adver_after_main')";
}else{
    $sdfghkj = $_POST['sdfghkj'];
    $query = "UPDATE advertise SET advertise_fname_lname='$adver_fname_lname',advertise_title='$adver_title',advertise_factory='$adver_factory_name',advertise_time_insert='$my_date'
,advertise_city='$adver_but',advertise_timing='$adver_timing',advertise_major='$adver_major',
advertise_job='$adver_job',advertise_sex='$adver_sex',advertise_fast='$adver_fast',advertise_ide='$adver_txtarea_ide'
,advertise_profit='$adver_txtarea_profit',advertise_rela='$adver_txtarea_rela',advertise_show='$adver_show'
,advertise_img='$adver_img',advertise_mobile='$adver_phone_number',advertise_phone='$adver_call_phone',
advertise_email='$adver_email',advertise_address='$adver_address',advertise_before='$adver_before_main',advertise_after='$adver_after_main'
WHERE advertise_id='$sdfghkj'";
}
$run = mysqli_query($database->getDb(),$query);
if($run){
    echo "SAD";
}else{
    echo "ASD";
}
?>