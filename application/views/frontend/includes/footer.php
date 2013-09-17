   		<script>
            $(document).ready(function(){
				//* validation
				$('#registration').validate({
					onkeyup: false,
					errorClass: 'error',
					validClass: 'valid',
					rules: {
						username: { required: true, minlength: 3 },
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
            });
        </script>
			
			<script src="<?php echo base_url(); ?>/js/jquery.min.js"></script>
			<!-- smart resize event -->
			<script src="<?php echo base_url(); ?>/js/jquery.debouncedresize.min.js"></script>
			<!-- hidden elements width/height -->
			<script src="<?php echo base_url(); ?>/js/jquery.actual.min.js"></script>
			<!-- js cookie plugin -->
			<script src="<?php echo base_url(); ?>/js/jquery.cookie.min.js"></script>
			<!-- main bootstrap js -->
			<script src="<?php echo base_url(); ?>/js/bootstrap.min.js"></script>
			<!-- tooltips -->
			<script src="<?php echo base_url(); ?>/js/jquery.qtip.min.js"></script>
			<!-- jBreadcrumbs -->
			<script src="<?php echo base_url(); ?>/js/jquery.jBreadCrumb.1.1.min.js"></script>
			<!-- sticky messages -->
            <script src="<?php echo base_url(); ?>/js/sticky.min.js"></script>
			<!-- fix for ios orientation change -->
			<script src="<?php echo base_url(); ?>/js/ios-orientationchange-fix.js"></script>
			<!-- scrollbar -->
			<script src="<?php echo base_url(); ?>/js/antiscroll.js"></script>
			<script src="<?php echo base_url(); ?>/js/jquery-mousewheel.js"></script>
			<!-- lightbox -->
            <script src="<?php echo base_url(); ?>/js/jquery.colorbox.min.js"></script>
            <!-- common functions -->
		
	
            <!-- validation -->
            <script src="<?php echo base_url(); ?>/js/validation/jquery.validate.min.js"></script>
            <!-- validation functions -->
            <script src="<?php echo base_url(); ?>/js/gebo_validation.js"></script>
    
			<script>
				$(document).ready(function() {
					//* show all elements & remove preloader
					setTimeout('$("html").removeClass("js")',1000);
				});
			</script>
		
		</div>
	</body>
</html>