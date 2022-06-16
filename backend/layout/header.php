<!DOCTYPE html>
<?php
ob_start();
  require('../functions.php');
  require('../check-login.php');
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>T-sport</title>
        <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="<?php echo $baseUrl; ?>/assets/styles/shards-dashboards.1.1.0.min.css">
        <link rel="stylesheet" href="<?php echo $baseUrl; ?>/assets/styles/extras.1.1.0.min.css">
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <!--     <script src="../ckeditor_4.19.0_full_easyimage/ckeditor/ckeditor.js"></script>-->
        <title>Header</title>
    </head>
    <body>
      <div class="container-fluid">
        <div class="row">
          <!-- Main Sidebar -->
          <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
            <div class="main-navbar">
              <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
                <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                  <div class="d-table m-auto">
                    <span class="d-none d-md-inline ml-1">DASHBROARD</span>
                  </div>
                </a>
                <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                  <i class="material-icons">&#xE5C4;</i>
                </a>
              </nav>
            </div>
            <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
              <div class="input-group input-group-seamless ml-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-search"></i>
                  </div>
                </div>
                <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
            </form>
            <div class="nav-wrapper">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link <?php if($currentModule == 'dashboard') echo ' active '; ?>" href="<?php echo $baseUrl; ?>/dashboard">
                    <i class="material-icons">edit</i>
                    <span>Blog Dashboard</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php if($currentModule == 'product') echo ' active '; ?>" href="<?php echo $baseUrl; ?>/product">
                    <i class="material-icons">view_module</i>
                    <span>Products</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php if($currentModule == 'category') echo ' active '; ?>" href="<?php echo $baseUrl; ?>/category">
                    <i class="material-icons">table_chart</i>
                    <span>Category</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php if($currentModule == 'order') echo 'active';?>" href="<?php echo $baseUrl;?>/order">
                    <i class="material-icons">view_module</i>
                    <span>Order</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php if($currentModule == 'user') echo 'active';?>" href="<?php echo $baseUrl;?>/user">
                    <i class="material-icons">person</i>
                    <span>User</span>
                  </a>
                </li>
              </ul>
            </div>
          </aside>
          <!-- End Main Sidebar -->
          <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
            <div class="main-navbar sticky-top bg-white">
              <!-- Main Navbar -->
              <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
                <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                  <div class="input-group input-group-seamless ml-3">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-search"></i>
                      </div>
                    </div>
                    <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
                </form>
                <ul class="navbar-nav border-left flex-row ">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                       <img class="user-avatar rounded-circle mr-2" src="../assets/images/avatars/1.jpg" >
                      <span class="d-none d-md-inline-block">
                        <?php echo $_SESSION['userinfo']['user_name'] ?? 'anonymous'; ?>
                      </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-small">
                      <a class="dropdown-item" href="<?php echo $_SESSION['userinfo']['user'] ?? 'id_user'; ?>">
                        <i class="material-icons"></i> Profile</a>
                      <a class="dropdown-item text-danger" href="<?php echo $baseUrl; ?>/admin/logout.php">
                        <i class="material-icons text-danger">&#xE879;</i> LogOut </a>
                    </div>
                  </li>
                </ul>
                <nav class="nav">
                  <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                    <i class="material-icons">&#xE5D2;</i>
                  </a>
                </nav>
              </nav>
            </div>
            <div class="main-content-container container-fluid px-4 pt-4">

