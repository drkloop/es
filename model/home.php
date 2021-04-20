<?php
include "db.php";
include "my_funcs.php";
function get_last_advertises(){
    $database=new db();
    $query = "SELECT advertise_id,advertise_title,advertise_time_insert,advertise_city FROM advertise ORDER BY advertise_id ASC LIMIT 10";
    $run = mysqli_query($database->getDb(),$query);
    $i=1;
    while ($row = mysqli_fetch_array($run)){
        $rows = mysqli_num_rows($run);
        $adver_title = $row["advertise_title"];
        $adver_id = $row["advertise_id"];
        $adver_time = $row["advertise_time_insert"];
        $advertise_city = $row["advertise_city"];
        $city_color = $row["advertise_city"];
        $query_city = "SELECT city_name FROM city WHERE city_id='$advertise_city'";
        $run_city = mysqli_query($database->getDb(),$query_city);
        $row_city = mysqli_fetch_array($run_city);
        $city = $row_city["city_name"];
        $adver_time = explode("-",$adver_time);
        $mo_date = get_month_name($adver_time[1]);
        $date_adver = $adver_time[2]." ".$mo_date;
        if($i==1){
            echo"
                                <a href='./adver?id=$adver_id' class=\"col-md-12 col-xs-12 sample_list row first_child\">
                            <span class=\"sample_list_title\">$adver_title</span>
                            <div class=\"actions\">
                                <span class=\"sample_list_time hidden-xs hidden-sm\">$date_adver</span>
                                <span val-color='$city_color' class=\"city_label\">$city</span>
                            </div>

                        </a>

        ";
        }elseif($i==$rows){
            echo"
                                <a href='./adver?id=$adver_id' class=\"col-md-12 col-xs-12 sample_list row last_child\">
                            <span class=\"sample_list_title\">$adver_title</span>
                            <div class=\"actions\">
                                <span class=\"sample_list_time hidden-xs hidden-sm\">$date_adver</span>
                                <span val-color='$city_color' class=\"city_label\">$city</span>
                            </div>

                        </a>

        ";
        }else{
            echo"
                                <a href='./adver?id=$adver_id' class=\"col-md-12 col-xs-12 sample_list row\">
                            <span class=\"sample_list_title\">$adver_title</span>
                            <div class=\"actions\">
                                <span class=\"sample_list_time hidden-xs hidden-sm\">$date_adver</span>
                                <span val-color='$city_color' class=\"city_label\">$city</span>
                            </div>

                        </a>

        ";
        }
        $i++;
    }
}
function get_fast_advertises(){
    $database=new db();
    $query = "SELECT advertise_id,advertise_title,advertise_time_insert,advertise_city FROM advertise WHERE advertise_fast=1 ORDER BY advertise_id ASC LIMIT 10";
    $run = mysqli_query($database->getDb(),$query);
    $i=1;
    while ($row = mysqli_fetch_array($run)){
        $rows = mysqli_num_rows($run);
        $adver_title = $row["advertise_title"];
        $adver_id = $row["advertise_id"];
        $adver_time = $row["advertise_time_insert"];
        $advertise_city = $row["advertise_city"];
        $city_color = $row["advertise_city"];
        $query_city = "SELECT city_name FROM city WHERE city_id='$advertise_city'";
        $run_city = mysqli_query($database->getDb(),$query_city);
        $row_city = mysqli_fetch_array($run_city);
        $city = $row_city["city_name"];
        $adver_time = explode("-",$adver_time);
        $mo_date = get_month_name($adver_time[1]);
        $date_adver = $adver_time[2]." ".$mo_date;
        if($i==1){
            echo"
                                <a href='./adver?id=$adver_id' class=\"col-md-12 col-xs-12 sample_list row first_child\">
                            <span class=\"sample_list_title\">$adver_title</span>
                            <div class=\"actions\">
                                <span class=\"sample_list_time hidden-xs hidden-sm\">$date_adver</span>
                                <span val-color='$city_color' class=\"city_label\">$city</span>
                            </div>

                        </a>

        ";
        }elseif($i==$rows){
            echo"
                                <a href='./adver?id=$adver_id' class=\"col-md-12 col-xs-12 sample_list row last_child\">
                            <span class=\"sample_list_title\">$adver_title</span>
                            <div class=\"actions\">
                                <span class=\"sample_list_time hidden-xs hidden-sm\">$date_adver</span>
                                <span val-color='$city_color' class=\"city_label\">$city</span>
                            </div>

                        </a>

        ";
        }else{
            echo"
                                <a href='./adver?id=$adver_id' class=\"col-md-12 col-xs-12 sample_list row\">
                            <span class=\"sample_list_title\">$adver_title</span>
                            <div class=\"actions\">
                                <span class=\"sample_list_time hidden-xs hidden-sm\">$date_adver</span>
                                <span val-color='$city_color' class=\"city_label\">$city</span>
                            </div>

                        </a>

        ";
        }
        $i++;
    }
}
function get_sarasari_advertises(){
    $database=new db();
    $query = "SELECT * FROM global_advertise ORDER BY g_advertise_id ASC LIMIT 10";
    $run = mysqli_query($database->getDb(),$query);
    $i=1;
    while ($row = mysqli_fetch_array($run)){
        $rows = mysqli_num_rows($run);
        $adver_title = $row["g_advertise_title"];
        $adver_id = $row["g_advertise_id"];
        $adver_time = $row["g_advertisie_time_insert"];
        $adver_time = explode("-",$adver_time);
        $mo_date = get_month_name($adver_time[1]);
        $date_adver = $adver_time[2]." ".$mo_date;
        if($i==1){
            echo"
                                <a href='./estekhdamSarasari?id=$adver_id' class=\"col-md-12 col-xs-12 sample_list row first_child\">
                            <span class=\"sample_list_title\">$adver_title</span>
                            <div class=\"actions\">
                                <span class=\"sample_list_time hidden-xs hidden-sm\">$date_adver</span>
                            </div>

                        </a>

        ";
        }elseif($i==$rows){
            echo"
                                <a href='./adver?id=$adver_id' class=\"col-md-12 col-xs-12 sample_list row last_child\">
                            <span class=\"sample_list_title\">$adver_title</span>
                            <div class=\"actions\">
                                <span class=\"sample_list_time hidden-xs hidden-sm\">$date_adver</span>
                            </div>

                        </a>

        ";
        }else{
            echo"
                                <a href='./adver?id=$adver_id' class=\"col-md-12 col-xs-12 sample_list row\">
                            <span class=\"sample_list_title\">$adver_title</span>
                            <div class=\"actions\">
                                <span class=\"sample_list_time hidden-xs hidden-sm\">$date_adver</span>
                            </div>

                        </a>

        ";
        }
        $i++;
    }
}

