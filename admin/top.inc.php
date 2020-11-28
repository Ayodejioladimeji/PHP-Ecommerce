<?php
require('connection.inc.php');
require('functions.inc.php');
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

}else{
	header('location:login.php');
	die();
}
?>


<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Dashboard Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body>


         <!-- THE SECTION OF THE LEFT PANEL -->
      <aside id="left-panel" class="left-panel" style="background:#151c58;">
         <nav class="navbar navbar-expand-sm navbar-default" style="background:#151c58">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
               <ul class="nav navbar-nav" style="background:#151c58;">
                  <li class="menu-title" style="background:orangered;color:white;padding:10px;font-weight:bold;font-family:cursive;">Menu</li>
                  
				  <li class="menu-item-has-children dropdown">
                     <a href="product.php" style="color:white"> Product Master</a>
                  </li>
				  <li class="menu-item-has-children dropdown">
                     <?php 
					 if($_SESSION['ADMIN_ROLE']==1){
						echo '<a href="order_master_vendor.php" style="color:white"> Order Master</a>';
					 }else{
						echo '<a href="order_master.php" style="color:white"> Order Master</a>';
					 }
					 ?>
					 
					 
                  </li>
				  <?php if($_SESSION['ADMIN_ROLE']!=1){?>
				   <li class="menu-item-has-children dropdown">
                     <a href="vendor_management.php" style="color:white"> Vendor Management</a>
                  </li>
				  <li class="menu-item-has-children dropdown">
                     <a href="categories.php" style="color:white"> Categories Master</a>
                  </li>
				  <li class="menu-item-has-children dropdown">
                     <a href="sub_categories.php" style="color:white"> Sub Categories Master</a>
                  </li>
                  
				  <li class="menu-item-has-children dropdown">
                     <a href="users.php" style="color:white"> User Master</a>
                  </li>
				  <li class="menu-item-has-children dropdown">
                     <a href="coupon_master.php" style="color:white"> Coupon Master</a>
                  </li>
				  <li class="menu-item-has-children dropdown">
                     <a href="contact_us.php" style="color:white"> Contact Us</a>
                  </li>
				  <?php } ?>
               </ul>
            </div>
         </nav>
      </aside>


      <div id="right-panel" class="right-panel">
         <header id="header" class="header" style="height:60px">
            <div class="top-left">
               <div class="navbar-header">
                  <a class="navbar-brand" href="index.php"><img src="images/mama.png" alt="Logo"></a>
                  <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
               </div>
            </div>

            <!-- THE SECTION OF THE TOP RIGHT -->
            <div class="top-right">
               <div class="header-menu">
                  <div class="user-area dropdown float-right">
                     <a style="color:#151c58" href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome <?php echo $_SESSION['ADMIN_USERNAME']?></a>
                     <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                     </div>
                  </div>
               </div>
            </div>
         </header>