<?php

require_once "db.php";
$database = new db();
class API
{
    function Select()
    {
        $count=0;
        $database = new db();
        $data = mysqli_query($database->getDb(), "SELECT * FROM visit ORDER BY Id DESC ");
        if (mysqli_num_rows($data) > 0) {

//            var_dump((int)$outPutData['Id']);
            while ($outPutData = mysqli_fetch_assoc($data)) {
                $list[]=[
                     'Bazdid'=>(int)$outPutData['Bazdid'],
                     'date'=>$outPutData['date'],
                ];
            }
        }

        for ($i=0;$i<7;$i++){
            $RoozAval[]=[
                'Bazdid'=> isset($list[$i]['Bazdid']) ?  $list[$i]['Bazdid']: null,
                'date'=> isset($list[$i]['date']) ?  $list[$i]['date']: null
                ];
// if ($RoozAval[$i]['Bazdid']===null) {
//     echo 'hi';
// }
        }
//echo $count;
        return json_encode($RoozAval);
    }
}
$advertise = new API();
header("Content-Type: application/json");
echo $advertise->Select();
?>