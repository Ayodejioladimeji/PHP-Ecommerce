<?php
require('connection.inc.php');
require('functions.inc.php');
require('add_to_cart.inc.php');
$wishlist_count=0;
$cat_res=mysqli_query($con,"select * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;	
}

$obj=new add_to_cart();
$totalProduct=$obj->totalProduct();

if(isset($_SESSION['USER_LOGIN'])){
	$uid=$_SESSION['USER_ID'];
	
	if(isset($_GET['wishlist_id'])){
		$wid=get_safe_value($con,$_GET['wishlist_id']);
		mysqli_query($con,"delete from wishlist where id='$wid' and user_id='$uid'");
	}

	$wishlist_count=mysqli_num_rows(mysqli_query($con,"select product.name,product.image,product.price,product.mrp,wishlist.id from product,wishlist where wishlist.product_id=product.id and wishlist.user_id='$uid'"));
}

$script_name=$_SERVER['SCRIPT_NAME'];
$script_name_arr=explode('/',$script_name);
$mypage=$script_name_arr[count($script_name_arr)-1];

$meta_title="MamaZee Wears";
$meta_desc="MamaZee Wears";
$meta_keyword="MamaZee Wears";
if($mypage=='product.php'){
	$product_id=get_safe_value($con,$_GET['id']);
	$product_meta=mysqli_fetch_assoc(mysqli_query($con,"select * from product where id='$product_id'"));

}if($mypage=='contact.php'){
	$meta_title='Contact Us';
}

?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $meta_title?></title>
    <meta name="description" content="<?php echo $meta_desc?>">
	<meta name="keywords" content="<?php echo $meta_keyword?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	 <!-- Place favicon.ico in the root directory -->
	 <link rel="shortcut icon" type="image/x-icon" href="images/zee.png">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="/css/custom.css">
	<script src="js/vendor/modernizr-3.5.0.min.js"></script>
	<style>


	.htc__shopping__cart a span.htc__wishlist {
		/* background: #c43b68; */
		border-radius: 100%;
		color: #fff;
		font-size: 9px;
		height: 17px;
		line-height: 19px;
		position: absolute;
		right: 18px;
		text-align: center;
		top: -4px;
		width: 17px;
		margin-right:15px;
		background:red;
	}

	.logo{
		background:none;
	}

	.logo img{
    width:100%;
    height:100%;
	}


	.logo h2{
		font-size:16px;
		color:#00ff00;
		text-shadow:1px 1px EB3007;
		font-weight:bold;
		display:flex;
	}

	.logo span{
		font-size:16px;
		color:#EB3007;
		text-shadow:1px 1px #ffffff;
		font-weight:bold;
	}

	.zee{
		text-align:center;
		border-left:1px solid orangered;
		margin-left:-5px;
		padding:5px;
	}

	.zee h3{
		color:#ffffff;
		font-weight:bold;
		text-shadow:1px 1px orangered;
	}

	.navbar-toggler{
		display:none;
	}
	.nav-item{
		margin-top:25px;
	}
	.my_account, .my_name{
		display:none;
	}

	/* THE SECTION OF THE STICKY HEADER */
	.sticky__header.scroll-header{
		background:orangered;
	}


	/* ====================================== */
	/* Analyzed responsiveness */
	@media screen and (max-width:768px){
		.zee h3{
			font-size:15px;
		}
		.zee h2{
			font-size:13px;
		}

		.logo span{
			font-size:13px;
			color:#EB3007;
			text-shadow:1px 1px #ffffff;
			font-weight:bold;
		}

		.logo{
			margin-left:-20px;
		}

		.my_account, .my_name{
		display:block;
		}
		.account{
			background:#151c58;
			text-align:center;
		}
		.dropdown-item{
			text-align:center;
			font-size:14px;
		}
		.account i{
			margin-right:10px;
			font-size:15px;
		}

		.htc__shopping__cart{
			display:flex;
		}
		
	}


	/* ================================== */
	@media screen and (max-width:1024px) and (min-width:769px){
		.htc__shopping__cart{
			display:flex;
		}
		
	}

	/* ================================== */
	@media screen and (max-width:1260px) and (min-width:1025px){
		.htc__shopping__cart{
			display:flex;
		}
		
	}



	</style>
