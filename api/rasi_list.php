<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
date_default_timezone_set('Asia/Kolkata');

include_once('../includes/crud.php');
$db = new Database();
$db->connect();

if (empty($_POST['rashi_id'])) {
    $response['success'] = false;
    $response['message'] = "Rashi Id is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['year'])) {
    $response['success'] = false;
    $response['message'] = "Year is Empty";
    print_r(json_encode($response));
    return false;
}
if (empty($_POST['month'])) {
    $response['success'] = false;
    $response['message'] = "Month is Empty";
    print_r(json_encode($response));
    return false;
}

$year = $db->escapeString($_POST['year']);
$month = $db->escapeString($_POST['month']);
$rashi_id = $db->escapeString($_POST['rashi_id']);

$sql = "SELECT * FROM `rashi_tab` WHERE rashi_id = '$rashi_id' AND year='$year' AND month='$month'";
$db->sql($sql);
$res = $db->getResult();
$num = $db->numRows($res);
if($num>=1){
    $rows = array();
    $temp = array();
    foreach ($res as $row) {
        $temp['id'] = $row['id'];
        $temp['rashi_id'] = $row['rashi_id'];
        $temp['year'] = $row['year'];
        $temp['month'] = $row['month'];
        $temp['title'] = $row['title'];
        $temp['description'] = $row['description'];
        $rows[] = $temp;
    }
    $response['success'] = true;
    $response['message'] = "Rashi Tab Listed Successfullty";
    $response['data'] = $rows;
    print_r(json_encode($response));

}
else{
    $response['success'] = false;
    $response['message'] = "Not Found";
    print_r(json_encode($response));
}
?>