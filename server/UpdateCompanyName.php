<?php
include "connect.php";
$request_id = $_GET["request_id"];
// header("Content-Type: application/json; charset=UTF-8");
// $obj = json_decode($_POST["post2"], false);
$data = json_decode(file_get_contents('php://input'), true);
    //company_name
    $first_suggestion_ar = $data["first_suggestion_ar"];
    $second_suggestion_ar = $data["second_suggestion_ar"];
    $third_suggestion_ar = $data["third_suggestion_ar"];
    $forth_suggestion_ar = $data["forth_suggestion_ar"];
    $fifth_suggestion_ar = $data["fifth_suggestion_ar"];
    $first_suggestion_el = $data["first_suggestion_el"];
    $second_suggestion_el = $data["second_suggestion_el"];
    $third_suggestion_el = $data["third_suggestion_el"];
    $forth_suggestion_el = $data["forth_suggestion_el"];
    $fifth_suggestion_el = $data["fifth_suggestion_el"];

    $stmt3 = $con->prepare ("UPDATE `company_name` SET `first_suggestion_ar` = '".$first_suggestion_ar."', `second_suggestion_ar` = '".$second_suggestion_ar."', `third_suggestion_ar` = '".$third_suggestion_ar."', `forth_suggestion_ar` = '".$forth_suggestion_ar."',`fifth_suggestion_ar` ='".$fifth_suggestion_ar."',
     `first_suggestion_el` = '".$first_suggestion_el."', `second_suggestion_el` = '".$second_suggestion_el."', `third_suggestion_el` = '".$third_suggestion_el."',`forth_suggestion_el` = '".$forth_suggestion_el."', `fifth_suggestion_el` = '".$fifth_suggestion_el."'  WHERE `request_id` = '".$request_id."'");
    $query3 = $stmt3->execute();
    if($query3){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }
?>