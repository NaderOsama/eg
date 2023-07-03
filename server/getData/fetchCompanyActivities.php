<?php
include "../connect.php";

$response = array();
$validator = $_GET['validator'];
if ($validator == 'sector') {
    $stmt = $con->prepare("SELECT * FROM activity_sector");
    $query = $stmt->execute();
    if($query){
        header('Content-type: JSON');
        $i=0;
        while ($requestData = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $response[$i]['id'] = $requestData['id'];
            $response[$i]['sectorName'] = $requestData['name'];
            $i++;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    }else {
        echo json_encode("error");
    }
}elseif ($validator == 'branch') {
    $activity_sector = $_GET['value'];
    $stmt = $con->prepare("SELECT `id`,`name` FROM activity_branch WHERE activity_sector = $activity_sector");
    $query = $stmt->execute();
    if($query){
        header('Content-type: JSON');
        $i=0;
        while ($requestData = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $response[$i]['id'] = $requestData['id'];
            $response[$i]['branchName'] = $requestData['name'];
            $i++;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    }else {
        echo json_encode("error");
    }
}elseif ($validator == 'activity') {
    $activity_branch = $_GET['value'];
    $stmt = $con->prepare("SELECT `id`,`name` FROM activities WHERE activity_branch = $activity_branch");
    $query = $stmt->execute();
    if($query){
        header('Content-type: JSON');
        $i=0;
        while ($requestData = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $response[$i]['id'] = $requestData['id'];
            $response[$i]['activityName'] = $requestData['name'];
            $i++;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    }else {
        echo json_encode("error");
    }
}
elseif ($validator == 'description') {
    $activity_id = $_GET['value'];
    $stmt = $con->prepare("SELECT `id`,`description` FROM activity_description WHERE activity_id = $activity_id");
    $query = $stmt->execute();
    if($query){
        header('Content-type: JSON');
        $i=0;
        while ($requestData = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $response[$i]['id'] = $requestData['id'];
            $response[$i]['activity_description'] = $requestData['description'];
            $i++;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    }else {
        echo json_encode("error");
    }
}
?>