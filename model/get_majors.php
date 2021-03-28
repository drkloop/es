<?php
require_once "db.php";
$database=new db();
$query = "SELECT * FROM major";
$run = mysqli_query($database->getDb(),$query);
while ($row = mysqli_fetch_array($run)){
    $major_id = $row["major_id"];
    $major_name = $row["major_name"];
    echo "
    <li><input type='checkbox' value='$major_id' class='job_check'><span>$major_name</span></li>
    ";
}
?>