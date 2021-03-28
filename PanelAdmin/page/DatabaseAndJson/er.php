<?php


require_once "db.php";
$database = new db();

class API
{
    function Select()
    {
        $database = new db();
        $data = mysqli_query($database->getDb(), "SELECT * FROM report_er ORDER BY Id DESC");
        if (mysqli_num_rows($data) > 0) {
            while ($outPutData = mysqli_fetch_assoc($data)){
                $list[] = [
                    'title' => $outPutData['title'],
                    'coment' => $outPutData['coment'],
                    'email' => $outPutData['email'],
                    'visited' => $outPutData['visited'],
                ];
            }
        }
        return json_encode($list);
    }
}

$advertise = new API();
header("Content-Type: application/json");
echo $advertise->Select();
