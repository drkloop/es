<?php

require_once "db.php";
$database = new db();
class API
{
    function Select()
    {
        $database = new db();
        $data = mysqli_query($database->getDb(), "SELECT * FROM user ");
        if (mysqli_num_rows($data) > 0) {
            while ($outPutData = mysqli_fetch_assoc($data)) {
                $list[]=[
                    'Name' => $outPutData['Name'],
                    'Id' => $outPutData['Id'],
                    'Sex' => $outPutData['Sex'],
                    'Email' => $outPutData['Email'],
                    'Validate' => $outPutData['Validate'],
                    'Ostan' => $outPutData['Ostan'],
                    'Shaher' => $outPutData['Shaher'],
                    'Madrak' => $outPutData['Madrak'],
                    'Reshte' => $outPutData['Reshte'],
                    'Phone' => ($outPutData['Phone']),
                    'Semat' => ($outPutData['semat']),
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