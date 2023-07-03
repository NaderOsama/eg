<?php
$config = parse_ini_file('connection.ini');

$dsn = "mysql:host={$config['host']};dbname={$config['database']}";
$user = $config['username'];
$pass = $config['password'];

try{
    $con = new PDO($dsn, $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo $e->getMessage();
}
?>