<?php 
require('top.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
    alert('Please login to continue')
	window.location.href='index.php';
	</script>
	<?php
}
$uid=$_SESSION['USER_ID'];

$res=mysqli_query($con,"select product.name,product.image,product.price,product.mrp,product.id as pid,wishlist.id from product,wishlist where wishlist.product_id=product.id and wishlist.user_id='$uid'");
?>

        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead style="background:orangered">
                                        <tr>
                                            <th style="color:white" class="product-thumbnail">products</th>
                                            <th style="color:white" class="product-name">name of products</th>
                                            <th style="color:white" class="product-name">Remove</th>
											<th style="color:white" class="product-name">Add to cart</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										while($row=mysqli_fetch_assoc($res)){
										?>
											<tr>
												<td class="product-thumbnail"><a href="#"><img src="./media/product/<?php echo $row['image']?>"  /></a></td>
												<td class="product-name"><a style="color:#151c58;font-size:18px;font-family:monospace;" href="#"><?php echo $row['name']?></a>
													<ul  class="pro__prize">
														<li style="color:red" class="old__prize"><strike>₦<?php echo $row['mrp']?></strike></li>
														<li style="color:#151c58">₦<?php echo $row['price']?></li>
													</ul>
												</td>
												
												<td class="product-remove"><a href="wishlist.php?wishlist_id=<?php echo $row['id']?>"><i style="color:red" class="icon-trash icons"></i></a></td>
												<td class="product-remove"><a style="font-size:18px;font-family:cursive;color:white;background:#151c58;" href="javascript:void(0)" onclick="manage_cart('<?php echo $row['pid']?>','add')">Add to Cart</a></td>
											</tr>
											<?php } ?>
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
        
		<input type="hidden" id="qty" value="1"/>						
<?php require('footer.php')?>        