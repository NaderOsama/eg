<?php
include "../../connect.php";
$data = json_decode(file_get_contents('php://input'), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $table = $data['table'];
    $column_name = isset($data['column_name']) ? $data['column_name'] : 'id';
    $ids = $data['ids'];

    if ($table === 'forms' && $column_name === 'id') {
        $column_name = 'form_id';
    } else if ($table === 'user' && $column_name === 'id') {
        $column_name = 'user-id';
    }

    $placeholders = implode(',', array_fill(0, count($ids), '?'));

    if ($table === 'user') {
        $stmt = $con->prepare("UPDATE `user` SET `roles` = NULL WHERE `user-id` IN ($placeholders)");
        foreach ($ids as $key => $value) {
            $stmt->bindValue(($key + 1), $value, PDO::PARAM_INT);
        }
        $stmt->execute();

        $stmt = $con->prepare("DELETE FROM `user` WHERE `user-id` IN ($placeholders)");
    } else if ($table === 'forms') {
        $con->beginTransaction();
        $stmt = $con->prepare("SET FOREIGN_KEY_CHECKS=0");
        $stmt->execute();

        $stmt = $con->prepare("DELETE FROM `forms` WHERE `form_id` IN ($placeholders)");
        foreach ($ids as $key => $value) {
            $stmt->bindValue(($key + 1), $value, PDO::PARAM_INT);
        }
        $stmt->execute();

        $stmt = $con->prepare("SET FOREIGN_KEY_CHECKS=1");
        $stmt->execute();
        $con->commit();
    } else {
        $con->beginTransaction();
        $stmt = $con->prepare("SET FOREIGN_KEY_CHECKS=0");
        $stmt->execute();

        $stmt = $con->prepare("DELETE FROM `$table` WHERE `$column_name` IN ($placeholders)");
        foreach ($ids as $key => $value) {
            $stmt->bindValue(($key + 1), $value, PDO::PARAM_INT);
        }
        $stmt->execute();

        $stmt = $con->prepare("SET FOREIGN_KEY_CHECKS=1");
        $stmt->execute();
        $con->commit();
    }

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}
