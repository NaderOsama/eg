<?php
$config = parse_ini_file('../server/connection.ini');

$con = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);
if ($con->connect_error) {
    exit('Could not connect');
}

session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../signin/login.php');
    exit();
}
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['name'];
$user_privilege = $_SESSION['user_roles'];
$user_department = $_SESSION['department'];

$mainService = $_GET['mainServicee'];


$mainService = $_GET['mainServicee'];

$sql = "SELECT * FROM `sub_services` WHERE `main_service_id` = '" . $mainService . "'";

$result = mysqli_query($con, $sql);
$rows = '';
while ($row = mysqli_fetch_array($result)) {
    $mainServiceQuery = mysqli_query($con, "SELECT `name` FROM main_services WHERE id = {$row['main_service_id']}");
    $mainServiceRow = mysqli_fetch_array($mainServiceQuery);
    $rows .= "
        <tr>
            <td><input class='checkingInp'  type='checkbox' name='selectedRows[]' value='{$row['id']}'></td>
            <td>{$mainServiceRow['name']}</td>
            <td>{$row['name']}</td>
            <td><span><i class='fa-solid fa-pen-to-square approvalEditBTN' id='approvalEdit{$row['id']}' type='button'})'></i></span></td>
        </tr>
    ";
}
echo $rows;
