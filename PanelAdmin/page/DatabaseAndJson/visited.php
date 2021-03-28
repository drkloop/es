<?php


require_once "db.php";
$database = new db();

class API
{
    function Select()
    {

//عدد اولیه
        $number = 0;
//زمان حال
        $now = time();
//زمان شروع
        $first_date = strtotime("2021-01-23");
//بدست آوردن فاصله زمانی
        $datediff = $now - $first_date;
//جمع روز و عدد اولیه
        $n = $number + floor($datediff / (60 * 60 * 24));

        $database = new db();
        $data = mysqli_query($database->getDb(), "SELECT * FROM infouser");
        if (mysqli_num_rows($data) > 0) {
            while ($outPutData = mysqli_fetch_assoc($data)) {
                $time = $outPutData['Time'];
            }
            $data = mysqli_query($database->getDb(), "SELECT * FROM infouser WHERE Time='" . $time . "' ");
            $DayData = mysqli_query($database->getDb(), "SELECT * FROM visit");
            if (mysqli_num_rows($data) > 0) {
            if (mysqli_num_rows($DayData) > 0) {
                while ( $outPutDayData = mysqli_fetch_assoc($DayData)) {
                    $Rooz = $outPutDayData['Rooz'];
                }
            }
                $visit=mysqli_num_rows($data);
               if ($Rooz!=$n) {
               mysqli_query($database->getDb(), "INSERT INTO visit (Rooz,Bazdid,date) VALUE ('$n','0','$time') ");
                }
               else{
               mysqli_query($database->getDb(), "UPDATE visit SET   Bazdid='".$visit."' WHERE  Rooz='".$n."'");
               }
                $list[] = [
                    'Date' => $time,
                    'visit' => $visit,
                    'rooz' => $n,
                ];
            }
        }
        return json_encode($list);
    }
}
$users = new API();
header("Content-Type: application/json");
echo $users->Select();
?>