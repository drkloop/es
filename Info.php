<!--$_SESSION['Vist']-->
<!--$_SESSION['FullUrl']-->
<!--$_SESSION['IPADDRESS']-->
<!-- $_SESSION['Browser']-->
<!--$_SESSION['DIVISE']-->
<!--$_SESSION['country']-->
<!--$_SESSION['state']-->
<?php

$PATH_PROJECT =  __DIR__;
$_SESSION['PATH_PROJECT']=$PATH_PROJECT;
require_once 'core/autoload.php';
require_once 'core/constance.php';
new Assetes();
new View();
//user Token for session
if (!isset($_SESSION['Vist'])) {
    $TOKEN = uniqid("e_estekhdam", 2);
    $TOKEN .= MD5(rand());
    $TOKEN .= Sha1(rand());
    $_SESSION['Vist'] = $TOKEN;
}
//###
// url of each page
$fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$_SESSION['FullUrl']=$fullurl;
//###

//ip
function GetRealIp()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        //check ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        //to check ip is pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else
        $ip = $_SERVER['REMOTE_ADDR'];
    return $ip;
}
$_SESSION['IPADDRESS']=(GetRealIp());
//###
//browser
function getUserBrowser(){
    $fullUserBrowser = (!empty($_SERVER['HTTP_USER_AGENT'])?
        $_SERVER['HTTP_USER_AGENT']:getenv('HTTP_USER_AGENT'));
    $userBrowser = explode(')', $fullUserBrowser);
    $userBrowser = $userBrowser[count($userBrowser)-1];
    if((!$userBrowser || $userBrowser === '' || $userBrowser === ' ' || strpos($userBrowser, 'like Gecko') === 1) && strpos($fullUserBrowser, 'Windows') !== false){
        return 'Internet-Explorer';
    }else if((strpos($userBrowser, 'Edge/') !== false || strpos($userBrowser, 'Edg/') !== false) && strpos($fullUserBrowser, 'Windows') !== false){
        return 'Microsoft-Edge';
    }else if(strpos($userBrowser, 'Chrome/') === 1 || strpos($userBrowser, 'CriOS/') === 1){
        return 'Google-Chrome';
    }else if(strpos($userBrowser, 'Firefox/') !== false || strpos($userBrowser, 'FxiOS/') !== false){
        return 'Mozilla-Firefox';
    }else if(strpos($userBrowser, 'Safari/') !== false && strpos($fullUserBrowser, 'Mac') !== false){
        return 'Safari';
    }else if(strpos($userBrowser, 'OPR/') !== false && strpos($fullUserBrowser, 'Opera Mini') !== false){
        return 'Opera-Mini';
    }else if(strpos($userBrowser, 'OPR/') !== false){
        return 'Opera';
    }
    return false;
}
 $_SESSION['Browser'] =  getUserBrowser();
//###

//Divice
require_once __DIR__ . "/PanelAdmin/bro.php";
$detect = new Mobile_Detect;
// اگر دیوایس کاربر موبایل بود
// اگر دیوایس کاربر تبلت بود
if ( $detect->isTablet() ){
    $DIVISE= "تبلت ";
    $_SESSION['DIVISE']= $DIVISE;
}
elseif ( $detect->isMobile() ) {
    $DIVISE= " موبایل";
    $_SESSION['DIVISE']= $DIVISE;
}
// اگر دیوایس کاربر دسکتاپ بود
else{
    $DIVISE= " رایانه  ";
    $_SESSION['DIVISE']= $DIVISE;
}
//###
//country and state
function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "country_code":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}
$_SESSION['country']= ip_info("77.73.66.100", "country"); // United States
//  echo ip_info("188.211.38.21", "country_code"); // US
$_SESSION['state']= ip_info("77.73.66.100", "state"); // California
//  echo ip_info("188.211.38.21", "city"); // Menlo Park
//  echo ip_info("188.211.38.21", "address"); // Menlo Park, California, United States
//  print_r(ip_info("188.211.38.21", "location")); // Array ( [city] => Menlo Park [state] => California [country] => United States [country_code] => US [continent] => North America [continent_code] => NA )
//###
if (!isset($_SESSION['flagVisit'])) {
    $database =  mysqli_connect('localhost', 'root', '', 'e_estekhdam');;
    $_SESSION['flagVisit']="its visited";
    $Vist = $_SESSION['Vist'];
    $IPADDRESS = $_SESSION['IPADDRESS'];
    $Browser = $_SESSION['Browser'];
    $DIVISE = $_SESSION['DIVISE'];
    $country = $_SESSION['country'];
    $state = $_SESSION['state'];
    $dataBaseCheck = mysqli_query($database, "SELECT * FROM infouser");
    $sql = "INSERT INTO infouser (Token_session	,Browser, IpAddress,Country,City,Devise) VALUES ('$Vist','$Browser' ,'$IPADDRESS','$country',' $state','$DIVISE')";
    if (mysqli_query($database, $sql)) {
    }
}
?>