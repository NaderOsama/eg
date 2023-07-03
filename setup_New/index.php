<?php
$config = parse_ini_file('../server/connection.ini');

$con = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);
if ($con->connect_error) {
  exit('Could not connect');
}
session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['name'];
$user_privilege = $_SESSION['user_roles'];
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <title>إعدادات النظام</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="index.css">
</head>

<body>
  <?php include('../header/index.php'); ?>
  <section id="heroContainer">
    <div id="heroWrapper">
      <div class="backgroundOverlay" style="background-color: #000000;opacity: 0.5;mix-blend-mode: multiply;transition: background 0.3s, border-radius 0.3s, opacity 0.3s;"></div>
      <div id="heroDesc" style="position: relative;">
        <h2 style="color: #fff;font-size: 1.4em;font-weight: 500;"><br><span style="display: inline-block;margin-top: 10px;color: #ff8100;font-size: 3em;font-weight: 600;">إعدادات النظام</span></h2>
      </div>
    </div>
  </section>
  <div class="body-flex">
    <div class="body-container">
      <div class="cardd" onclick="window.location.href='../supporting_and_approvals/requestForm.php';">
        <div class="cardBackground" style="background-image: url('../images/doc.jpg');"></div>
        <div class="cardInfo">
          <div class="underline"></div>
          <p id="setup_name">المستندات و أوامر الشغل</p>
        </div>
      </div>

      <!-- Additional cards -->
      <div class="cardd" onclick="window.location.href='../main_and_SupSetup/requestForm.php';">
        <div class="cardBackground" style="background-image: url('../images/serv.jpg');"></div>
        <div class="cardInfo">
          <div class="underline"></div>
          <p id="setup_name">الخدمات</p>
        </div>
      </div>

      <!-- <div class="cardd" onclick="window.location.href='../CompanyTypeSetup/requestForm.php';">
        <div class="cardBackground" style="background-image: url('../images/law.jpg');"></div>
        <div class="cardInfo">
          <div class="underline"></div>
          <p id="setup_name">الشكل القانوني</p>
        </div>
      </div> -->

      <div class="cardd" onclick="window.location.href='../lawsSetup/requestForm.php';">
        <div class="cardBackground" style="background-image: url('../images/com.jpeg');"></div>
        <div class="cardInfo">
          <div class="underline"></div>
          <p id="setup_name">القوانين</p>
        </div>
      </div>
      <div class="cardd" onclick="window.location.href='../EntityAndCompanyTypeSetup/requestForm.php';">
        <div class="cardBackground" style="background-image: url('../images/com.jpeg');"></div>
        <div class="cardInfo">
          <div class="underline"></div>
          <p id="setup_name">الكيان والشكل القانوني</p>
        </div>
      </div>

      <div class="cardd" onclick="window.location.href='../Roles&PermissionsSetup/requestForm.php';">
        <div class="cardBackground" style="background-image: url('../images/com.jpeg');"></div>
        <div class="cardInfo">
          <div class="underline"></div>
          <p id="setup_name">الأدوار و الصلحيات</p>
        </div>
      </div>

      <div class="cardd" onclick="window.location.href='../CompanysSetup/requestForm.php';">
        <div class="cardBackground" style="background-image: url('../images/com.jpeg');"></div>
        <div class="cardInfo">
          <div class="underline"></div>
          <p id="setup_name">الفروع</p>
        </div>
      </div>

      <!-- Repeat the above card structure two more times -->

    </div>
  </div>
</body>
<?php include('../footer/index.php'); ?>

</html>