<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


include_once('../includes/crud.php');
$db = new Database();
$db->connect();


$sql = "SELECT * FROM `panchangam`";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['date'] = $row['date'];
    $temp['sunrise'] = date('h:i a', strtotime($row['sunrise']));
    $temp['sunset'] = date('h:i a', strtotime($row['sunset']));
    $temp['moonrise'] = date('h:i a', strtotime($row['moonrise']));
    $temp['moonset'] = date('h:i a', strtotime($row['moonset']));
    $rows[] = $temp;
}
$response['success'] = true;
$response['message'] = "Panchangam Listed Successfullty";
$response['panchangam_list'] = $rows;
unset($temp);


$sql = "SELECT * FROM `panchangam_variant`";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['panchangam_id'] = $row['panchangam_id'];
    $temp['title'] = $row['title'];
    $temp['description'] = $row['description'];
    $rows[] = $temp;
}
$response['panchangam_tab_list'] = $rows;
unset($temp);



$sql = "SELECT * FROM `festivals`";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['date'] = $row['date'];
    $temp['festival'] = $row['festival'];
    $rows[] = $temp;
}
$response['festivals_list'] = $rows;
unset($temp);


$sql = "SELECT * FROM `muhurtham`";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['muhurtham'] = $row['muhurtham'];
    $rows[] = $temp;
}
$response['muhurtham_list'] = $rows;
unset($temp);


$sql = "SELECT * FROM `muhurtham_tab`";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['muhurtham_id'] = $row['muhurtham_id'];
    $temp['date'] = $row['date'];
    $temp['title'] = $row['title'];
    $temp['description'] = $row['description'];
    $rows[] = $temp;
}
$response['muhurtham_tab_list'] = $rows;
unset($temp);


$sql = "SELECT * FROM `rashi`";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['rashi'] = $row['rashi'];
    $rows[] = $temp;
}
$response['rashi_list'] = $rows;
unset($temp);


// $sql = "SELECT * FROM `rashi_tab`";
// $db->sql($sql);
// $res = $db->getResult();
// $rows = array();
// $temp = array();
// foreach ($res as $row) {
//     $temp['id'] = $row['id'];
//     $temp['rashi_id'] = $row['rashi_id'];
//     $temp['date'] = $row['date'];
//     $temp['title'] = $row['title'];
//     $temp['description'] = $row['description'];
//     $rows[] = $temp;
// }
// $response['rashi_tab_list'] = $rows;
// unset($temp);

$sql = "SELECT * FROM `balli_sasthram`";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['title'] = $row['title'];
    $temp['description'] = $row['description'];
    $rows[] = $temp;
}
$response['balli_sastham_list'] = $rows;
unset($temp);


$sql = "SELECT * FROM `namakaram`";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['title'] = $row['title'];
    $temp['description'] = $row['description'];
    $rows[] = $temp;
}
$response['namakaram_list'] = $rows;
unset($temp);


$sql = "SELECT * FROM `sissu_janma`";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['title'] = $row['title'];
    $temp['description'] = $row['description'];
    $rows[] = $temp;
}
$response['sissu_janma_list'] = $rows;
unset($temp);

$sql = "SELECT * FROM `audios`";
$db->sql($sql);
$res = $db->getResult();
$rows = array();
$temp = array();
foreach ($res as $row) {
    $temp['id'] = $row['id'];
    $temp['title'] = $row['title'];
    $temp['image'] = DOMAIN_URL . $row['image'];
    $temp['lyrics'] = $row['lyrics'];
    $temp['audio'] = DOMAIN_URL . $row['audio'];
    $rows[] = $temp;
}
$response['audio_list'] = $rows;
unset($temp);
print_r(json_encode($response));
?>