<?php
$config = parse_ini_file('../server/connection.ini');

$con = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);
if ($con->connect_error) {
    exit('Could not connect');
}

function getPermissionCssClassesForHomePage($userId, $formIds, $con)
{
    $variable_names = ['HomeAdd1', 'HomeAdd2', 'HomeAdd3', 'HomeAdd4'];
    $permissions = [];

    foreach ($formIds as $index => $formId) {
        $query = "SELECT AddPermission FROM systemuserspermissions WHERE UserID = $userId AND FormID = $formId";
        $result = $con->query($query);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $addPermission = $row['AddPermission'];
            $permissions[$variable_names[$index]] = ($addPermission == 0) ? 'display: none;' : '';
        } else {
            $permissions[$variable_names[$index]] = 'display: none;';
        }
    }

    return $permissions;
}
