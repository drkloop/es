<?php
$TOKEN="ES_";
$TOKEN.= uniqid("e_estekhdam",2);
$TOKEN.= MD5(rand());
$TOKEN.= Sha1(rand());
//length 109 para
//echo $TOKEN;
$Email="alifarid0011@gmail.com";
?>
<a href="<?= "?"."email=$Email"."&Token=$TOKEN"?>" >ارسال به ایمیل</a>
<?php
if (isset($_GET['email'])){
    echo "<br>".$_GET['email']."<br>";
}
if (isset($_GET['Token'])){
    echo "<br>".$_GET['Token']."<br>";
}
?>