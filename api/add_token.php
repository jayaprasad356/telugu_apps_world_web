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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['fcm_id'])) {
        $response['success'] = false;
        $response['message'] = "FCM ID is Empty";
        print_r(json_encode($response));
        return;
    }

    $fcm_id = $db->escapeString($_POST['fcm_id']);

    $sql = "INSERT INTO `device_token` (fcm_id) VALUES ('$fcm_id')";
    $db->sql($sql);

    $response['success'] = true;
    $response['message'] = "Device token added Successfully";
    print_r(json_encode($response));
} else {
    $response['success'] = false;
    $response['message'] = "Invalid request method";
    print_r(json_encode($response));
}
?>
