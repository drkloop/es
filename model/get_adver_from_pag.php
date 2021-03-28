<?php
include "funcs_for_advertise.php";
$page = $_POST["page"];
session_start();
$_SESSION["adver_page"]=$page;
if(isset($_SESSION["advertise_query"])){
    $query = $_SESSION["advertise_query"];
}else{
    $query = "SELECT * FROM advertise";
}
get_advertisees($query,$page);
get_pag($query,$page);
?>
<script src="asetes/js/get_adverss.js"></script>
