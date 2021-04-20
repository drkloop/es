<?php
require_once "db.php";
include "my_funcs.php";
include "func_adv.php";
$database=new db();
if(isset($_GET["id"])){
    $adv_id = $_GET["id"];
    $adver_id  = "";
    if(isset($_SESSION["logIn"])){
        $user_mail = $_SESSION["logIn"];
        $star_query = "SELECT adver_id FROM star WHERE user_mail='$user_mail' AND adver_id='$adv_id'";
        $run = mysqli_query($database->getDb(),$star_query);
        $row = mysqli_fetch_array($run);
        $adver_id = $row["adver_id"];
    }
    $query = "SELECT * FROM advertise WHERE advertise_id='$adv_id'";
    $run = mysqli_query($database->getDb(),$query);
    $row = mysqli_fetch_array($run);
    $adv_title = $row["advertise_title"];
    echo
    "
            <div id=\"adv_title\" class=\"row\">
                <h1 id=\"adv_title_h1\">
                    $adv_title
                </h1>
            </div>
    ";
    $adv_time = $row["advertise_time_insert"];
    $adv_time = explode("-",$adv_time);
    $year = $adv_time[0];
    $month = $adv_time[1];
    $day = $adv_time[2];
    $mo = get_month_name($month);
    $when = get_when($adv_time[0],$adv_time[1],$adv_time[2],$adv_time[3],$adv_time[4]);
    echo "
                <div id=\"adv_extra_inf\" class=\"row\">
                <p id=\"adv_extra_inf_day\">
                    انتشار در
                    $day
                    $mo
                    $year 
                </p>
                <p id=\"adv_extra_inf_today\">
                    $when
                </p>
    ";
    if($adv_id == $adver_id){
        echo "
        <p class=\"adv_extra_inf_stared\" id='adv_extra' adver_id='$adv_id'>
                    <i class=\"fa fa-star\"></i>
                    <span>نشان کردن</span>
                </p>";
    }else{
        echo "
        <p class=\"adv_extra_inf_star\" id='adv_extra' adver_id='$adv_id'>
                    <i class=\"fa fa-star\"></i>
                    <span>نشان کردن</span>
                </p>";
    }
    echo "
            </div>";
    $adv_factory = $row["advertise_factory"];
    echo
    "
                <div id=\"adv_other_title\">
                <center>
                    <h3 id=\"adv_other_title_h3\">
                        استخدام 
                        $adv_factory
                    </h3>
                </center>
            </div>
    ";
    $img = $row["advertise_img"];
    $adv_before = $row["advertise_before"];
    echo
    "
                <div id=\"adv_img\">
                <center>
                    <img src='adver_images/$img' alt=\"\">
                </center>
            </div>
            <div>
            <p>
           $adv_before
</p>
</div>

    ";

    $adv_ide = $row["advertise_ide"];
    $adv_profit = $row["advertise_profit"];
    $adv_rela = $row["advertise_rela"];
    $adv_jobs = $row["advertise_job"];
    $adv_jobs = explode("-",$adv_jobs);
    echo "
      <div id='adv_info_table' class='row'>
                <table class='table table-bordered table-hover'>
                    <thead>
                    <tr>
                        <th>عنوان شغلي</th>";
    if($adv_ide!=""){
        $adv_ide = explode("/",$adv_ide);
        $adv_ide = get_get(count($adv_jobs),count($adv_ide),$adv_ide);
        echo "
                        <th>شرايط احراز</th>";
    }
    if($adv_profit!="") {
        $adv_profit = explode("/",$adv_profit);
        $adv_profit = get_get(count($adv_jobs),count($adv_profit),$adv_profit);
        echo"

                        <th>مزايا</th>";
    }
    if($adv_rela!="") {
        $adv_rela = explode("/",$adv_rela);
        $adv_rela = get_get(count($adv_jobs),count($adv_rela),$adv_rela);
        echo"
    
                        <th>راه ارتباطي</th>";
    }
    echo "
                    </tr>
                    </thead>
                    <tbody>
    ";
    for ($i=0;$i<count($adv_jobs);$i++){
        $adv_job = $adv_jobs[$i];
        $quey = "SELECT job_name FROM job WHERE job_id='$adv_job'";
        $run_job = mysqli_query($database->getDb(),$quey);
        $row_job = mysqli_fetch_array($run_job);
        $job = $row_job["job_name"];
        echo"
                    <tr>
                        <td>$job</td>";
        if(count($adv_ide)>0){
            $adv_ide_ = explode("-",$adv_ide[$i]);
            echo "                        <td>
                            <ul>";
            foreach ($adv_ide_ as $ai){
                if($ai!=""){
                    echo"<li>$ai</li>";
                }
            }
            echo "</ul></td>";
        }

        if(count($adv_profit)>0){
            $adv_profit_ = explode("-",$adv_profit[$i]);
            echo "                        <td>
                            <ul>";
            foreach ($adv_profit_ as $ap){
                if($ap!=""){
                    echo"<li>$ap</li>";
                }
            }
            echo "</ul></td>";
        }

        if(count($adv_rela)>0){
            $adv_rela_ = explode("-",$adv_rela[$i]);
            echo "                        <td>
                            <ul>";
            foreach ($adv_rela_ as $ar){
                if($ar!=""){
                    echo"<li>$ar</li>";
                }
            }
            echo "</ul></td>";
        }
    }
    $adv_after = $row["advertise_after"];
    echo"
                        </tbody>
                </table>
            </div>
            <div id=\"adv_info_mo\">
                <p>$adv_after</p>
            </div>";
}

