<?php
require_once 'db.php';
require_once './core/jdf.php';
$database = new db();

if (isset($_POST['Email'])&&isset($_POST['Nazar'])) {
    $Com = $_POST['Nazar'];
        if (preg_match('/^[ . @ a-zA-Z0-9-آائ ء ً ي  ب پ ت ث ج چ ح خ دذرزژس ش ص ض ط ظ ع غ ف ق  ک گ ل م ن وه ی]+$/',$Com) != 0){
            $Name = $_POST['Name'];
            $Email = $_POST['Email'];
            $Tarihk = jdate('l j F Y');
            $Saat = jdate('g:i:s');
            if (isset($_POST['IdComent'])) {
                $ComId = $_POST['IdComent'];
                $sql = "INSERT INTO replay (Name,Email,Tarihk,Saat,Mtn,CommentId) VALUES ('$Name','$Email','$Tarihk','$Saat','$Com','$ComId')";
                mysqli_query($database->getDb(), $sql);
            } else {
                $sql = "INSERT INTO comment (Name,Email,Tarihk,Saat,Mtn) VALUES ('$Name','$Email','$Tarihk','$Saat','$Com')";
                mysqli_query($database->getDb(), $sql);
            }
        }

}

controller::redirect('./taghvim');
