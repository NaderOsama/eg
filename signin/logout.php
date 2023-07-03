<?php
if(isset($_GET['logout-submit']) && $_GET['logout-submit'] == 'logout'){
    if(isset($_SESSION['user_id'])){
    session_destroy();
    }
    unset($user_id,$user_privilege,$user_name);
    header('location:../signin/login.php');
  }
?>