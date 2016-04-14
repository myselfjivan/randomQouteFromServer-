<?php

include_once('config.php');

    $id = array();
    $query = mysql_query("SELECT `id` FROM `qoute_table` WHERE 1");
    $result1 = array();
    while ($a = mysql_fetch_array($query)) {
        extract($a);
        $result1[] = array($id);
    }
$rand_keys = array_rand($result1, 2);
$uid = $rand_keys[0];
if($uid != 0){
if (!empty($uid)) {
    $qur = mysql_query("select id, qoute from `qoute_table` where ID='$uid'");
    $result = array();
    while ($r = mysql_fetch_array($qur)) {
        extract($r);
        $result[] = array("id" => $id ,"qoute" => $qoute);
    }
        $json = array("status" => 1, "info" => $result);
    } else {
        $json = array("status" => 0, "msg" => "id qoute not present");
    }
}else
{
    $uid = $rand_keys[0];
}
@mysql_close($conn);

//output
header('Content-type: application/json');
echo json_encode($json);
