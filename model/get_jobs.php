<?php
require_once "db.php";
$database=new db();
$query = "SELECT * FROM job";
$run = mysqli_query($database->getDb(),$query);
while ($row = mysqli_fetch_array($run)){
    $job_id = $row["job_id"];
    $job_name = $row["job_name"];
    echo "
    <li style='margin-right: 10px'><input type='checkbox' value='$job_id' class='major_check'><span>$job_name</span></li>
    ";
}
?>
