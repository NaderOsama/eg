<?php
include "../connect.php";

$response = array();

$stmt = $con->prepare("SELECT * FROM customer WHERE CustomerId != 4");
$query = $stmt->execute();

if($query){
    header('Content-type: JSON');
    $i=0;
    while ($requestData = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $response[$i]['CustomerId'] = $requestData['CustomerId'];
        $response[$i]['CustomerName'] = $requestData['CustomerName'];
        $response[$i]['CustomerPhone'] = $requestData['CustomerPhone'];
        $response[$i]['CustomerEmail'] = $requestData['CustomerEmail'];
        $response[$i]['CustomerNationality'] = $requestData['CustomerNationality'];
        $response[$i]['CustomerAddress'] = $requestData['CustomerAddress'];
        $response[$i]['CustomerNationalId'] = $requestData['CustomerNationalId'];
        $response[$i]['CustomerIdAttachment'] = $requestData['CustomerIdAttachment'];
        $i++;
    }
    echo json_encode($response, JSON_PRETTY_PRINT);
}else {
    echo json_encode("error");
}
?>