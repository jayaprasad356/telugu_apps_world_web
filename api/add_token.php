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

    $check_sql = "SELECT * FROM `device_token` WHERE fcm_id = '$fcm_id'";
    $db->sql($check_sql);
    $res = $db->getResult();

    if ($db->numRows($res) > 0) {
        // If the FCM ID already exists
        $response['success'] = false;
        $response['message'] = "FCM ID already exists";
        print_r(json_encode($response));
    } else {
        // If the FCM ID does not exist, insert it
        $sql = "INSERT INTO `device_token` (fcm_id) VALUES ('$fcm_id')";
        $db->sql($sql);
        
        // Get the inserted data from the database
        $get_sql = "SELECT * FROM `device_token` WHERE fcm_id = '$fcm_id'";
        $db->sql($get_sql);
        $res = $db->getResult();
        $num = $db->numRows($res);
        
        if ($num >= 1) {
            $rows = array();
            foreach ($res as $row) {
                $id = $row['id'];
                $rows[] = array('id' => $id, 'fcm_id' => $fcm_id);
            }
            $response['success'] = true;
            $response['message'] = "Device token added and listed Successfully";
            $response['data'] = $rows;
            print_r(json_encode($response));
        } else {
            $response['success'] = false;
            $response['message'] = "Data Not Found";
            print_r(json_encode($response));
        }
    }
} else {
    $response['success'] = false;
    $response['message'] = "Invalid request method";
    print_r(json_encode($response));
}
?>
