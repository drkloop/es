<?php
function gregorian_to_jalali($gy, $gm, $gd) {
    $g_d_m = array(0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334);
    $gy2 = ($gm > 2)? ($gy + 1) : $gy;
    $days = 355666 + (365 * $gy) + ((int)(($gy2 + 3) / 4)) - ((int)(($gy2 + 99) / 100)) + ((int)(($gy2 + 399) / 400)) + $gd + $g_d_m[$gm - 1];
    $jy = -1595 + (33 * ((int)($days / 12053)));
    $days %= 12053;
    $jy += 4 * ((int)($days / 1461));
    $days %= 1461;
    if ($days > 365) {
        $jy += (int)(($days - 1) / 365);
        $days = ($days - 1) % 365;
    }
    if ($days < 186) {
        $jm = 1 + (int)($days / 31);
        $jd = 1 + ($days % 31);
    } else{
        $jm = 7 + (int)(($days - 186) / 30);
        $jd = 1 + (($days - 186) % 30);
    }


    $my_date = $jy."-".$jm."-".$jd;
    return $my_date;
}
function get_when($date_year,$date_month,$date_day,$date_hour,$date_minute){
    date_default_timezone_set('Iran');
    $year = date("Y");
    $month = date("m");
    $day = date("d");
    $hour = date("H");
    $minute = date("i");
    $date = gregorian_to_jalali($year,$month,$day);
    $date = explode("-",$date);
    $year_dist = $date[0]-$date_year;
    $month_dist = $date[1]-$date_month;
    $day_dist = $date[2]-$date_day;
    $hour_dist = $hour-$date_hour;
    $minute_dist = $minute-$date_minute;

    $diff = ($year_dist*365*60*60*24) + ($month_dist*30*60*60*24) + ($day_dist*60*60*24) + ($hour_dist*60*60) + ($minute_dist*60);
    $years = floor($diff / (365*60*60*24));

    $months = floor(($diff - $years * 365*60*60*24)
        / (30*60*60*24));

    $days = floor(($diff - $years * 365*60*60*24 -
            $months*30*60*60*24)/ (60*60*24));

    $hours = floor(($diff - $years * 365*60*60*24
            - $months*30*60*60*24 - $days*60*60*24)
        / (60*60));

    $minutes = floor(($diff - $years * 365*60*60*24
            - $months*30*60*60*24 - $days*60*60*24
            - $hours*60*60)/ 60);

    $seconds = floor(($diff - $years * 365*60*60*24
        - $months*30*60*60*24 - $days*60*60*24
        - $hours*60*60 - $minutes*60));


    if($years==0 && $months==0 && $days==0 && $hours==0 && $minutes==0){
        return "لحظاتی قبل";
    }elseif($years==0 && $months==0 && $days==0 && $hours==0 && $minute_dist!=0){
        $for_ret = $minutes." دقیقه قبل";
        return $for_ret;
    }elseif($years==0 && $months==0 && $days==0 && $hours!=0){
        $for_ret = $hours." ساعت قبل ";
        return $for_ret;
    }elseif($years==0 && $months==0 && $days!=0){
        $for_ret = $days." روز قبل ";
        return $for_ret;
    } elseif($years==0 && $months!=0){
        $for_ret = $months." ماه قبل ";
        return $for_ret;
    }else{
        $for_ret = $years." سال قبل ";
        return $for_ret;
    }

}
function get_month_name($jm){
    switch ($jm){
        case 1:
            $jmm="قروردین";
            break;
        case 2:
            $jmm="اردیبشهت";
            break;
        case 3:
            $jmm="خرداد";
            break;
        case 4:
            $jmm="تیر";
            break;
        case 5:
            $jmm="مرداد";
            break;
        case 6:
            $jmm="شهریور";
            break;
        case 7:
            $jmm="مهر";
            break;
        case 8:
            $jmm="آبان";
            break;
        case 9:
            $jmm="آذر";
            break;
        case 10:
            $jmm="دی";
            break;
        case 11:
            $jmm="بهمن";
            break;
        case 12:
            $jmm="اسفند";
            break;
    }
    return $jmm;
}
?>