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

$permission_ids = [2000, 2001, 2002, 2003];
$permissions = getPermissionCssClassesForHomePage($user_id, $permission_ids, $con);
$HomeAdd1 = $permissions['HomeAdd1'];
$HomeAdd2 = $permissions['HomeAdd2'];
$HomeAdd3 = $permissions['HomeAdd3'];
$HomeAdd4 = $permissions['HomeAdd4'];

// Additional code from the second file
include "../server/connect.php";
//   $con = new mysqli("localhost", "id20357300_ag", "ag_db7Password", "id20357300_itda");
//   if($con->connect_error) {
//     exit('Could not connect');
//   }
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../fonts/Cairo">
  <title>الصفحة الرئيسية</title>
</head>

<body>
  <?php include('../header/index.php'); ?>

  <section id="heroContainer">
    <div id="heroWrapper">
      <div class="backgroundOverlay" style="background-color: #000000;opacity: 0.5;mix-blend-mode: multiply;transition: background 0.3s, border-radius 0.3s, opacity 0.3s;"></div>
      <div id="heroDesc" style="position: relative;">
        <h2 style="color: #fff;font-size: 1.4em;font-weight: 500;">أهلاً بكم في<br><span style="display: inline-block;margin-top: 10px;color: #ff8100;font-size: 3em;font-weight: 600;">مكتب أشرف جريشة مراجعون ومحاسبون قانونيون</span></h2>
      </div>
    </div>
  </section>
  <section>
    <div class="features" id="features">
      <div class="container">
        <a href="../newRequestTest/requestForm.php?id=1&mode=new" style="margin-top: 10px;text-decoration: none;color: #000;list-style-type: none;<?php echo $HomeAdd1; ?>">
          <div class="box quality">
            <div class="img-holder">
              <img decoding="async" src="../images/orderrequest.png" alt="" />
              <h2>تقديم طلب</h2>
            </div>

          </div>
        </a>
        <!-- <a href="../CompanyConstructionServices/index.php" style="text-decoration: none;color: #000;list-style-type: none;">
        <div class="box quality">
          <div class="img-holder">
            <img decoding="async" src="../images/ta.jpg" alt="" /></div>
          <h2>تأسيس شركات</h2>
        </div></a> -->
        <a href="" style="margin-top: 10px;text-decoration: none;color: #000;list-style-type: none;<?php echo $HomeAdd2; ?>">
          <div class="box time">
            <div class="img-holder">
              <img decoding="async" src="../images/order info.png" alt="" />
              <h2>خطة العمل و التنبيهات</h2>
            </div>
          </div>
        </a>

        <a href="" style="margin-top: 10px;text-decoration: none;color: #000;list-style-type: none;<?php echo $HomeAdd3; ?>">
          <div class="box time">
            <div class="img-holder">
              <img decoding="async" src="../images/companies.png" alt="" />
              <h2>الشركات</h2>
            </div>
          </div>
        </a>

        <a href="../setup_new/index.php" class="box time" style="margin-top: 10px;text-decoration: none;color: #000;list-style-type: none;<?php echo $HomeAdd4; ?>">
          <div class="img-holder">
            <img decoding="async" src="../images/system.png" alt="" />
            <h2>إعدادات النظام</h2>
          </div>
        </a>

        <!-- <a href="" style="text-decoration: none;color: #000;list-style-type: none;">    
        <div class="box time">
            <div class="img-holder"><img decoding="async" src="../images/kk.jpg" alt=""  /></div>
            <h2>ضرائب و تأمينات</h2>
        </div></a>

        <a href="" style="text-decoration: none;color: #000;list-style-type: none;">
        <div class="box passion">
            <div class="img-holder"><img decoding="async" src="../images/mm.jpg" alt=""  alt="" /></div>
            <h2>مراجعة مالية</h2>
        </div> </a>


      <a href="" style="text-decoration: none;color: #000;list-style-type: none;"> 
        <div class="box hii">
            <div class="img-holder"><img decoding="async" src="../images/kkk.jpg" alt=""  /></div>
            <h2>متابعة داخلية</h2>
        </div></a>

        <a href="" style="text-decoration: none;color: #000;list-style-type: none;"> 
        <div class="box hii">
            <div class="img-holder"><img decoding="async" src="../images/kkk.jpg" alt=""  /></div>
            <h2>إستشارات</h2>
        </div></a> -->
      </div>
    </div>
  </section>
  </div>
  <?php include('../footer/index.php'); ?>
</body>

</html>