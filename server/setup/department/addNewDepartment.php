<?php
include "../../connect.php";
$data = json_decode(file_get_contents('php://input'), true);

$newdepartment = $data['newdepartment'];
$newcompany = $data['newcompany'];
$newlocation = $data['newlocation'];
$newmain_service = $data['newmain_service'];
$newsub_service = $data['newsub_service'];

$stmt = $con->prepare("INSERT INTO `department` (`name`,`company`,`branch`,`main_service`,`sub_service`) VALUES ('" . $newdepartment . "','" . $newcompany . "','" . $newlocation . "','" . $newmain_service . "','" . $newsub_service . "')");
$query = $stmt->execute();

if ($query) {
    echo json_encode("success");
} else {
    echo json_encode("erorr");
}
