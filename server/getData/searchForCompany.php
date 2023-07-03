<?php
include "../connectSQLi.php";

$data = array();

// Retrieve the search query from the URL
$query = $_GET['q'];

// Escape the search query to prevent SQL injection
$query = mysqli_real_escape_string($conn, $query);
    $query = "SELECT id, company_name, company_type FROM company_data WHERE id LIKE '%$query%' OR company_name LIKE '%$query%' OR company_type LIKE '%$query%'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0) {
        $i=0;
        while($row = mysqli_fetch_assoc($result)) {
            $data[$i]['id'] = $row["id"];
            $data[$i]['company_name'] = $row['company_name'];
            $data[$i]['company_type'] = $row['company_type'];
            $i++;
        }
        header('Content-Type: application/json');
        echo json_encode($data);
      } else {
        // Return an error if the query was not successful
        http_response_code(400);
        echo json_encode(array("error" => "No results found"));
      }
      
      // Close the database connection
      mysqli_close($conn);      
?>