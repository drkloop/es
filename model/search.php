<?php
require_once "db.php";
$database=new db();
$q =$_POST["val_search_text"];
$query = "SELECT advertise_title,advertise_id FROM advertise WHERE advertise_title LIKE '%{$q}%'";
$run = mysqli_query($database->getDb(),$query);
while ($row = mysqli_fetch_array($run)){
    $a = $row["advertise_title"];
    $id = $row["advertise_id"];
    echo "<p val='$id' class='p_search'>$a</p>";
}
?>
<script>
    $(".p_search").click(function () {
        var val = $(this).attr("val");
        var site = "./adver?id="+val;
        window.open(site,"_self");
    });
</script>
