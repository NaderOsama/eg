<?php
$config = parse_ini_file('../../server/connection.ini');

$con = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);
if ($con->connect_error) {
    exit('Could not connect');
}

$ids = $_POST['ids'];

$input_status = $_POST['status'];
if ($input_status == 'نشط') {
    $updated_status = 'نشط';
} else if ($input_status == 'غير نشط') {
    $updated_status = 'غير نشط';
} else {
    die("Invalid status input");
}

$sql = "UPDATE supporting_and_approvals SET status='$updated_status' WHERE id IN (" . implode(',', $ids) . ")";
if ($con->query($sql) === TRUE) {
    echo "Rows updated successfully";
} else {
    echo "Error updating rows: " . $con->error;
}

$con->close();
