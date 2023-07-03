<?php
include "../connect.php";

// Get the array of IDs from the request body
$ids = json_decode(file_get_contents('php://input'), true)['ids'];

// Delete the records with the given IDs from the database
$stmt = $con->prepare('DELETE FROM request_supporting_documents WHERE id IN (' . implode(',', $ids) . ')');
$stmt->execute();

echo json_encode('Records deleted successfully');
