<?php
require_once "db.php";
require_once "my_funcs.php";
function get_city()
{
    $database =new db();
    $query = "SELECT * FROM city";
    $run = mysqli_query($database->getDb(), $query);
    while ($row = mysqli_fetch_array($run)) {
        $city_id = $row["city_id"];
        $city_name = $row["city_name"];
        $city_val=$city_id."-cityid";
        echo "
    <li><input type='checkbox' class='zone_check filter_check filter_check_zone' val='$city_val'>$city_name</li>
    ";
    }
}

function get_majors()
{
    $database =new db();
    $query = "SELECT * FROM major";
    $run = mysqli_query($database->getDb(), $query);
    while ($row = mysqli_fetch_array($run)) {
        $major_id = $row["major_id"];
        $major_name = $row["major_name"];
        $major_val = $major_id."-majorid";
        echo "
    <p>
                                <input val='$major_val' type=\"checkbox\" class=\"filter_check filter_check_major\">
                                $major_name
                            </p>
    ";
    }
}

function get_job_type()
{
    $database =new db();
    $query = "SELECT * FROM job_type";
    $run = mysqli_query($database->getDb(), $query);
    while ($row = mysqli_fetch_array($run)) {
        $job_type_id = $row["job_type_id"];
        $job_type_name = $row["job_type_name"];
        $query_job = "SELECT * FROM job WHERE job_type='$job_type_id'";
        $run_job = mysqli_query($database->getDb(), $query_job);
        echo "
        <div class=\"fillter\">
                        <p class=\"fillter_title\">
                            <i class=\"fa fa-bars\"></i>
                            $job_type_name
                            <i class=\"fa fa-angle-left\"></i>
                        </p>
                                    <div class='fills'>

                    
        ";
        while ($row_job = mysqli_fetch_array($run_job)) {
            $job_name = $row_job["job_name"];
            $job_id = $row_job["job_id"];
            $job_val = $job_id."-jobid";
            echo "
                            <p class='ppp'>
                                <input type='checkbox' class='filter_check' val='$job_val'>
                                $job_name
                            </p>
            ";
        }
        echo "
        </div>
        </div>
        ";
    }
}

function get_jobs(){
    $database =new db();
    $query = "SELECT * FROM job";
    $run = mysqli_query($database->getDb(), $query);
    while($row = mysqli_fetch_array($run)){
        $job_id = $row["job_id"];
        $job_name = $row["job_name"];
        $job_val = $job_id."-jobid";
        echo "
                            <p>
                        <input type=\"checkbox\" class=\"filter_check filter_check_job\" val='$job_val'>
                        $job_name
                    </p>
        ";
    }
}

function advertise_explode($filter_check_job){
    $arr_fill = [];
    foreach ($filter_check_job as $job){
        $job = explode("-",$job);
        array_push($arr_fill,$job[0]);
    }
    $arr_fill = array_unique($arr_fill);
    return $arr_fill;
}

function get_id($what_checked,$what_id,$what_thing,$table){
    $database =new db();
    if(isset($_POST["$what_checked"])){
        $arr_job = [];
        $filter_check_job = $_POST["$what_checked"];
        $arr_fill = advertise_explode($filter_check_job);
        $query = "SELECT $what_id,$what_thing FROM $table";
        $run = mysqli_query($database->getDb(),$query);
        while($row = mysqli_fetch_array($run)){
            $advertise_id = $row["$what_id"];
            $advertise_job = $row["$what_thing"];
            $advertise_job = explode("-",$advertise_job);
            foreach ($advertise_job as $job){
                foreach ($arr_fill as $job_check){
                    if($job == $job_check){
                        array_push($arr_job,$advertise_id);
                    }
                }
            }
        }
        return array_unique($arr_job);
    }
}

function get_id_2($what_checked,$what_id,$what_thing){
    $database =new db();
    if(isset($_POST["$what_checked"])){
        $arr_job = [];
        $filter_check_job = $_POST["$what_checked"];
        $arr_fill = advertise_explode($filter_check_job);
        $query = "SELECT $what_id,$what_thing FROM advertise";
        $run = mysqli_query($database->getDb(),$query);
        while($row = mysqli_fetch_array($run)){
            $advertise_id = $row["$what_id"];
            $advertise_job = $row["$what_thing"];
            $advertise_job = explode("-",$advertise_job);
            foreach ($advertise_job as $job){
                foreach ($arr_fill as $job_check){
                    if($job == $job_check || $job==3){
                        array_push($arr_job,$advertise_id);
                    }
                }
            }
        }
        return array_unique($arr_job);
    }
}

