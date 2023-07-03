<?php
include '../header/permission_functions.php';
$permission_ids = [3000, 3001, 3002, 3003, 3004, 3005];
$permissions = getPermissionCssClassesForHeader($user_id, $permission_ids, $con);
$HeaderAdd1 = $permissions['HeaderAdd1'];
$HeaderAdd2 = $permissions['HeaderAdd2'];
$HeaderAdd3 = $permissions['HeaderAdd3'];
$HeaderAdd4 = $permissions['HeaderAdd4'];
$HeaderAdd5 = $permissions['HeaderAdd5'];
$HeaderAdd6 = $permissions['HeaderAdd6'];
?>

<head>
  <link rel="stylesheet" href="../header/style.css">
  <link rel="stylesheet" href="../fonts-6/css/all.css">
  <script src="../jquery/jquery.js"></script>
</head>
<div class="flex-page">
  <div class="header-part" style="display: flex;">
    <header class="header">
      <div class="headerContainer">
        <div class="logoContainer">
          <a href="../homePage/index.php" class="logo"><img src="..\images\AGLogo.PNG" alt="AG_LOGO" style="width: 100px;"></a>
        </div>
        <div class="" style="display:flex;">
          <div class="user">
            <!-- <input class="search-box" placeholder="Search..." name="searchBox">
              <i class="fa-solid fa-magnifying-glass search_icon" style="color: #fff; background-color: #03A9F4; border-radius: 0 40px 40px 0;"></i> -->
            <div class="">
              <a class="userContainer">
                <i class="fa-regular fa-user"></i>
                <span><?php echo $user_name; ?></span>
                <i class="fa-solid fa-chevron-down Arrow" style="transition: 0.5s ease;"></i>
              </a>
            </div>
            <div class="subMenuContainer" style="position: relative;">
              <div class="submenu">

                <a href="../departmentRequests/SearchAll.php" style="<?php echo $HeaderAdd1; ?>">طلبات الإداره</a>
                <a href="../allRequests/myOrders.php" style="<?php echo $HeaderAdd2; ?>">طلباتي</a>
                <!-- <a href="../allRequests/index.php">الطلبات</a> -->
                <a href="../allRequests/SearchAll.php" style="<?php echo $HeaderAdd3; ?>">بحث في الطلبات</a>

                <a href="../allRequests/res_order.php" id="res_orders" name="res_orders" style="<?php echo $HeaderAdd4; ?>">الطلبات الوارده</a>
                <!-- <a href="../allRequests/all_orders.php" id="all_orders" name="all_orders">كل الطلبات </a> -->
                <a href="../allRequests/All_instructure.php" id="All_instructure" name="All_instructure" style="<?php echo $HeaderAdd5; ?>">بحث في الأوامر</a>
                <a href="../allRequests/Res_instructure.php" id="Res_instructure" name="Res_instructure" style="<?php echo $HeaderAdd6; ?>">الأوامر الوارده</a>
                <a href="../signin/logout.php?logout-submit=logout" id="logout" name="logout" style="border-bottom-right-radius: 5px; border-bottom-left-radius: 5px;">تسجيل الخروج</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
  </div>
</div>
<script src="../header/function.js"></script>