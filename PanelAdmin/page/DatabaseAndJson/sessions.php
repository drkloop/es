<?php

require_once "db.php";
$database = new db();
class API
{
    function Select()
    {
        $database = new db();
        $data = mysqli_query($database->getDb(), "SELECT * FROM infouser ORDER BY Id DESC");
        if (mysqli_num_rows($data) > 0) {
            for ($i=0;$i<=10;$i++){
            $outPutData = mysqli_fetch_assoc($data);
            $list[]=[
                'Browser' => $outPutData['Browser'],
                'IpAddress' => $outPutData['IpAddress'],
                'Country' =>  $outPutData['Country'],
                'City' => $outPutData['City'],
                'Devise' => $outPutData['Devise'],
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