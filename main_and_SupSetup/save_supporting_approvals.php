<?php
$config = parse_ini_file('../../server/connection.ini');

$con = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);
if ($con->connect_error) {
  exit('Could not connect');
}

if (isset($_POST['mainService'])) {
  $mainService = trim($_POST['mainService']);

  if (empty($mainService)) {
    echo "One or more required fields are empty.";
  } else {
    $sql = "INSERT INTO main_services (`name`) VALUES ('$mainService')";
    $result = $con->query($sql);

    if ($result === TRUE) {
      echo "Data saved successfully!";
    } else {
      echo "Error: " . $sql . "<br>" . $con->error;
    }
  }
} else {
  echo "One or more required fields are empty.";
}