function get_pag($query,$page){
    $database =new db();
    $run = mysqli_query($database->getDb(),$query);
    $num_rows = mysqli_num_rows($run);
    $num_rows = ceil($num_rows/3);
    echo "<div id='pagination'>";
    for($i=1;$i<=$num_rows;$i++){
        if($i==$page){
            echo "
        <button class='btn_pag btn_pag_active' val='$i'>$i</button>
        ";
        }else{
            echo "
        <button class='btn_pag' val='$i'>$i</button>
        ";
        }

    }
    echo "</div>";
}

function get_advertisees($query,$page){
    $database =new db();
    $page = ($page-1)*3;
    $query = $query." ORDER BY advertise_id DESC LIMIT $page,3";
    $run = mysqli_query($database->getDb(), $query);

    while ($row = mysqli_fetch_array($run)) {
        $advertise_id = $row["advertise_id"];
        $advertise_title = $row["advertise_title"];
        $advertise_factory = $row["advertise_factory"];
        $advertise_city = $row["advertise_city"];
        $query_city = "SELECT * FROM city WHERE city_id='$advertise_city'";
        $run_city = mysqli_query($database->getDb(),$query_city);
        $row_city = mysqli_fetch_array($run_city);
        $advertise_city = $row_city["city_name"];
        $advertise_time_insert = $row["advertise_time_insert"];
        $advertise_timing = $row["advertise_timing"];
        $advertise_fast = $row["advertise_fast"];
        $advertise_img = $row["advertise_img"];
        if ($advertise_timing == 1) {
            $advertise_timing = "تمام وقت";
        } elseif ($advertise_timing == 2) {
            $advertise_timing = "پاره وقت";
        } else {
            $advertise_timing = "هردو";
        }
        $advertise_time_insert = explode("-", $advertise_time_insert);
        $when = get_when($advertise_time_insert[0], $advertise_time_insert[1], $advertise_time_insert[2], $advertise_time_insert[3], $advertise_time_insert[4]);
        if ($advertise_fast == 1) {
            echo "
        <div class=\"col-md-12 advertise advertise_fast\">
                <div class=\"row\">
                    <i class=\"fa fa-plus plus_info\"></i>
                    <div class=\"col-md-3 adver_img_for_screen\">
                        <center>
                            <img src='./adver_images/$advertise_img' alt=\"\">
                        </center>
                    </div>
                                        <div class=\"col-md-9\">
                    <div class=\"advertise_title\">
                        <h4><a href='./adver?id=$advertise_id'>$advertise_title</a></h4>
                    </div>


                        <div class=\"adver_row_1 row\">
                            <div class=\"advertise_place col-md-6\">
                                <i class=\"fa fa-building\"></i>
                                <a href=\"#\">$advertise_factory</a>
                            </div>
                            <div class=\"advertise_city col-md-6 row\">
                                <i class=\"fa fa-globe\"></i>
                                <p>$advertise_city</p>
                            </div>
                        </div>
                        <div class=\"adver_row_1 row\">
                            <div class=\"advertise_time col-md-6 row\">
                                <i class=\"fa fa-bell\"></i>
                                <p>$when</p>
                            </div>
                            <div class=\"advertise_timing col-md-6 row\">
                                <i class=\"fa fa-calendar\"></i>
                                <p>$advertise_timing</p>
                            </div>
                        </div>

                    </div>
                    <div class=\"col-md-3 adver_img\">
                        <img src='./adver_images/$advertise_img' alt=\"\">
                    </div>
                    
                </div>
                <div class=\"col-md-12 row adver_plus_info\">
                <div class=\"col-md-12 ad_border\">
                <center>
                <a href='./adver?id=$advertise_id'>
                     <i class='fa fa-edge'></i>
                مشاهده جزئیات
                </a>
            </center>
             </div>
                </div>

            </div>
        ";
        } else {
            echo "
                    <div class=\"col-md-12 advertise\">
                <div class=\"row\">
                    <div class='col-md-3 adver_img_for_screen'>
                        <center>
                            <img src='./adver_images/$advertise_img' alt=''>
                        </center>
                    </div>
                                        <div class=\"col-md-9\">
                    <div class=\"advertise_title\">
                        <h4><a href='./adver?id=$advertise_id'>$advertise_title</a></h4>
                    </div>
                        <div class=\"adver_row_1 row\">
                            <div class=\"advertise_place col-md-6\">
                                <i class=\"fa fa-building\"></i>
                                <a href=\"#\">$advertise_factory</a>
                            </div>
                            <div class=\"advertise_city col-md-6 row\">
                                <i class=\"fa fa-globe\"></i>
                                <p>$advertise_city</p>
                            </div>
                        </div>
                        <div class=\"adver_row_1 row\">
                            <div class=\"advertise_time col-md-6 row\">
                                <i class=\"fa fa-bell\"></i>
                                <p>$when</p>
                            </div>
                            <div class=\"advertise_timing col-md-6 row\">
                                <i class=\"fa fa-calendar\"></i>
                                <p>$advertise_timing</p>
                            </div>
                        </div>

                    </div>
                    <div class=\"col-md-3 adver_img\">
                        <img class='advertise_short_img' src='./adver_images/$advertise_img' alt=\"\">
                    </div>
                    <div class=\"col-md-12 row adver_plus_info\">
                    <div class=\"col-md-12 ad_border\">
                    <center>
                    <a href='./adver?id=$advertise_id'>
                         <i class='fa fa-edge'></i>
                    مشاهده جزئیات
                    </a>
                </center>
                 </div>
                    </div>
                </div>
            </div>
   
        ";
        }
    }
}

