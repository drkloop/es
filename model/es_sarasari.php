<?php
require_once "db.php";
require_once "my_funcs.php";
require_once "func_adv.php";
$db = new db();
if(isset($_GET["id"])){
        $adv_id = $_GET["id"];
        $query = "SELECT * FROM global_advertise WHERE g_advertise_id='$adv_id'";
        $run = mysqli_query($db->getDb(),$query);
        $row = mysqli_fetch_array($run);
        $adv_title = $row["g_advertise_title"];
        echo
        "
            <div id=\"es_sa_info_infos_title\">
                
                <h4 id=\"es_sa_info_infos_title_h4\">
                    $adv_title
                </h4>
            </div>
    ";
        $adv_time = $row["g_advertisie_time_insert"];
        $adv_time = explode("-",$adv_time);
        $year = $adv_time[0];
        $month = $adv_time[1];
        $day = $adv_time[2];
        $mo = get_month_name($month);
        $when = get_when($adv_time[0],$adv_time[1],$adv_time[2],$adv_time[3],$adv_time[4]);
        echo "
                <div id=\"adv_extra_infs\" class=\"row\">
                <p id=\"adv_extra_inf_day\">
                    انتشار در
                    $day
                    $mo
                    $year 
                </p>
                <p id=\"adv_extra_inf_today\">
                    $when
                </p>
                    <p id='adv_admin'>
                    مدیر
</p>
            </div>
    ";
    $adv_second_titlle = $row["g_advertise_second_title"];
    echo "
    <div id=\"es_sa_info_infos_second_title\">
                <center>
                    <h4 id=\"es_sa_info_infos_second_title_h4\">
                        $adv_second_titlle
                    </h4>
                </center>
            </div>
    ";
    $adv_info_first = $row["g_advertise_info_first"];
    $adv_info_first = explode("/",$adv_info_first);
    if(count($adv_info_first)!=0){
        foreach ($adv_info_first as $item){
            echo "
                  <div class=\"es_sa_info_infos_first\">
";
            $item = explode("=",$item);
            if($item[0]!=""){
                echo "
                <div class=\"es_sa_info_infos_first_title row\">
                        <span class=\"es_sa_info_infos_first_p1\">e</span>
                        <span class=\"es_sa_info_infos_first_p2\">$item[0]</span>
                    </div>
                ";
            }
            if($item[1]!=""){
                $sample = explode("|",$item[1]);
                echo "
                <div class=\"es_sa_info_infos_first_info row\">
                        <p class=\"es_sa_info_infos_first_p3\">استخدام</p>
                        <div class=\"es_sa_info_infos_first_tri\">
                            <p class=\"es_sa_info_infos_first_img\"></p>
                        </div>
                ";
                if(count($sample)>1){
                    echo "
                    
                    <ul>
                    ";
                    foreach ($sample as $s){
                        echo "
                        <li>$s</li>
                        ";
                    }
                    echo "</ul>";
                }
                else{
                    echo"
                    <p class=\"es_sa_info_infos_first_p4\">
                            $item[1]
                        </p>
                    ";
                }

            }
            if($item[2]!=""){
                echo"
                <div class=\"divvv\">
                            <center>
                                <a href='$item[2]' class=\"es_sa_info_infos_first_info_a\">برای شروع ثبت نام اینجا کلیک کنید</a>
                            </center>
                        </div>
                ";
            }
            echo "
                           </div>
                  </div>
            ";
        }
    }

}
?>