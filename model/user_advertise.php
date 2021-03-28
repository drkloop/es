<?php
require_once "db.php";
$db = new db();
$user_email =$_SESSION['logIn'];
$query = "SELECT advertise_id,advertise_title FROM advertise WHERE advertise_email='$user_email'";
$run = mysqli_query($db->getDb(),$query);
$i=1;
while($row=mysqli_fetch_array($run)){
    $advertise_id = $row["advertise_id"];
    $advertise_title = $row["advertise_title"];
?>
    <tr>
        <td><?=$i ?></td>
        <td><?=$advertise_title ?></td>
        <td><center>
                <a href="./PanelUser_editUserAdvertise?id=<?=$advertise_id?>">
                    <i class="fa fa-pencil edit_user_advertise"></i>
                </a>
            </center></td>
        <td><center>
                <i class="fa fa-trash delete_user_advertise" val=<?=$advertise_id ?>></i>
            </center></td>
    </tr>
<?php
    $i++;
}
?>