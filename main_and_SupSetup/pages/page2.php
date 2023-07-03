<?php
$host = 'localhost';
$database = 'id20357300_itda';
$username = 'root';
$password = '';

$con = new mysqli($host, $username, $password, $database);
if ($con->connect_error) {
    exit('Could not connect: ' . $con->connect_error);
}

session_start();

if (!isset($_SESSION['user_id'])) {
    header('location: ../signin/login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['name'];
$user_privilege = $_SESSION['user_roles'];

if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header('location: ../signin/login.php');
}

function getPermissionCssClasses2($userId, $formId, $con)
{
    $query = "SELECT AddPermission, DeletePermission, UpdatePermission FROM systemuserspermissions WHERE UserID = ? AND FormID = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ii", $userId, $formId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $addPermission = $row['AddPermission'];
        $deletePermission = $row['DeletePermission'];
        $updatePermission = $row['UpdatePermission'];

        // Define the CSS classes based on the permissions
        $cssClassAdd = ($addPermission == 0) ? 'disabledTabs' : '';
        $cssClassDelete = ($deletePermission == 0) ? 'disabledTabs' : '';
        $cssClassUpdate = ($updatePermission == 0) ? 'disabledTabs' : '';
    } else {
        // Default CSS classes if no record found in the database
        $cssClassAdd = 'disabledTabs';
        $cssClassDelete = 'disabledTabs';
        $cssClassUpdate = 'disabledTabs';
    }

    // Close the prepared statement
    $stmt->close();

    // Return an array of CSS classes
    return [
        'add' => $cssClassAdd,
        'delete' => $cssClassDelete,
        'update' => $cssClassUpdate
    ];
}

$permissions = getPermissionCssClasses2($user_id, 4001, $con);
$cssClassAdd = $permissions['add'];
$cssClassDelete = $permissions['delete'];
$cssClassUpdate = $permissions['update'];

// Close the database connection
$con->close();
?>
<div class="window0 activeWindow">
    <div class="bodyWrapper">
        <fieldset class="constructionLawBox" style="width: 100%;width: 100%;max-height: 678px;overflow-y: scroll;">
            <legend resource-key="EstablishedLaws">الخدمات الفرعية</legend>
            <div class="p1 flex">
                <div class="btnContainer" style="width: 100%;">
                    <button id="saveSup" class="nextBTN btn hero-btn <?php echo $cssClassUpdate; ?>" style="color: #000;background: gainsboro;" onclick="saveDocument()">حفظ</button>
                    <button id="cancelRequest" class="nextBTN btn hero-btn<?php echo $cssClassDelete; ?>" style="color: #000;background: gainsboro;" onclick=" deleteSelectedRowsSup()">حذف</button>
                    <button id="addApprovals8" class="nextBTN btn hero-btn <?php echo $cssClassAdd; ?>" style="color: #000;background: gainsboro;">إضافة</button>
                </div>
            </div>
            <div id="newRequestContainer"></div>
            <div id="filteredDataContainer">
                <table class="styled-table" id="supporting_documents">

                    <thead>
                        <tr>
                            <th></th>
                            <th>الخدمة الرئيسية<span class="sort-icon" onclick="sortTable(0, this)"></span></th>
                            <th>الخدمة الفرعية<span class="sort-icon" onclick="sortTable(0, this)"></span></th>
                            <th>تعديل</th>
                        </tr>
                    </thead>
                    <tbody id="supporting_docs_table_body">

                    </tbody>
                </table>
            </div>
    </div>
</div>
</section>
</div>