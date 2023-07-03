<?php

$config = parse_ini_file('../server/connection.ini');
$con = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);
if ($con->connect_error) {
    exit('Could not connect');
}

$selectedRowIds = isset($_POST['selectedRows']) ? (array) $_POST['selectedRows'] : array();

if (!empty($selectedRowIds)) {
    $selectedRowIdsString = implode(",", $selectedRowIds);

    // Disable foreign key checks temporarily
    $con->query("SET FOREIGN_KEY_CHECKS=0");

    // Delete the rows from the main_services table
    $sql = "DELETE main_services, sub_services FROM main_services
            LEFT JOIN sub_services ON main_services.id = sub_services.main_service_id
            WHERE main_services.id IN ($selectedRowIdsString)";
    if ($con->query($sql) === TRUE) {
        echo "تم الحذف بنجاح.";
    } else {
        echo "حدث خطأ أثناء الحذف: " . $con->error;
    }

    // Enable foreign key checks again
    $con->query("SET FOREIGN_KEY_CHECKS=1");
}

$con->close();
