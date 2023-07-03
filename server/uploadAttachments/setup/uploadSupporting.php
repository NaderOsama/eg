<?php
$config = parse_ini_file('../../connection.ini');

$con = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);
if ($con->connect_error) {
    exit('Could not connect');
}

session_start();
$request_id = $_SESSION['request_id'];
$user_id = $_SESSION['user_id'];
$request_date = $_SESSION['request_date'] ?? "";


$find_last_id = $con->prepare("SELECT id from supporting_and_approvals ORDER BY id DESC LIMIT 1");
$query2 = $find_last_id->execute();
$find_last_id->bind_result($last_id);  // Bind the result to a variable
$find_last_id->fetch();  // Fetch the result

if ($last_id !== null) {
    $new_last_id = $last_id + 1;
} else {
    $new_last_id = 1;
}

$upload_dir = '../../../AG_SysDoc/AG_SysSetupData/';

$new_last_id = $last_id + 1;

// Use the new ID for folder creation
$folder_name = 'AG_SysSetup_' . sprintf("%04d", $new_last_id) . '/Docs';
$folder_path = $upload_dir . $folder_name;

while (is_dir($folder_path)) {
    $new_last_id++;  // Increment the ID
    $folder_name = 'AG_SysSetup_' . sprintf("%04d", $new_last_id) . '/Docs';
    $folder_path = $upload_dir . $folder_name;
}
if (!is_dir($folder_path)) {
    mkdir($folder_path, 0777, true);
}
if (!empty($_FILES['file']['name'])) {
    $file = $_FILES['file'];

    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_path = $folder_path . '/' . $file_name;
    $new_last_id = $last_id + 1;
    $original_file_name = $file_name;

    while (file_exists($file_path)) {
        $file_name = '(' . $counter . ')' . $original_file_name;
        $file_path = $folder_path . '/' . $file_name;
        $counter++;
    }

    if (move_uploaded_file($file_tmp, $file_path)) {
        http_response_code(200);
        echo json_encode(['filePath' => $file_path]);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to store file']);
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => 'No file provided']);
}
