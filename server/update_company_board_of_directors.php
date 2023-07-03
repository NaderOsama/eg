<?php
    include "connect.php";

    //board_of_directors
    $num_of_bod_id   = $_GET["num_of_bod_id"];
    $board_of_directors_name   = $_GET["board_of_directors_name"];
    $board_of_directors_email  = $_GET["board_of_directors_email"];
    $board_of_directors_nationaility = $_GET["board_of_directors_nationaility"];
    $board_of_directors_identity_type = $_GET["board_of_directors_identity_type"];
    $board_of_directors_gender  = $_GET["board_of_directors_gender"];
    $board_of_directors_date_of_birth  = $_GET["board_of_directors_date_of_birth"];
    $director_position = $_GET["director_position"];
    $director_address = $_GET["director_address"];
    $director_specialization = $_GET["director_speclalization"];
    
    $stmt8 = $con->prepare ("UPDATE `board_of_directors` SET `board_of_directors_name` = '".$board_of_directors_name."', `board_of_directors_email` = '".$board_of_directors_email."', `board_of_directors_nationaility` = '".$board_of_directors_nationaility."', `board_of_directors_identity_type` = '".$board_of_directors_identity_type."',`board_of_directors_gender` = '".$board_of_directors_gender."',
     `board_of_directors_date_of_birth` = '".$board_of_directors_date_of_birth."', `director_position` = '".$director_position."', `director_address` = '".$director_address."',`director_specialization` = '".$director_speclalization."' WHERE `num_of_bod_id` = '".$num_of_bod_id."'");
    $query8 = $stmt8->execute();
    if($query8){
        echo json_encode("success");
    }else {
        echo json_encode("erorr");
    }

?>