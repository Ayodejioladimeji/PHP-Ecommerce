<?php 
require('top.php');					
?>

        <!-- Start Contact Area -->
        <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                        <div class="map-contacts--2">
                        <img src="./images/logo/zee.bmp" alt="zee image" style="height:530px;width:90%">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                        <h2 class="title__line--6" style="background:#151c58;color:white;padding:12px;text-align:center;">CONTACT US</h2>
                        <div class="address">
                            <div class="address__icon" style="background:orangered">
                                <i class="icon-location-pin icons"></i>
                            </div>
                            <div class="address__details">
                                <h2 style="color:#151c58"  class="ct__title">our address</h2>
                                <p style="color:#151c58" >Block 24, Abekoko Ifo, ogun state.</p>
                            </div>
                        </div>
                        <div class="address">
                            <div class="address__icon" style="background:orangered">
                                <i class="icon-envelope icons"></i>
                            </div>
                            <div class="address__details">
                                <h2 style="color:#151c58"  class="ct__title">openning hour</h2>
                                <p style="color:#151c58" >24Hours Services </p>
                            </div>
                        </div>

                        <div class="address">
                            <div class="address__icon"style="background:orangered">
                                <i class="icon-phone icons"></i>
                            </div>
                            <div class="address__details">
                                <h2 style="color:#151c58" class="ct__title">Phone Number</h2>
                                <p style="color:#151c58">+234-090-3679-6689</p>
                                <!-- <p style="color:#151c58">+234-081-5385-0235</p> -->
                            </div>
                        </div>
                    </div>      
                </div>
                <div class="row">
                    <div class="contact-form-wrap mt--60">
                        <div class="col-xs-12">
                            <div class="contact-title">
                                <h2 class="title__line--6" style="background:#151c58;color:white;padding:12px;">SEND A MAIL</h2>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <form id="contact-form" action="#" method="post">
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="text" id="name" name="name" placeholder="Your Name*">
                                        <input type="email" id="email" name="email" placeholder="Email*">
										<input type="email" id="mobile" name="mobile" placeholder="Mobile*">
                                    </div>
                                </div>
                                
                                <div class="single-contact-form">
                                    <div class="contact-box message">
                                        <textarea name="message" id="message" placeholder="Your Message"></textarea>
                                    </div>
                                </div>
                                <div class="contact-btn">
                                    <button style="background:orangered" type="button" onclick="send_message()" class="fv-btn">Send MESSAGE</button>
                                </div>
                            </form>
                            <div class="form-output">
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </section>
        <!-- End Contact Area -->
   
<?php require('footer.php')?>        