<?php

$config = parse_ini_file('../server/connection.ini');
$con = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);
if ($con->connect_error) {
    exit('Could not connect');
}
// echo "'.$_POST[selectedRows].'";
$selectedRowIds = isset($_POST['selectedRows']) ? (array) $_POST['selectedRows'] : array();

if (!empty($selectedRowIds)) {
    $selectedRowIdsString = implode(",", $selectedRowIds);
    $sql = "DELETE FROM sub_services WHERE id IN ($selectedRowIdsString)";
    if ($con->query($sql) === TRUE) {
        echo "تم الحذف بنجاح.";
    } else {
        echo "حدث خطأ أثناء الحذف: " . $con->error;
    }
}

$con->close();
