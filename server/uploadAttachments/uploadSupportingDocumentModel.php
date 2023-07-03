<?php
$config = parse_ini_file('../connection.ini');

$con = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);
if ($con->connect_error) {
  exit('Could not connect');
}
$STR = $_GET['STR'];
$supportingDocumentObj = [];

// Move uploaded file to the approvals folder
$targetPath = '../../attachments/modelSheet/SupportingDocuments' . basename($_FILES[$STR]['name']);
move_uploaded_file($_FILES[$STR]['tmp_name'], $targetPath);
$supportingDocumentObj[0] = $targetPath;

echo json_encode(basename($_FILES[$STR]['name']));
