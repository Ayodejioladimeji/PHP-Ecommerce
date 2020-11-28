<?php 
require('top.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	alert("Login to continue")
	window.location.href='index.php';
	</script>
	<?php
}
?>

	<style>
		
	</style>
        
		<!-- Start Contact Area -->
        <section class="htc__contact__area ptb--100 bg__white" style="background:orangered">
            <div class="container">
                <div class="row">
					<div class="col-md-6">
						<div class="contact-form-wrap mt--60" style="height:200px;">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6" style="color:white">Profile</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="login-form" method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="name" id="name" placeholder="Your Name*" style="width:80%" value="<?php echo $_SESSION['USER_NAME']?>">
										</div>
										<span style="color:red;background:white;" class="field_error" id="name_error"></span>
									</div>
									
									<div class="contact-btn">
										<button style="background:#151c58" type="button" class="fv-btn" onclick="update_profile()" id="btn_submit">Update</button>
										
									</div>
								</form>
								
								
								
							</div>
						</div>
					</div> 
                
				
					<div class="col-md-6">
						<div class="contact-form-wrap mt--60" style="background:red;">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6" style="color:white;">Change Password</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form method="post" id="frmPassword">
									<div class="single-contact-form">
										<label class="password_label" style="color:white;font-family:monospace;font-size:15px;">Current Password</label>
										<div class="contact-box name">
											<input type="password" name="current_password" id="current_password" style="width:80%">
										</div>
										<span style="color:red;background:white;" class="field_error" id="current_password_error"></span>
									</div>

									<div class="single-contact-form">
										<label class="password_label" style="color:white;font-family:monospace;font-size:15px;">New Password</label>
										<div class="contact-box name">
											<input type="password" name="new_password" id="new_password" style="width:80%">
										</div>
										<span style="color:red;background:white;" class="field_error" id="new_password_error"></span>
									</div>

									<div class="single-contact-form">
										<label class="password_label" style="color:white;font-family:monospace;font-size:15px;">Confirm New Password</label>
										<div class="contact-box name">
											<input type="password" name="confirm_new_password" id="confirm_new_password" style="width:80%">
										</div>
										<span style="color:red;background:white;" class="field_error" id="confirm_new_password_error"></span>
									</div>
									
									<div class="contact-btn">
										<button style="background:#151c58" type="button" class="fv-btn" onclick="update_password()" id="btn_update_password">Update</button>
										
									</div>
								</form>	
							</div>
						</div> 
					</div>
                
				</div>
				

					
            </div>
        </section>
		<script>
		function update_profile(){
			jQuery('.field_error').html('');
			var name=jQuery('#name').val();
			if(name==''){
				jQuery('#name_error').html('Please enter your name');
			}else{
				jQuery('#btn_submit').html('Please wait...');
				jQuery('#btn_submit').attr('disabled',true);
				jQuery.ajax({
					url:'update_profile.php',
					type:'post',
					data:'name='+name,
					success:function(result){
						jQuery('#name_error').html(result);
						jQuery('#btn_submit').html('Update');
						jQuery('#btn_submit').attr('disabled',false);
					}
				})
			}
		}
		
		function update_password(){
			jQuery('.field_error').html('');
			var current_password=jQuery('#current_password').val();
			var new_password=jQuery('#new_password').val();
			var confirm_new_password=jQuery('#confirm_new_password').val();
			var is_error='';
			if(current_password==''){
				jQuery('#current_password_error').html('Please enter password');
				is_error='yes';
			}if(new_password==''){
				jQuery('#new_password_error').html('Please enter password');
				is_error='yes';
			}if(confirm_new_password==''){
				jQuery('#confirm_new_password_error').html('Please enter password');
				is_error='yes';
			}
			
			if(new_password!='' && confirm_new_password!='' && new_password!=confirm_new_password){
				jQuery('#confirm_new_password_error').html('Please enter same password');
				is_error='yes';
			}
			
			if(is_error==''){
				jQuery('#btn_update_password').html('Please wait...');
				jQuery('#btn_update_password').attr('disabled',true);
				jQuery.ajax({
					url:'update_password.php',
					type:'post',
					data:'current_password='+current_password+'&new_password='+new_password,
					success:function(result){
						jQuery('#current_password_error').html(result);
						jQuery('#btn_update_password').html('Update');
						jQuery('#btn_update_password').attr('disabled',false);
						jQuery('#frmPassword')[0].reset();
					}
				})
			}
			
		}
		</script>
<?php require('footer.php')?>        