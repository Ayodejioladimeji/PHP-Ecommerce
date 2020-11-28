<?php require('top.php')?>
<div class="body__overlay"></div>

    <style>
        .slider__activation__wrap{}

        .slider__inner h1{
            color:orangered;
            text-shadow:2px 2px #151c58;
            font-family:cursive;
            font-size:70px;
        }

        .fr__product__inner .name a{
            font-size:13px;;
        }

        @media screen and (max-width:768px){
            .slider__inner h1{
                font-size:45px;
            }   
        }

        @media screen and (max-width:1024px) and (min-width:769px){
            .slider__inner h1{
                font-size:50px;
            }
            .slider__inner .cr__btn{
                margin-top:20px;
            }   
        }

        @media screen and (max-width:765px) and (min-width:426px){
            .slider__inner h1{
                font-size:40px;
            }
            .slider__inner .cr__btn{
                margin-top:20px;
            }   
        }

        @media screen and (max-width:425px){
            .slider__inner h1{
                font-size:30px;
            }
            .slider__inner h2{
                font-size:17px;
            }
            .slider__inner .cr__btn{
                margin-top:20px;
            }
            .section__title--2 .title__line{
                font-size:25px;
            }   
        }
       
    </style>
        
        <!-- The sectio that Start Slider Area -->
        <div class="slider__container slider--one bg__cat--3">
            <div class="slide__container slider__activation__wrap owl-carousel">
                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6 shop">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2 style="color:#151c58;font-weight:bold;">New collection 2020</h2>
                                        <h1>Get Exciting Stuffs...</h1>
                                        <div class="cr__btn">
                                            <a style="background:#151c58;font-weigth:bold;" href="cart.php">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="images/slider/fornt-img/shop2.svg" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
                
            
                
                
                
                <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2 style="color:#151c58;font-weight:bold;">Join us today & Enjoy</h2>
                                        <h1>Explore Unisex Accessories...</h1>
                                        <div class="cr__btn">
                                            <a style="background:#151c58;font-weigth:bold;" href="cart.php">Get Started</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="images/slider/fornt-img/shop.svg" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
                
                
                 <!-- Start Single Slide -->
                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2 style="color:#151c58;font-weight:bold;">we will keep you safe</h2>
                                        <h1>Enjoy Weekly Discount offers...</h1>
                                        <div class="cr__btn">
                                            <a style="background:#151c58;font-weigth:bold;" href="cart.php">Explore</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!--The section of the slider-->
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="images/slider/fornt-img/shop1.svg" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide -->
            </div>
        </div>
        <!-- Start Slider Area -->



        <!-- Start Category Area -->
        <section class="htc__category__area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12" style="background:orangered;padding:23px;">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line" style="color:white;font-family:cursive">New Arrivals</h2>
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">
							<?php
							$get_product=get_product($con,40,'','','','');
							foreach($get_product as $list){
							?>
                            <!-- Start Single Category -->
                            <div class="col-md-4 col-lg-2 col-sm-4 col-xs-12">
                                <div class="category" style="border:1px solid orangered">
                                    <div class="ht__cat__thumb">
                                        <a href="product.php?id=<?php echo $list['id']?>">
                                            <img src="media/product/<?php echo $list['image']?>" alt="product images">
                                        </a>
                                    </div>
                                    <div class="fr__hover__info">
										<ul class="product__action">
											<li><a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')"><i class="icon-heart icons"></i></a></li>
											<li><a href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')"><i class="icon-handbag icons"></i></a></li>
										</ul>
									</div>
                                    <div class="fr__product__inner" style="background:#151c58;">
                                        <h4 class="name"><a style="color:white;font-family:monospace;" href="product.php?id=<?php echo $list['id']?>"><?php echo $list['name']?></a></h4>
                                        <ul class="fr__pro__prize" style="background:orangered">
                                            <li style="color:white" class="old__prize"><strike>₦<?php echo $list['mrp']?></strike></li>
                                            <li style="color:white">₦<?php echo $list['price']?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Category -->
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Category Area -->




        <!-- Start Product Area -->
        <section class="ftr__product__area ptb--100">
            <div class="container-fluid">
                <div class="row">
                <div class="col-xs-12" style="background:#151c58;padding:23px;">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line" style="color:white;font-family:cursive">Best Selling</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product__list clearfix mt--30">
							<?php
							$get_product=get_product($con,40,'','','','','yes');
							foreach($get_product as $list){
							?>
                           <!-- Start Single Category -->
                           <div class="col-md-4 col-lg-2 col-sm-4 col-xs-12">
                                <div class="category" style="border:1px solid orangered">
                                    <div class="ht__cat__thumb">
                                        <a href="product.php?id=<?php echo $list['id']?>">
                                            <img src="media/product/<?php echo $list['image']?>" alt="product images">
                                        </a>
                                    </div>
                                    <div class="fr__hover__info">
										<ul class="product__action">
											<li><a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')"><i class="icon-heart icons"></i></a></li>
											<li><a href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')"><i class="icon-handbag icons"></i></a></li>
										</ul>
									</div>
                                    <div class="fr__product__inner" style="background:#151c58">
                                        <h4><a style="color:white;font-family:monospace;" href="product.php?id=<?php echo $list['id']?>"><?php echo $list['name']?></a></h4>
                                        <ul class="fr__pro__prize">
                                            <!-- <li style="color:white" class="old__prize"><strike>₦<?php echo $list['mrp']?></strike></li> -->
                                            <li style="color:white">₦<?php echo $list['price']?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Category -->
							<?php } ?>
                        </div>
                </div>
            </div>
        </section>
        <!-- End Product Area -->        

		<input type="hidden" id="qty" value="1"/>
<?php require('footer.php')?>        