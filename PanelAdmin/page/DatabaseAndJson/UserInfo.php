<?php
require_once "db.php";
$database = new db();

class API
{
    function Select()
    {
        $database = new db();
        $data = mysqli_query($database->getDb(), "SELECT * FROM infouser  ORDER BY Id DESC LIMIT 10");
        if (mysqli_num_rows($data) > 0) {
            while ($outPutData = mysqli_fetch_assoc($data)) {
                if ($outPutData['userId'] != null):
                    $dataUser = mysqli_query($database->getDb(), "SELECT * FROM user where Id = '" . $outPutData['userId'] . "'  ");
                    while ($outPutDataUser = mysqli_fetch_assoc($dataUser)) {
                        $acc = "عضو سایت";
                        $list[] = [
                            'IP' => $outPutData['IpAddress'],
                            'Browser' => $outPutData['Browser'],
                            'Country' => $outPutData['Country'],
                            'City' => $outPutData['City'],
                            'Devise' => $outPutData['Devise'],
                            'date'=>$outPutData['Time'],
                            'Time'=>explode('-',explode(" " , $outPutData['Time'])[0])[2],
                            'Name' => $outPutDataUser ['Name'],
                            'acc'=> $acc,
                        ];
                    }
                else:
                    $acc = "ناشناس";
                    $list[] = [
                        'IP' => $outPutData['IpAddress'],
                        'Browser' => $outPutData['Browser'],
                        'Country' => $outPutData['Country'],
                        'City' => $outPutData['City'],
                        'Devise' => $outPutData['Devise'],
                        'date'=>$outPutData['Time'],
                        'Time'=>explode('-',explode(" " , $outPutData['Time'])[0])[2],
                        'acc'=> $acc,
                        'Name'=>'وارد سایت نشده'
                    ];
                endif;
            }
        }

        return json_encode($list);
    }
}

$users = new API();
header("Content-Type: application/json");
echo $users->Select();