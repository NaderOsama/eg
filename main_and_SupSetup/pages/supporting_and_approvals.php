
<?php
$config = parse_ini_file('../../server/connection.ini');

$con = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);
if ($con->connect_error) {
    exit('Could not connect');
}

$sql = "SELECT * FROM main_services";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    echo "<form id='deleteForm' method='post'>";
    echo "<table class='styled-table' id='supporting_and_approvals'>";
    echo "<tr><th></th><th>ID</th><th>الخدمات الرئيسية</th><th>اختيار</th><th>تعديل</th><th></th></tr>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td><input class=\"checkingInp\"  type=\"checkbox\" name=\"selectedRows[]\" value='" . $row["id"] . "' id = '" . $row["id"] . "'></td>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td id='main_service_" . $row["id"] . "'>" . $row["name"] . "</td>";
        echo "</select>";
        echo "</td>";

        echo "<td><i class='fa-solid fa-square-check btn-next' id='select-btn" . $row["id"] . "'onclick='event.preventDefault(); selectRow(" . $row["id"] . ")'></i></td>";
        echo '<td><span> <i class="fa-solid fa-pen-to-square aANDsEditBTN" id="aANDsEditBTN' . $row['id'] . '" type="button" onclick="aANDsEditBTNListener(' . $row['id'] . ')"></i></span></td>';
        echo "</tr>";
    }
    echo "</table>";
    echo "</form>";
} else {
    echo "0 results";
}

$con->close();
