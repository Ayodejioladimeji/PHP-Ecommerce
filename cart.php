<?php 
require('top.php');
?>


         <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead style="background:orangered;color:white;">
                                        <tr>
                                            <th style="color:white" class="product-thumbnail">products</th>
                                            <th style="color:white" class="product-name">name of products</th>
                                            <th style="color:white" class="product-price">Price</th>
                                            <th style="color:white" class="product-quantity">Quantity</th>
                                            <th style="color:white" class="product-subtotal">Total</th>
                                            <th style="color:white" class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										if(isset($_SESSION['cart'])){
											foreach($_SESSION['cart'] as $key=>$val){
											$productArr=get_product($con,'','',$key);
											$pname=$productArr[0]['name'];
											$mrp=$productArr[0]['mrp'];
											$price=$productArr[0]['price'];
											$image=$productArr[0]['image'];
											$qty=$val['qty'];
											?>
											<tr>
												<td class="product-thumbnail"><a href="#"><img src="./media/product/<?php echo $image?>"  /></a></td>
												<td style="font-family:cursive;" class="product-name"><a style="color:#151c58" href="#"><?php echo $pname?></a>
													<ul  class="pro__prize">
														<li style="color:red" class="old__prize"><strike>₦<?php echo $mrp?></strike></li>
														<li style="color:#151c58">₦<?php echo $price?></li>
													</ul>
												</td>
												<td class="product-price"><span style="color:#151c58;font-size:18px" class="amount">₦<?php echo $price?></span></td>
												<td class="product-quantity"><input style="background:#151c58;color:white" type="number" id="<?php echo $key?>qty" value="<?php echo $qty?>" />
												<br/><a style="color:green;font-weight:bold;" href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','update')">UPDATE</a>
												</td>
												<td style="color:#151c58;font-size:18px" class="product-subtotal">₦<?php echo $qty*$price?></td>
												<td class="product-remove"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i style="color:red" class="icon-trash icons"></i></a></td>
											</tr>
											<?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart">
                                            <a style="background:#151c58;color:white;" href="index.php">Continue Shopping</a>
                                        </div>
                                        <div class="buttons-cart checkout--btn">
                                            <a style="background:#151c58;color:white;" href="checkout.php">checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        
										
<?php require('footer.php')?>        