function get_last_qom_advertises(){
    $database=new db();
    $query = "SELECT advertise_id,advertise_title,advertise_time_insert,advertise_city FROM advertise WHERE advertise_city=2 ORDER BY advertise_id ASC LIMIT 10";
    $run = mysqli_query($database->getDb(),$query);
    $i=1;
    while ($row = mysqli_fetch_array($run)){
        $rows = mysqli_num_rows($run);
        $adver_title = $row["advertise_title"];
        $adver_id = $row["advertise_id"];
        $adver_time = $row["advertise_time_insert"];
        $advertise_city = $row["advertise_city"];
        $query_city = "SELECT city_name FROM city WHERE city_id='$advertise_city'";
        $run_city = mysqli_query($database->getDb(),$query_city);
        $row_city = mysqli_fetch_array($run_city);
        $city = $row_city["city_name"];
        $adver_time = explode("-",$adver_time);
        $mo_date = get_month_name($adver_time[1]);
        $date_adver = $adver_time[2]." ".$mo_date;
        if($i==1){
            echo"
                                <a href='./adver?id=$adver_id' class=\"col-md-12 col-xs-12 sample_list row first_child\">
                            <span class=\"sample_list_title\">$adver_title</span>
                            <div class=\"actions\">
                                <span class=\"sample_list_time hidden-xs hidden-sm\">$date_adver</span>
                            </div>

                        </a>

        ";
        }elseif($i==$rows){
            echo"
                                <a href='./adver?id=$adver_id' class=\"col-md-12 col-xs-12 sample_list row last_child\">
                            <span class=\"sample_list_title\">$adver_title</span>
                            <div class=\"actions\">
                                <span class=\"sample_list_time hidden-xs hidden-sm\">$date_adver</span>
                            </div>

                        </a>

        ";
        }else{
            echo"
                                <a href='./adver?id=$adver_id' class=\"col-md-12 col-xs-12 sample_list row\">
                            <span class=\"sample_list_title\">$adver_title</span>
                            <div class=\"actions\">
                                <span class=\"sample_list_time hidden-xs hidden-sm\">$date_adver</span>
                            </div>

                        </a>

        ";
        }
        $i++;
    }
}
?>