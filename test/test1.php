<?php

function getreservation(){
    require('dbconnect.php');
    $posts = $db->query("SELECT * FROM cl");
    $reservation_member = array();

    foreach($posts as $post){
        $day_out=strtotime((string) $post['day']);
        $member_out = $post['schedule'];
        $reservation_member[date('Y-m-d', $day_out)] = $member_out;
    }
    
    return $reservation_member;
}

$a = getreservation();
// 配列を出すときはprint_rを使う
print_r($a);
?>