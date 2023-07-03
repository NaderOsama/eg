<?php
    include "connect.php";

    $request_id = $_GET["request_id"];
    $data = json_decode(file_get_contents('php://input'), true);


    // Company Activities...
    
?>