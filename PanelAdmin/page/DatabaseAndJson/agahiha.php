<?php

require_once "db.php";
$database = new db();
class API
{
    function Select()
    {
        $database = new db();
        $data = mysqli_query($database->getDb(), "SELECT * FROM advertise");
        if (mysqli_num_rows($data) > 0) {
            $list[]=[
                'countOfAdvertise' => mysqli_num_rows($data),
            ];
        }
        return json_encode($list);
    }
}
$advertise = new API();
header("Content-Type: application/json");
echo $advertise->Select();
?>