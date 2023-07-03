<?php
include "../connect.php";

// Check if mainServiceId and subServiceId are set in the GET request
if (isset($_GET['mainServiceId']) && isset($_GET['subServiceId'])) {
    $main = $_GET['mainServiceId'];
    $sub = $_GET['subServiceId'];

    header('Content-type: application/json');
    $response = array();
    $i = 0;

    // Use prepared statement to prevent SQL injection
    $stmt = $con->prepare("SELECT * FROM company_types WHERE main_services_id = :main AND sub_services_id = :sub");
    $stmt->bindParam(':main', $main);
    $stmt->bindParam(':sub', $sub);
    $stmt->execute();

    // Fetch data and add it to response array
    while ($companyTypes = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $response[$i]['id'] = $companyTypes['id'];
        $response[$i]['name'] = $companyTypes['name'];
        $i++;
    }

    // Return response as JSON
    echo json_encode($response);
} else {
    // Return error message if mainServiceId and subServiceId are not set in the GET request
    echo json_encode("error: mainServiceId and subServiceId parameters are required");
}
