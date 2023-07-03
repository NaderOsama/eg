<?php
try{
    $con = new mysqli("localhost", "root", "", "itda2");
}
catch(Exception $e){
    echo $e->getMessage();
    exit('Could not connect');
}

if(isset($_POST['uploadActivityApproval'])){
    // $NAME = $_POST['name'];
    // $PRICE = $_POST['price'];
    // $IMAGE = $_FILES['image'];
    $file_location = $_FILES['activityApprovalFile']['tmp_name'];
    $file_name = $_FILES['activityApprovalFile']['name'];
    $file_up = "Request/approvals/".$file_name;
    $insert = "INSERT INTO activites_table (activityApproval) VALUES ('$file_up')";
    mysqli_query($con, $insert);
    if (move_uploaded_file($file_location,'Request/approvals/'.$file_name)) {
      echo "<script>alert('File Uploaded successfully')</script>";
    }else {
      echo "<script>alert('Error, Something went wrong!')</script>";
    }
    echo "<script>window.close();</script>";
  }
 ?>
