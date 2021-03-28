<?php


require_once "db.php";
$database = new db();
class API
{
    function Select()
    {
        $database = new db();
        $data = mysqli_query($database->getDb(), "SELECT * FROM user");
        if (mysqli_num_rows($data) > 0) {
                 $list[]=[
                     'countOfuser' => mysqli_num_rows($data),
                ];
        }
        return json_encode($list);
    }
}
$users = new API();
header("Content-Type: application/json");
echo $users->Select();
?>