</head>
<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <header id="htc__header" class="htc__header__area header--one" style="background:#151c58">
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <!--The section of the logo-->
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                <div class="logo">
									<a href="index.php"><img src="images/logo/mama.png" alt="logo images"></a>
									<div class="zee">
										<h2>MaMa<span>Zee</span></h2>
										<h3>WEARS</h3>
									</div>
                                </div>
                            </div>

                            <div class="col-md-7 col-lg-6 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a style="color:white;font-weight:bold;" href="index.php">Home</a></li>
                                        <?php
										foreach($cat_arr as $list){
											?>
											<li class="drop"><a style="color:white;font-weight:bold;" href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a>
											<?php
											$cat_id=$list['id'];
											$sub_cat_res=mysqli_query($con,"select * from sub_categories where status='1' and categories_id='$cat_id'");
											if(mysqli_num_rows($sub_cat_res)>1){
											?>
											
											   <ul class="dropdown">
													<?php
													while($sub_cat_rows=mysqli_fetch_assoc($sub_cat_res)){
														echo '<li><a style="color:white;background:#151c58;font-weight:bold;" href="categories.php?id='.$list['id'].'&sub_categories='.$sub_cat_rows['id'].'">'.$sub_cat_rows['sub_categories'].'</a></li>
													';
													}
													?>
												</ul>
												<?php } ?>
											</li>
											<?php
										}
										?>
                                        <li><a style="color:white;font-weight:bold;" href="contact.php">contact</a></li>
                                    </ul>
                                </nav>

                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
											<p class="my_name" style="text-align:center;">
												<a style="color:#00ff00;font-family:cursive;">
													Hi, <?php echo $_SESSION['USER_NAME']?>
												</a>
											</p>
                                            <li><a href="index.php">Home</a></li>
                                            <?php
											foreach($cat_arr as $list){
												?>
												<li class="drop"><a href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a>
											<?php
											$cat_id=$list['id'];
											$sub_cat_res=mysqli_query($con,"select * from sub_categories where status='1' and categories_id='$cat_id'");
											if(mysqli_num_rows($sub_cat_res)>0){
											?>
											
											   <ul class="dropdown">
													<?php
													while($sub_cat_rows=mysqli_fetch_assoc($sub_cat_res)){
														echo '<li><a href="categories.php?id='.$list['id'].'&sub_categories='.$sub_cat_rows['id'].'">'.$sub_cat_rows['sub_categories'].'</a></li>
													';
													}
													?>
												</ul>
												<?php } ?>
											</li>
												<?php
											}
											?>
											<li><a href="contact.php">contact</a></li>

											<li class="my_account"><a href="#">MY ACCOUNT</a>
                                                <ul class="account">
                                                    <a class="dropdown-item" href="my_order.php">
														<i class="fa fa-shopping-cart"></i>Order
													</a>
													<a class="dropdown-item" href="profile.php">
														<i class="fa fa-user"></i>Profile
													</a>
													<a class="dropdown-item" href="logout.php">
														<i class="fa fa-power-off"></i>Logout
													</a>
                                                </ul>
                                            </li>
										</ul>
										
										
                                    </nav>
                                </div>  
							</div>
							
                            <div class="col-md-3 col-lg-4 col-sm-4 col-xs-4 stella">
                                <div class="header__right">
									<?php 
									$class="mr15";
									if(isset($_SESSION['USER_LOGIN'])){
										$class="";
									}
									?>
									<div class="header__search search search__open <?php echo $class?>">
                                        <a href="#"><i style="color:white" class="icon-magnifier icons"></i></a>
                                    </div>
									
                                    <div class="header__account">
										<?php if(isset($_SESSION['USER_LOGIN'])){
											?>
											<nav class="navbar navbar-expand-lg navbar-light bg-light">
											   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
												<!-- <span class="navbar-toggler-icon"></span> -->
												<i class="fa fa-user"></i>
											  </button>

												<div class="collapse navbar-collapse" id="navbarSupportedContent">
													<ul class="navbar-nav mr-auto">
														<li class="nav-item dropdown">
															<a style="color:#00ff00;font-family:cursive" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															Hi <?php echo $_SESSION['USER_NAME']?>
															</a>
															
															<div class="dropdown-menu" aria-labelledby="navbarDropdown">
															<a class="dropdown-item" href="my_order.php">Order</a>
															<a class="dropdown-item" href="profile.php">Profile</a>
															<div class="dropdown-divider"></div>
															<a class="dropdown-item" href="logout.php">Logout</a>
															</div>
														</li>			
													</ul>
												</div>
											</nav>
											<?php
										}else{
											echo '<a style="color:white" href="login.php" class="mr15"><i class="icon-user icons"></i></a>';
										}
										?>
									
                                        
										
                                    </div>
                                    <div class="htc__shopping__cart">
										<?php
										if(isset($_SESSION['USER_ID'])){
										?>
										<a href="wishlist.php" class="mr15"><i style="color:white" class="icon-heart icons"></i></a>
                                        <a href="wishlist.php"><span style="background:#00ff00;font-size:15px;color:#151c58;font-weight:bold" class="htc__wishlist"><?php echo $wishlist_count?></span></a>
										<?php } ?>
                                        <a href="cart.php"><i style="color:white" class="icon-handbag icons"></i></a>
                                        <a style="color:orange" href="cart.php"><span style="background:#00ff00;font-size:15px;color:#151c58;font-weight:bold" class="htc__qua"><?php echo $totalProduct?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>

                    <div class="mobile-menu-area"></div>
                </div>
            </div>
        </header>

		<div class="body__overlay"></div>

		<div class="offset__wrapper">
            <div class="search__area" style="background:orangered">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="search__inner">
                                <form action="search.php" method="get">
                                    <input placeholder="Search here... " type="text" name="str">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>