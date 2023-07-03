<?php 
    include "../connect.php";
    header('Content-type: JSON');
    $mainServiceId = $_GET['id'];
    $response = array();
    $i=0;

    $stmt = $con->prepare("SELECT * FROM sub_services WHERE main_service_id = '".$mainServiceId."'");
    $query = $stmt->execute();

    while ($subServices = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $response[$i]['id'] = $subServices['id'];
        $response[$i]['name'] = $subServices['name'];
        $i++;
    }
    
    if($query){
        echo json_encode($response);
    }else {
        echo json_encode("error");
    }
?>