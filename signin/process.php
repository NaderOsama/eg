<?php
session_start();
$email = $_POST["email"];
$password1 = $_POST["password1"];
$config = parse_ini_file('../server/connection.ini');

$con = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);
if ($con->connect_error) {
    die("Failed to connect " . $con->connect_error);
} else {
    $stmt = $con->prepare("SELECT * FROM user where user_email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if ($data['password'] === $password1) {
            $_SESSION['name'] = $data["user_name_ar"];
            $_SESSION['user_id'] = $data["user-id"];
            $_SESSION['user_roles'] = $data["roles"];
            $_SESSION['request_id'] = "";
            $_SESSION['department'] = $data["department_id"];
            header("location:../homePage/index.php");
        } else {
            echo "indavlid Password";
        }
    } else {
        echo "indavlid email ";
    }
}
