<!DOCTYPE html>
<html lang="en" class="login_page">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>VMS 1.0 Beta Version - Login Page</title>
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />
            <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-responsive.min.css" />
        <!-- theme color-->
            <link rel="stylesheet" href="<?php echo base_url(); ?>css/blue.css" />
        <!-- tooltip -->    
			<link rel="stylesheet" href="<?php echo base_url(); ?>js/jquery.qtip.min.css" />
        <!-- main styles -->
            <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" />
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
		$attributes = array('name' => 'forgetPassword', 'id' => 'forgetPassword');	   		echo form_open('user/forgetpassword' , $attributes);
       		?>
				<div class="top_b">Forgot Password</div>    
				<div class="alert alert-info alert-login">
					Please enter your Email address here !.
				</div>
				<div class="cnt_bb">
					<div class="formRow" >
						<div class="input-prepend">
							<span class="add-on"><i class="icon-user"></i></span>
                             <?php $atts = array(
                           		  'name' => 'email',
                          		  'id'   => 'email',
								  'size' => 35
                       ); ?>
		 
        		   <?php echo form_input($atts); ?>
                            <span style="position:absolute; margin-left:8px;"><button class="btn btn-inverse pull-right" type="submit">Submit</button></span>
						</div>
					</div>
				</div>
				<div class="btm_b clearfix">
					<span class="link_reg"><a href="<?php echo base_url(); ?>user/login">Login</a></span>
				</div>  
			</form>
		</div>
		
        <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.actual.min.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
 				//* validation
				$('#forgetPassword').validate({
					onkeyup: false,
					errorClass: 'error',
					validClass: 'valid',
					rules: {
						email: { required: true, email: true }
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
            });
        </script>
    </body>
</html>