function call_info(){
    $database=new db();
    if(isset($_GET["id"])){
        $adv_id = $_GET["id"];
        $query = "SELECT advertise_mobile,advertise_phone,advertise_email,advertise_show,advertise_address FROM advertise WHERE advertise_id='$adv_id'";
        $run = mysqli_query($database->getDb(),$query);
        $row = mysqli_fetch_array($run);
        $adv_show = $row["advertise_show"];
        $adv_show = explode("-",$adv_show);
        if(in_array("mobile",$adv_show)){
            $mobile = $row["advertise_mobile"];
            echo "<div id=\"adv_info_call_info_mob\" class=\"adv_info_call\">
                        <div class=\"row\">
                            <div class=\"dash\"></div>
                            <span class=\"gray_cor\"></span>
                            <div class=\"adv_inf row\">
                                <p class=\"adv_info_call_info_p_first\">
                                    <i class=\"fa fa-mobile\"></i>
                                    شماره موبايل
                                </p>
                                <p class=\"adv_info_call_info_p_second\">
                                    $mobile
                                </p>
                            </div>
                        </div>
                    </div>";
        }
        if(in_array("factory_name",$adv_show)){
            $fac_address = $row["advertise_address"];
            echo "                    <div id=\"adv_info_call_info_add\" class=\"adv_info_call\">
                        <div class=\"row\">
                            <div class=\"dash\"></div>
                            <span class=\"gray_cor\"></span>
                            <div class=\"adv_inf row\">
                                <p class=\"adv_info_call_info_p_first\">
                                    <i class=\"fa fa-address-book\"></i>
                                    آدرس شرکت
                                </p>
                                <p class=\"adv_info_call_info_p_second\">
                                    $fac_address
                                </p>
                             </div>
                        </span>
                        </div>
                    </div>
";
        }
        if(in_array("email",$adv_show)){
            $email = $row['advertise_email'];
            echo "
                    <div id=\"adv_info_call_info_email\" class=\"adv_info_call\">
                        <div class=\"row\">
                            <div class=\"dash\"></div>
                            <span class=\"gray_cor\"></span>
                            <div class=\"adv_inf row\">
                                <p class=\"adv_info_call_info_p_first\">
                                    <i class=\"fa fa-envelope\"></i>
                                    ایمیل
                                </p>
                                <p class=\"adv_info_call_info_p_second\">
                                    $email
                                </p>
                            </div>
                            </span>
                        </div>
                    </div>

            ";
        }
        if(in_array("phone",$adv_show)){
            $phone = $row['advertise_phone'];
            echo "
                                <div id=\"adv_info_call_info_email\" class=\"adv_info_call\">
                        <div class=\"row\">
                            <div class=\"dash\"></div>
                            <span class=\"gray_cor\"></span>
                            <div class=\"adv_inf row\">
                                <p class=\"adv_info_call_info_p_first\">
                                    <i class=\"fa fa-envelope\"></i>
                                    تلفن
                                </p>
                                <p class=\"adv_info_call_info_p_second\">
                                    $phone
                                </p>
                            </div>
                            </span>
                        </div>
                    </div>

            ";
        }

    }
}
?>

    <!-- <div v-if="ZabdarShare"  > -->

    <!-- </div> -->