<?php
include "funcs_for_advertise.php";
session_start();
$major_ids = [];
$job_ids = [];
$city_ids = [];
$arr_advers = [];
$sex_ids =[];
$timing_ids = [];

$arr_zone_checked = [];
if(isset($_POST["job_checked"])){
    $job_ids = get_id("job_checked","advertise_id","advertise_job","advertise");
}

if(isset($_POST["major_checked"])){
    $major_ids = get_id("major_checked","advertise_id","advertise_major","advertise");
}

if(isset($_POST["zone_checked"])){
    $city_ids = get_id("zone_checked","advertise_id","advertise_city","advertise");
    $arr_zone_checked = $_POST["zone_checked"];
}

if(isset($_POST["sex_checked"])){
    $sex_ids = get_id_2("sex_checked","advertise_id","advertise_sex");
}

if(isset($_POST["timing_checked"])){
    $timing_ids = get_id_2("timing_checked","advertise_id","advertise_timing");
}
$arr_tot = [];
if(count($job_ids)>0){
    array_push($arr_tot,$job_ids);
}
if(count($major_ids)>0){
    array_push($arr_tot,$major_ids);
}

if(count($city_ids)>0 || count($arr_zone_checked)>0){
    array_push($arr_tot,$city_ids);
}
if(count($sex_ids)>0){
    array_push($arr_tot,$sex_ids);
}
if(count($timing_ids)>0){
    array_push($arr_tot,$timing_ids);
}
if(count($arr_tot)!=0){
    if(count($arr_tot)>1){
        $arr_in = $arr_tot[0];
        for($i=1;$i<count($arr_tot);$i++){
            $arr_in = array_intersect($arr_in,$arr_tot[$i]);
        }
    }elseif ((count($arr_tot)==1)){
        $arr_in  = $arr_tot[0];
    }
    $arr_in= implode("','",$arr_in);
    $query = "SELECT * FROM advertise WHERE advertise_id IN ('".$arr_in."')";
}else{
    $query = "SELECT * FROM advertise";
}


$_SESSION["advertise_query"] = $query;
get_advertisees($query,1);
get_pag($query,1);

?>
<script src="asetes/js/get_adverss.js"></script>
