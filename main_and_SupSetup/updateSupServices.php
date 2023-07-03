<?php
$config = parse_ini_file('../server/connection.ini');

$con = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);
if ($con->connect_error) {
    exit('Could not connect');
}
$data = json_decode(file_get_contents('php://input'), true);

if (TRUE) {
    $main_service = $data['sub_servicees'] ?? null;
    $id = $data['id'] ?? null; // Assuming you have an 'id' field in $data

    if ($main_service === null || $id === null) {
        $missingValues[] = 'main_servicees or id';
    }

    if (!empty($missingValues)) {
        echo 'Error updating data: Missing values for ' . implode(', ', $missingValues);
        exit;
    }

    $document_description = "document_order";
    $stmt = $con->prepare("UPDATE `sub_services` SET `name` = ? WHERE `id` = ?");
    $stmt->bind_param("si", $main_service, $id); // Use $main_service and $id

    $query = $stmt->execute();

    if ($query) {
        echo json_encode("success");
    } else {
        echo json_encode("error");
    }
}