?>
<div v-if="zabdarshare">

    <!-- <div class="Modal-backdrop">
    </div>
    <div id="modalshare">
        <div id="blue-header">
            <b>
                اشتراک گذاری
                <a href="#" class="linkWithOutUnderLine" style="float: left;margin-left:5px" @click="ZaShare=0">
                    &times;
                </a>
            </b>
        </div>

        <p style="margin-right: 10px;">همچنین میتوانید لینک کوتاه زیر را جهت دسترسی به صفحه فوق برای اشتراک گذاری کپی
            کنید</p>
        <div class="row container">
            <div @click="btnCopy= !btnCopy" class="col-3">
                <copylink link_url="<?= $_SESSION['FullUrl']  ?>"></copylink>
            </div>
            <div class="col-9">
                <div v-if="btnCopy==1">
                    <copy></copy>
                </div>
                <input type="text" class="form-control" style="direction: ltr;" value="<?= $_SESSION['FullUrl']  ?>"
                    disabled>
            </div>
        </div>
        <hr>
        <p style="margin-right: 10px">راه ارتباطي شما از طريق شبكه هاي اجتماعي</p>
        <div style="margin-right: 10%;">
            <a href="#" class="fa far fa-facebook"></a>
            <a href="#" class="fa  far  fa-instagram"></a>
            <a href="#" class="fa  far fa-yahoo"></a>
            <a href="#" class="fa far  fa-linkedin"></a>
            <a href="#" class="fa far fa-google far-google"></a>
            <a href="#" class="fa far fa-telegram"></a>
            <a href="#" class="fa far fa-youtube"></a>
            <a href="#" class="fa far fa-twitter"></a>
        </div>
    </div> -->
</div>


<!--  -->

<!-- <div class=\"col-md-12 row adver_plus_info\">
                        <div class=\"col-md-4 ad_border\">
                            <center>
                                <a href='./adver?id=$advertise_id'>
                                     <i class='fa fa-edge'></i>
                                مشاهده جزئیات
                                </a>
                            </center>
                        </div>
                        <div class=\"col-md-4 ad_border\">
                            <center>
                                <i class=\"fa fa-share\" ></i>
                                اشتراک گذاری
                            </center>
                        </div>
                        <div class=\"col-md-4\">
                            <center>
                                <i class=\"fa fa-star\"></i>
                                نشان کردن
                            </center>
                        </div>
                    </div>

 -->

<!--  -->