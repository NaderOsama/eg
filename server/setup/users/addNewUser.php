<?php
include "../../connect.php";
$data = json_decode(file_get_contents('php://input'), true);

// $add_user_id = $data['add_user_id'];
$add_username_ar = $data['add_username_ar'];
$add_username = $data['add_username'];
$add_user_national = $data['add_user_national'];
$add_email = $data['add_email'];
$add_phone = $data['add_phone'];
$add_country = $data['add_country'];
$add_city = $data['add_city'];
$add_status = $data['add_status'];
$add_pass = $data['add_pass'];
$add_roles = $data['add_roles'];
$add_department = $data['add_department'];
$add_branch = $data['add_branch'];
$stmt = $con->prepare("INSERT INTO `user` (`user_name_ar`,`user_name`,`national_id`,`user_email`,`user_phone`,`user_country`,`user_city`,`user_status`,`password`,`roles`,`department_id`,`branch`) VALUES ('" . $add_username_ar . "','" . $add_username . "','" . $add_user_national . "','" . $add_email . "','" . $add_phone . "','" . $add_country . "','" . $add_city . "','" . $add_status . "','" . $add_pass . "','" . $add_roles . "','" . $add_department . "','" . $add_branch . "')");
$query = $stmt->execute();

if ($query) {
    echo json_encode("success");
} else {
    echo json_encode("erorr");
}
