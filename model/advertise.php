<?php
//include "db.php";
$query = "SELECT * FROM advertise";
$_SESSION["advertise_query"]=$query;
if(isset($_SESSION["adver_page"])){
    get_advertisees($query,$_SESSION["adver_page"]);
    get_pag($query,$_SESSION["adver_page"]);
}else{
    get_advertisees($query,1);
    get_pag($query,1);
}

?>  

