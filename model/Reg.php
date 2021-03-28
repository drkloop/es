<?php
require_once 'db.php';
$database=new db();
if (isset($_POST['Pass'])) {
    $Name = $_POST['nam'];
    $Email = $_POST['email'];
    $_SESSION['Email_validation']=  $Email;
    $Pass = md5($_POST['Pass']);
    $Madrak = $_POST['Madrak'];
    $Reshte = $_POST['Reshte'];
    $Ostan = $_POST['Ostan'];
    $Shaher = $_POST['Shaher'];
    $Phone = $_POST['Phone'];
    $Sex = $_POST['Sex'];
    $vojod = 0;
    $dataBaseCheck = mysqli_query($database->getDb(), "SELECT * FROM user");
    if (mysqli_num_rows($dataBaseCheck) > 0) {
        while ($row = mysqli_fetch_assoc($dataBaseCheck)) {

            if ($Email == $row["Email"]) {
                $vojod = 2;

            } elseif ($Phone == $row["Phone"]) {
                $vojod = 1;

            }
        }
    }
    if ($vojod == 0) {
       
        $sql = "INSERT INTO user (Name,Sex,Email,Pass,Ostan,Shaher,Madrak,Reshte,Phone) VALUES ('$Name','$Sex','$Email','$Pass','$Ostan','$Shaher','$Madrak','$Reshte','$Phone')";
        if (mysqli_query($database->getDb(), $sql)) {
            $_SESSION['LogIn'] = true;
            $_SESSION['logIn'] = $Email;
            $_SESSION['Name']=$Name;
            $_SESSION['Register_first']='yes';
            controller::redirect('./validationReg');
        } else {
            $_SESSION['LogIn'] = false;
        }
    }
    if ($vojod == 2) {
        echo '<eremail></eremail>';
        controller::loadView('Register');
    } elseif ($vojod == 1) {
        echo '<erphone></erphone>';
        controller::loadView('Register');
    }
//echo $_SESSION['LogIn'];
//echo $_POST['Phone'];
    mysqli_close($database->getDb());
}
?>
<?php
if ((!isset($_POST['Pass'])) && !isset($_SESSION['LogIn']) ) {
    echo '<erthabt></erthabt>';
    controller::loadView('Register');
}
if(!isset($_SESSION['logIn'])){
    controller::loadView('Register');
}
if(isset($_SESSION['logIn'])){
    controller::redirect('./validationReg');
}
?>


