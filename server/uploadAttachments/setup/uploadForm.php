<?php
if (isset($_FILES['file'])) {
    $targetPath = '../../../attachments/forms/';
    $targetFile = $targetPath . basename($_FILES['file']['name']);
    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
        echo json_encode(basename($_FILES['file']['name']));
    } else {
        echo 'Failed to upload file';
    }
} else {
    echo 'No file uploaded';
}
