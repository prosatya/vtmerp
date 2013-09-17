<!DOCTYPE html>
<html lang="en" class="login_page">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>VMS-1.0 Login Page</title>
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap.min.css" />
            <link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap-responsive.min.css" />
        <!-- theme color-->
            <link rel="stylesheet" href="<?php echo base_url(); ?>/css/blue.css" />
        <!-- tooltip -->    
			<link rel="stylesheet" href="<?php echo base_url(); ?>/css/jquery.qtip.min.css" />
        <!-- main styles -->
            <link rel="stylesheet" href="<?php echo base_url(); ?>/css/style.css" />
        <!-- Favicon -->
            <link rel="shortcut icon" href="favicon.ico" />
        <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
        <!--[if lte IE 8]>
            <script src="js/ie/html5.js"></script>
			<script src="js/ie/respond.min.js"></script>
        <![endif]-->
   </head>
   <body>
	<div class="login_box">
		<?php
 			$attributes = array('name' => 'login', 'id' => 'login');	   
	  		echo form_open('user/loginvalidation' , $attributes);
       ?>
				<div class="top_b">Login to VMS-1.0</div>   
                 
				<div class="alert alert-info alert-login">
		<?php	if ($this->session->flashdata('errormessage') != '')
   				 echo $this->session->flashdata('errormessage'); 
				 else
				 echo "Please enter your user name and password!";
		?>
				</div>
				<div class="cnt_b">
					<div class="formRow">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-user"></i></span>
                              <?php $atts = array(
                           		  'name' => 'user_name',
                          		  'id'   => 'username',
								  'size' => 35
                      		 ); ?>
        		   <?php echo form_input($atts); ?>
						</div>
					</div>
					<div class="formRow">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-lock"></i></span>
                            <?php $atts = array(
                           		  'name' => 'password',
                          		  'id'   => 'password',
								  'size' => 35
                       ); ?>
                        <?php echo form_password($atts); ?>
						</div>
					</div>
				</div>
                <div class="btm_b clearfix">
					<button class="btn btn-inverse pull-right" type="submit">Sign In</button>
					<span class="link_reg"><a href="<?php echo base_url(); ?>user/forgetpassword">Forgot password?</a></span>
				</div>  
			</form>
		</div>
        <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.actual.min.js"></script>
        <script src="<?php echo base_url(); ?>lib/validation/jquery.validate.min.js"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
        <script>
            	//* validation
				$('#login').validate({
					onkeyup: false,
					errorClass: 'error',
					validClass: 'valid',
					rules: {
						username: { required: true, minlength: 3, email: true},
						password: { required: true, minlength: 3 }
					},
					highlight: function(element) {
						$(element).closest('div').addClass("f_error");
						setTimeout(function() {
							boxHeight()
						}, 200)
					},
					unhighlight: function(element) {
						$(element).closest('div').removeClass("f_error");
						setTimeout(function() {
							boxHeight()
						}, 200)
					},
					errorPlacement: function(error, element) {
						$(element).closest('div').append(error);
					}
				});
         </script>
    </body>
</html>

