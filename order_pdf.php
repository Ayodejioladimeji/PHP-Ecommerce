<?php
include('vendor/autoload.php');
require('connection.inc.php');
require('functions.inc.php');
error_reporting(0);

if(!$_SESSION['ADMIN_LOGIN']){
	if(!isset($_SESSION['USER_ID'])){
		die();
	}
}

$order_id=get_safe_value($con,$_GET['id']);

$coupon_details=mysqli_fetch_assoc(mysqli_query($con,"select coupon_value from `order` where id='$order_id'"));
$coupon_value=$coupon_details['coupon_value'];

$css=file_get_contents('css/bootstrap.min.css');
$css.=file_get_contents('style.css');

$html='<div class="wishlist-table table-responsive">
	<h1 style="background:#151c58;color:white;text-align:center;padding:15px;font-family:monospace;font-size:18px;font-weight:bold
	;text-shadow:2px 2px orangered">MAMA ZEE WEARS</h1>
   <table>
      <thead>
         <tr style="background:orangered;">
            <th style="color:white;" class="product-thumbnail">Product Name</th>
            <th style="color:white;" class="product-thumbnail">Product Image</th>
            <th style="color:white;" class="product-name">Qty</th>
            <th style="color:white;" class="product-price">Price</th>
            <th style="color:white;" class="product-price">Total Price</th>
         </tr>
      </thead>
      <tbody>';
		
		if(isset($_SESSION['ADMIN_LOGIN'])){
			$res=mysqli_query($con,"select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and order_detail.product_id=product.id");
		}else{
			$uid=$_SESSION['USER_ID'];
			$res=mysqli_query($con,"select distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and `order`.user_id='$uid' and order_detail.product_id=product.id");
		}
		
		$total_price=0;
		if(mysqli_num_rows($res)==0){
			die();
		}
		while($row=mysqli_fetch_assoc($res)){
		$total_price=$total_price+($row['qty']*$row['price']);
		 $pp=$row['qty']*$row['price'];
         $html.='<tr>
            <td class="product-name">'.$row['name'].'</td>
            <td class="product-name"> <img src="./media/product/'.$row['image'].'"></td>
            <td class="product-name">'.$row['qty'].'</td>
            <td class="product-name">₦'.$row['price'].'</td>
            <td class="product-name">₦'.$pp.'</td>
         </tr>';
		 }
		 
		if($coupon_value!=''){								
			$html.='<tr>
				<td colspan="3"></td>
				<td class="product-name">Coupon Value</td>
				<td class="product-name">'.$coupon_value.'</td>
				
			</tr>';
		}
		 
		 $total_price=$total_price-$coupon_value;
		 $html.='<tr style="background:#151c58;">
				<td colspan="3"></td>
				<td style="color:white;font-family:monospace;" class="product-name">Total Price</td>
				<td style="color:white;font-family:monospace;" class="product-name">₦'.$total_price.'</td>
				
			</tr>';
			
	  $html.='</tbody>
	  
   </table>
</div>';
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($html,2);
$file=time().'.pdf';
$mpdf->Output($file,'D');
?>
