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

if (isset($_GET['logout'])) {
  unset($user_id);
  session_destroy();
  header('location:../signin/login.php');
}

function getPermissionCssClasses($userId, $formId, $con)
{
  $query = "SELECT AddPermission, DeletePermission, UpdatePermission FROM systemuserspermissions WHERE UserID = $userId AND FormID = $formId";
  $result = $con->query($query);

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

  // Return an array of CSS classes
  return [
    'add' => $cssClassAdd,
    'delete' => $cssClassDelete,
    'update' => $cssClassUpdate
  ];
}

$permissions = getPermissionCssClasses($user_id, 1002, $con);
$cssClassAdd = $permissions['add'];
$cssClassDelete = $permissions['delete'];
$cssClassUpdate = $permissions['update'];
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="./style.css">
  <title>اعدادات الخدمات الرئيسية و الخدمات الفرعية</title>
</head>

<body>
  <?php include('../header/index.php'); ?>
  <div style="display:flex; justify-content:center; width:100%">
    <div class="bodyContainer">
      <div class="pageWrapper" style="display: block;max-width: 1720px;width: 1720px;">
        <section class="progressSec">
          <div class="progressbar">
            <div class="progress" id="progress"></div> 
            <div id="phase1" class="progress-step activePhase progress-step-active" data-title="الخدمات الرئيسية"></div>
            <div id="phase18" class="progress-step" data-title="الخدمات الفرعية" style=" pointer-events: none;"><span id="phase18"> </span></div>
            <div id="phase14" class="progress-step" data-title="" style="pointer-events: none;display:none;"><span id="phase14"> </span></div>
          </div>
        </section>

        <div class="serviceBody">
          <section class="sec1">
            <div class="window0 activeWindow">
              <div class="bodyWrapper">
                <?php include('./pages/page1.php'); ?>
                <?php include('./pages/page2.php'); ?>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
</body>
<?php include('../footer/index.php'); ?>
<script src="script.js"></script>
<script src="page1script.js" defer></script>

</html>