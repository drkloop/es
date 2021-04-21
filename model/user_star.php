<?php
require_once "db.php";
$db = new db();
$user_email =$_SESSION['logIn'];
$query = "SELECT adver_id FROM star WHERE user_mail='$user_email'";
$run = mysqli_query($db->getDb(),$query);
$i=1;
while($row=mysqli_fetch_array($run)){
    $adver_id = $row["adver_id"];
    $query = "SELECT advertise_title FROM advertise WHERE advertise_id='$adver_id'";
    $run_adver = mysqli_query($db->getDb(),$query);
    $row_adver = mysqli_fetch_array($run_adver);
    $adver_name = $row_adver["advertise_title"];
    ?>
    <tr>
        <td><?=$i ?></td>
        <td><a href="./adver?id=<?=$adver_id?>">
                <?= $adver_name?>
            </a></td>
        <td><center>
                <i class="fa fa-trash delete_star" val=<?=$adver_id ?>></i>
            </center></td>
    </tr>
    <?php
    $i++;
}
?>