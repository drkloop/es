<?php
require_once 'db.php';

class API
{
    function Select(){
        $database=new db();
        $data = mysqli_query($database->getDb(), "SELECT * FROM replay");
        if (mysqli_num_rows($data) > 0) {
            while ($outPutData = mysqli_fetch_assoc($data)) {

                $list[]= [
                    'Id' => $outPutData['Id'],
                    'Name' => $outPutData['Name'],
                    'Email' => $outPutData['Email'],
                    'Tarihk' => $outPutData['Tarihk'],
                    'Saat' => $outPutData['Saat'],
                    'Mtn' => $outPutData['Mtn'],
                    'CommentId' => $outPutData['CommentId'],
            ];
            }
        }
        return json_encode($list);
    }
}
$users = new API();
header("Content-Type: application/json");
 echo $users->Select();