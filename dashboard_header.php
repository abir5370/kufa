<?php

require 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Niche Admin - Powerful Bootstrap 4 Dashboard and Admin Template</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />

<!-- v4.0.0-alpha.6 -->
<link rel="stylesheet" href="/New folder/tiger/backend/bootstrap/css/bootstrap.min.css">


<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Theme style -->
<link rel="stylesheet" href="/New folder/tiger/backend/css/style.css">
<link rel="stylesheet" href="/New folder/tiger/backend/css/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="/New folder/tiger/backend/css/et-line-font/et-line-font.css">
<link rel="stylesheet" href="/New folder/tiger/backend/css/themify-icons/themify-icons.css">

<!-- Chartist CSS -->
<link rel="stylesheet" href="/New folder/tiger/backend/plugins/chartist-js/chartist.min.css">
<link rel="stylesheet" href="/New folder/tiger/backend/plugins/chartist-js/chartist-init.css">
<link rel="stylesheet" href="/New folder/tiger/backend/plugins/chartist-js/chartist-plugin-tooltip.css">


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper boxed-wrapper">
  <header class="main-header"> 
    <!-- Logo --> 
    <a href="index.html" class="logo blue-bg"> 
    <!-- mini logo for sidebar mini 50x50 pixels --> 
    <span class="logo-mini"><img src="/New folder/tiger/backend/img/logo-n.png" alt=""></span> 
    <!-- logo for regular state and mobile devices --> 
    <span class="logo-lg"><img src="/New folder/tiger/backend/img/logo.png" alt=""></span> </a> 
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar blue-bg navbar-static-top"> 
      <!-- Sidebar toggle button-->
      <ul class="nav navbar-nav pull-left">
        <li><a class="sidebar-toggle" data-toggle="push-menu" href=""></a> </li>
      </ul>
      <div class="pull-left search-box">
        <form action="#" method="get" class="search-form">
          <div class="input-group">
            <input name="search" class="form-control" placeholder="Search..." type="text">
            <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i> </button>
            </span></div>
        </form>
        <!-- search form --> </div>
      <div class="navbar-custom-menu">

        <?php
        $total_unread_megs = "SELECT COUNT(*) as unread FROM messages WHERE status=0";
        $total_unread_megs_result = mysqli_query($conn,$total_unread_megs);
        $total_assoc = mysqli_fetch_assoc($total_unread_megs_result);

        $total_unread = "SELECT * FROM messages WHERE status=0";
        $total_unread_result = mysqli_query($conn,$total_unread);

        ?>
          <!-- <span class="point"></span> -->
          <!-- <span class="heartbit"></span> -->
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-envelope-o"></i>
            <div class="notify position-relative">

              <!-- <span class="badge bg-secondary"><?=$total_assoc['unread']?></span> -->
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              
                <span class="visually-hidden"><?=$total_assoc['unread']?></span>
              </span>
             </div>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?=$total_assoc['unread']?> new messages</li>
              <li>
                <ul class="menu">
                  <?php foreach($total_unread_result as $unread) : ?>
                    <li><a href="/New folder/tiger/inbox/single_view_message.php?id=<?=$unread['id']?>">
                      <div class="pull-left"><img src="/New folder/tiger/backend/img/img1.jpg" class="img-circle" alt="User Image"> <span class="profile-status online pull-right"></span></div>
                      <h4><?=$unread['name']?></h4>
                      <p><?=$unread['message']?></p><br>
                      <p><span class="time"><?=$unread['created_at']?></span></p>
                      </a></li>
                  <?php endforeach ?>
                  
                  
                  
                </ul>
              </li>
              <li class="footer"><a href="view_message.php">View All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown messages-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bell-o"></i>
            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Notifications</li>
              <li>
                <ul class="menu">
                  <li><a href="#">
                    <div class="pull-left icon-circle red"><i class="icon-lightbulb"></i></div>
                    <h4>Alex C. Patton</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">9:30 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left icon-circle blue"><i class="fa fa-coffee"></i></div>
                    <h4>Nikolaj S. Henriksen</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">1:30 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left icon-circle green"><i class="fa fa-paperclip"></i></div>
                    <h4>Kasper S. Jessen</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">9:30 AM</span></p>
                    </a></li>
                  <li><a href="#">
                    <div class="pull-left icon-circle yellow"><i class="fa  fa-plane"></i></div>
                    <h4>Florence S. Kasper</h4>
                    <p>I've finished it! See you so...</p>
                    <p><span class="time">11:10 AM</span></p>
                    </a></li>
                </ul>
              </li>
              <li class="footer"><a href="#">Check all Notifications</a></li>
            </ul>
          </li>

          <?php
          $user_id =  $_SESSION['id'];
          $select_user = "SELECT * FROM users WHERE id=$user_id";
          $select_user_result = mysqli_query($conn,$select_user);
          $select_user_assoc = mysqli_fetch_assoc($select_user_result);

          ?>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu p-ph-res"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="/New folder/tiger/uploads/user/<?=$select_user_assoc['profile_photo']?>" class="user-image" alt="User Image"> <span class="hidden-xs"><?=$select_user_assoc['name']?></span> </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <div class="pull-left user-img"><img src="/New folder/tiger/uploads/user/<?=$_SESSION['photo']?>" class="img-responsive" alt="User"></div>
                <p class="text-left">Florence Douglas <small>florence@gmail.com</small> </p>
                <div class="view-link text-left"><a href="#">View Profile</a> </div>
              </li>
              
              <li><a href="/New folder/tiger/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar"> 
    <!-- sidebar: style can be found in sidebar.less -->
    <div class="sidebar"> 
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image text-center"><img src="/New folder/tiger/uploads/user/<?=$select_user_assoc['profile_photo']?>" class="img-circle" alt="User Image"> </div>
        <div class="info">
          <p><?=$select_user_assoc['name']?></p>
          <a href="#"><i class="fa fa-cog"></i></a> <a href="#"><i class="fa fa-envelope-o"></i></a> <a href="#"><i class="fa fa-power-off"></i></a> </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">PERSONAL</li>
        <li class="active"> <a href="/New folder/tiger/dashboard.php"> <i class="fa fa-home"></i> <span>Home</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
        </li>
        <?php if($_SESSION['role'] != 0) { ?>
        <li class="treeview"> <a href="#"> <i class="fa fa-user"></i> <span>users</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="/New folder/tiger/users/view_users.php" class="text-white">user list</a></li>
          </ul>
        </li>
        <?php } ?>
        <li class="treeview"> <a href="#"> <i class="fa fa-bullseye"></i> <span>Banner</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="/New folder/tiger/banners/add_banner.php" class="text-white">Add Banner</a></li>
            <li><a href="/New folder/tiger/social/add_social_icon.php" class="text-white">Add Social icon</a></li>
          </ul>
        </li>

        <li class="treeview"> <a href="#"> <i class="fa-solid fa-address-card"></i> <span>About Me</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="/New folder/tiger/about/edit_about.php" class="text-white">Edit About</a></li>
            <li><a href="/New folder/tiger/education/add_edu.php" class="text-white">Add Education</a></li>
          </ul>
        </li>

        <li class="treeview"> <a href="#"> <i class="fa-solid fa-address-card"></i> <span>Services</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="/New folder/tiger/services/add_service.php" class="text-white">Add Services Content</a></li>
          </ul>
        </li>

        <li class="treeview"> <a href="#"> <i class="fa-solid fa-address-card"></i> <span>Works</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="/New folder/tiger/works/add_work.php" class="text-white">Add Work</a></li>
          </ul>
        </li>

        <li class="treeview"> <a href="#"> <i class="fa-solid fa-address-card"></i> <span>Fact Area</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="/New folder/tiger/facts/add_fact.php" class="text-white">Add Fact Content</a></li>
          </ul>
        </li>

        <li class="treeview"> <a href="#"> <i class="fa-solid fa-address-card"></i> <span>Review</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="/New folder/tiger/testimonial/add_testimonial.php" class="text-white">Add Review</a></li>
          </ul>
        </li>

        <li class="treeview"> <a href="#"> <i class="fa-solid fa-address-card"></i> <span>Inbox</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="/New folder/tiger/inbox/view_message.php" class="text-white">Message</a></li>
            <li><a href="/New folder/tiger/inbox/Address/add_contact_information.php" class="text-white">information</a></li>
          </ul>
        </li>

        <li class="treeview"> <a href="#"> <i class="fa-solid fa-address-card"></i> <span>Brand Area</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
          <ul class="treeview-menu">
            <li><a href="/New folder/tiger/brand/add_brand.php" class="text-white">Add brand img</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /.sidebar --> 
  </aside>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <div class="content-header sty-one">
      <h1>Dashboard</h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Dashboard</li>
      </ol>
    </div>
    
    <!-- Main content -->
    <div class="content"> 