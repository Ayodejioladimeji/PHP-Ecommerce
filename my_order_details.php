<?php 
require('top.php');
error_reporting(0);
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$order_id=get_safe_value($con,$_GET['id']);

$coupon_details=mysqli_fetch_assoc(mysqli_query($con,"select coupon_value from `order` where id='$order_id'"));
$coupon_value=$coupon_details['coupon_value'];

?>

        <!-- cart-main-area start -->
        <div class="wishlist-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">
                                    <table>
                                        <thead style="background:orangered">
                                            <tr>
                                                <th style="color:white;" class="product-thumbnail">Product Name</th>
												<th style="color:white;" class="product-thumbnail">Product Image</th>
                                                <th style="color:white;" class="product-name">Qty</th>
                                                <th style="color:white;" class="product-price">Price</th>
                                                <th style="color:white;" class="product-price">Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
											$uid=$_SESSION['USER_ID'];
											$res=mysqli_query($con,"select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and `order`.user_id='$uid' and order_detail.product_id=product.id");
											$total_price=0;
											while($row=mysqli_fetch_assoc($res)){
											$total_price=$total_price+($row['qty']*$row['price']);
											?>
                                            <tr>
												<td style="color:#151c58;font-family:arial;font-size:15px" class="product-name"><?php echo $row['name']?></td>
                                                <td class="product-name"> <img src="./media/product/<?php echo $row['image']?>"></td>
												<td style="color:#151c58;font-family:arial;font-size:15px" class="product-name"><?php echo $row['qty']?></td>
												<td style="color:#151c58;font-family:arial;font-size:17px" class="product-name">₦<?php echo $row['price']?></td>
												<td style="color:#151c58;font-family:arial;font-size:17px" class="product-name">₦<?php echo $row['qty']*$row['price']?></td>
                                                
                                            </tr>
                                            <?php } 
											if($coupon_value!=''){
											?>
											<tr>
												<td colspan="3"></td>
												<td class="product-name">Coupon Value</td>
												<td class="product-name"><?php echo $coupon_value?></td>
                                                
                                            </tr>
											<?php } ?>
											<tr style="background:#151c58">
												<td colspan="3"></td>
												<td class="product-name" style="color:#fff;font-size:18px">Total Price</td>
												<td class="product-name" style="color:#fff;font-size:18px">₦
                                                    <?php 
                                                    echo $total_price-$coupon_value
                                                    ?>
                                                </td>
                                                
                                            </tr>
                                        </tbody>
                                        
                                    </table>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        						
<?php require('footer.php')?>        