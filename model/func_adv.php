<?php
function get_get($count_1,$count_2,$adv_foo){
    if($count_1>$count_2){
        $b = $count_1-$count_2;
        for($i=0;$i<$b;$i++){
            array_push($adv_foo,"");
        }
    }
    return $adv_foo;
}
?>