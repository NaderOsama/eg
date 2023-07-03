<?php 
    include "connect.php";
    $data = json_decode(file_get_contents('php://input'), true);

    $user_department = $data["userDepartment"];
    $request_id = $data["request_id"];
    $assigned_by = $data["assigned_by"];
    // $request_registrar = $data["request_registrar"];
    $assign_date = $data["assign_date"];
    $comment = $data['assignment_comment'];



    //  $assignedTo = $con->prepare ("SELECT `user_name_ar`, `user_email`, `department_id` FROM user WHERE `user-id` = $request_registrar");
    //  $query2 = $assignedTo->execute();
    //  $assignedTo = $assignedTo->fetch(PDO::FETCH_ASSOC);

    //  $assignedToDepartment = $con->prepare ("SELECT `name` FROM department WHERE `id` = $assignedTo[department_id]");
    //  $query3 = $assignedToDepartment->execute();
    //  $assignedToDepartment = $assignedToDepartment->fetch(PDO::FETCH_ASSOC);

     $assignedBy = $con->prepare ("SELECT `user_name_ar`, `user_email`, `department_id` FROM user WHERE `user-id` = $assigned_by");
     $query2 = $assignedBy->execute();
     $assignedBy = $assignedBy->fetch(PDO::FETCH_ASSOC);

     $assignedByDepartment = $con->prepare ("SELECT `name` FROM department WHERE `id` = $assignedBy[department_id]");
     $query3 = $assignedByDepartment->execute();
     $assignedByDepartment = $assignedByDepartment->fetch(PDO::FETCH_ASSOC);

     $stmt = $con->prepare ("INSERT INTO `assign_to` (`request_id`,`assign_to_id`, `assign_to_department`, `assign_by_id`, `assign_by_username`, `assign_by_user_email`, `assign_by_user_department`, `assign_date`, `comment`) 
     VALUES ('".$request_id."','2', 'التأسيس', '".$assigned_by."', '".$assignedBy['user_name_ar']."', '".$assignedBy['user_email']."', '".$assignedByDepartment['name']."', '".$assign_date."', '".$comment."')");
     $query = $stmt->execute();

     $stmt2 = $con->prepare ("UPDATE `request_information` SET `assigned_to` = '2', `assigned_date` = '".$assign_date."', `assigned_department` = '".$user_department."'  WHERE `request_id` = '".$request_id."'");
     $query2 = $stmt2->execute();

    //  $updateRequestRegistrar = $con->prepare ("UPDATE request_information SET request_registrar = $request_registrar");
    //  $updateRequestRegistrar = $updateRequestRegistrar->execute();
     
     if($query2){
        echo json_encode("Done");
    }else {
        echo json_encode("erorr");
    }
?>