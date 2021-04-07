<?php
require_once "db.php";
$database = new db();

class API
{
    function Select()
    {
        $list=[];
        $database = new db();
        $data = mysqli_query($database->getDb(), "SELECT * FROM comment ORDER BY Id DESC");
        if (mysqli_num_rows($data) > 0) {
            while ($outPutData = mysqli_fetch_assoc($data)) {
                $list_co[] = [
                    'Id_co' => $outPutData['Id'],
                    'Name_co' => $outPutData['Name'],
                    'Email_co' => $outPutData['Email'],
                    'Tarihk_co' => $outPutData['Tarihk'],
                    'comment_co' => $outPutData['Mtn'],
                ];
            }
        }
        $data = mysqli_query($database->getDb(), "SELECT * FROM replay ORDER BY Id DESC");
        if (mysqli_num_rows($data) > 0) {
            while ($outPutData = mysqli_fetch_assoc($data)) {
                $list_rep[] = [
                    'Id_rep' => $outPutData['Id'],
                    'Name_rep' => $outPutData['Name'],
                    'Email_rep' => $outPutData['Email'],
                    'Tarihk_rep' => $outPutData['Tarihk'],
                    'comment_rep' => $outPutData['Mtn'],
                    'CommentId' => $outPutData['CommentId'],
                ];
            }
        }
        foreach ($list_co as $key=>$item_co ) {
            $flag=true;
            $listOfRep=[];
            foreach ($list_rep as $item_rep){
                if ($item_co['Id_co'] == $item_rep['CommentId']) {
                    $listOfRep[]= [
                            'Id_rep' => $item_rep['Id_rep'],
                            'Name_rep' => $item_rep['Name_rep'],
                            'Email_rep' => $item_rep['Email_rep'],
                            'Tarihk_rep' => $item_rep['Tarihk_rep'],
                            'comment_rep' => $item_rep['comment_rep'],
                            'CommentId' => $item_rep['CommentId'],
                    ];
                    $flag=false;
                }
            }
            $list[$key]=[
                'Id_co' => $item_co['Id_co'],
                'Name_co' => $item_co['Name_co'],
                'Email_co' => $item_co['Email_co'],
                'Tarihk_co' => $item_co['Tarihk_co'],
                'comment_co' => $item_co['comment_co'],
                "Rep"=>$listOfRep
            ];
            if ($flag) {
                $list[] = [
                    'Id_co' => $item_co['Id_co'],
                    'Name_co' => $item_co['Name_co'],
                    'Email_co' => $item_co['Email_co'],
                    'Tarihk_co' => $item_co['Tarihk_co'],
                    'comment_co' => $item_co['comment_co'],
                    ];
            }

        }
        return json_encode($list);
    }
}

$advertise = new API();
header("Content-Type: application/json");
echo $advertise->Select();
