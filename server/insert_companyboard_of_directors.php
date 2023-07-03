<?php 
    include "connect.php";

    $request_id = $_GET["request_id"];
    $board_of_directors_name   = $_GET["board_of_directors_name"];
    $board_of_directors_email  = $_GET["board_of_directors_email"];
    $board_of_directors_nationaility = $_GET["board_of_directors_nationaility"];
    $board_of_directors_identity_type = $_GET["board_of_directors_identity_type"];
    $board_of_directors_gender  = $_GET["board_of_directors_gender"];
    $board_of_directors_date_of_birth  = $_GET["board_of_directors_date_of_birth"];
    $director_position = $_GET["director_position"];
    $director_address = $_GET["director_address"];
    $director_specialization = $_GET["director_speclalization"];

     $stmt = $con->prepare ("INSERT INTO `number_of_board_of_directors` (`request_id`) 
     VALUES ('".$request_id."')");
     $query = $stmt->execute();
     $find_num_of_bod_id = $con->prepare("SELECT num_of_board_of_directors_id from number_of_board_of_directors ORDER BY num_of_board_of_directors_id DESC LIMIT 1;");
     $query2 = $find_num_of_bod_id->execute();
     $num_of_bod_id = $find_num_of_bod_id->fetch(PDO::FETCH_ASSOC);

     $stmt2 = $con->prepare ("INSERT INTO `board_of_directorsh` (`num_of_bod_id`, `board_of_directors_name`, `board_of_directors_email`, `board_of_directors_nationaility`, `board_of_directors_identity_type`, `board_of_directors_gender`, `board_of_directors_date_of_birth`,`director_position`,`director_address`,`director_speclalization`) 
     VALUES ('".$num_of_bod_id["num_of_bod_id"]."','".$board_of_directors_name."','".$board_of_directors_email."','".$board_of_directors_nationaility."','".$board_of_directors_identity_type."','".$board_of_directors_gender."','".$board_of_directors_date_of_birth."','".$director_position."','".$director_address."','".$director_speclalization."') ");
     $query3 = $stmt2->execute();

     if($query3){
        echo json_encode("Done");
    }else {
        echo json_encode("erorr");
    }
?>