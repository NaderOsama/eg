<?php 
    include "../connect.php";
    header('Content-type: JSON');
    $response = array();
    $i=0;

    $stmt = $con->prepare("SELECT * FROM company_types");
    $query = $stmt->execute();

    while ($companyTypes = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $response[$i]['id'] = $companyTypes['id'];
        $response[$i]['name'] = $companyTypes['name'];
        $i++;
    }
    
    if($query){
        echo json_encode($response);
    }else {
        echo json_encode("error");
    }
?>