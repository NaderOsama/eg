<?php
$data = json_decode(file_get_contents('php://input'), true);
session_start();
$_SESSION['request_id'] = $data['reqId'];
$_SESSION['request_date'] = $data['reqDate'];

echo json_encode("OK");
