<?php

include_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $qoute = isset($_POST['qoute']) ? mysql_real_escape_string($_POST['qoute']) : "";
    $status = isset($_POST['status']) ? mysql_real_escape_string($_POST['status']) : "";

    $sql = "INSERT INTO `qoute_table` VALUES(NULL,'$qoute')";
    $qur = mysql_query($sql);
    if ($qur) {
        $json = array("status" => 1, "msg" => "Qoute added!");
    } else {
        $json = array("status" => 0, "msg" => "Error adding qoute!");
    }
} else {
    $json = array("status" => 0, "msg" => "Request method not accepted");
}

@mysql_close($conn);

header('Content-type: application/json');
echo json_encode($json);
