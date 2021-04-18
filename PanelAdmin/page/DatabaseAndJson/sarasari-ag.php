<?php

require_once "db.php";
$database = new db();
class API
{
    function Select()
    {
        $database = new db();
        $data = mysqli_query($database->getDb(), "SELECT * FROM global_advertise ORDER BY g_advertise_id DESC");
        if (mysqli_num_rows($data) > 0) {
            while ($outPutData = mysqli_fetch_assoc($data)) {
                $time=explode("-",$outPutData['g_advertisie_time_insert']);
                $date=$time[0].'/';
                $date.=$time[1].'/';
                $date.=$time[2];
                $list[]=[
                    'Id' => $outPutData['g_advertise_id'],
                    'title' => $outPutData['g_advertise_title'],
                    'date'=>$date
                ];
            }
        }
        return json_encode($list);
    }
}
$advertise = new API();
header("Content-Type: application/json");
echo $advertise->Select();
?>