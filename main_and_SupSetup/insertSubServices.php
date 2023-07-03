<?php
$config = parse_ini_file('../server/connection.ini');

$con = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);
if ($con->connect_error) {
    exit('Could not connect');
}

$data = json_decode(file_get_contents('php://input'), true);

$sub_service = $data['sub_servicees'];
$main_service_id = $data['main_service_id'];

if (!empty($sub_service)) {
    if ($main_service_id !== null) {
        $stmt = $con->prepare("INSERT INTO `sub_services` (`name`, `main_service_id`) VALUES (?, ?)");
        $stmt->bind_param('si', $sub_service, $main_service_id);
        $query = $stmt->execute();

        if ($query) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "error"));
        }
    } else {
        echo 'Error inserting data: main_service_id not provided.';
        exit;
    }
} else {
    echo 'Error inserting data: No value added.';
    exit;
}
