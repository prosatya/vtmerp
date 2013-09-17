<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>VMS-1.0</title>
    
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap.min.css" />
            <link rel="stylesheet" href="<?php echo base_url(); ?>/css/bootstrap-responsive.min.css" />
        <!-- gebo blue theme-->
            <link rel="stylesheet" href="<?php echo base_url(); ?>/css/blue.css" id="link_theme" />
        <!-- breadcrumbs-->
            <link rel="stylesheet" href="<?php echo base_url(); ?>/css/BreadCrumb.css" />
           
        <!-- tooltips-->
            <link rel="stylesheet" href="<?php echo base_url(); ?>/css/jquery.qtip.min.css" />
        <!-- main styles -->
            <link rel="stylesheet" href="<?php echo base_url(); ?>/css/style.css" />
             
			<link rel="stylesheet" href="<?php echo base_url(); ?>/css/datepicker.css" />
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
	
        <!-- Favicon -->
            <link rel="shortcut icon" href="favicon.ico" />
		
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="css/ie.css" />
            <script src="js/ie/html5.js"></script>
			<script src="js/ie/respond.min.js"></script>
        <![endif]-->
		
		<!--<script>
			//* hide all elements & show preloader
			document.documentElement.className += 'js';
		</script>-->
	 <script src="<?php echo base_url(); ?>/js/jquery.min.js"></script>
    <!-- smart resize event -->
   <!-- <script src="<?php //echo base_url(); ?>/js/jquery.debouncedresize.min.js"></script>-->
    <!-- hidden elements width/height -->
    <script src="<?php echo base_url(); ?>/js/jquery.actual.min.js"></script>
    <!-- js cookie plugin -->
    <script src="<?php echo base_url(); ?>/js/jquery.cookie.min.js"></script>
    <!-- main bootstrap js -->
    <script src="<?php echo base_url(); ?>/js/bootstrap.min.js"></script>
    <!-- tooltips -->
   <!-- <script src="<?php echo base_url(); ?>/js/jquery.qtip.min.js"></script>-->
    <!-- jBreadcrumbs -->
    <script src="<?php echo base_url(); ?>/js/jquery.jBreadCrumb.1.1.min.js"></script>
    <!-- sticky messages -->
  <!--  <script src="<?php //echo base_url(); ?>/js/sticky.min.js"></script>-->
    <!-- fix for ios orientation change -->
    <script src="<?php echo base_url(); ?>/js/ios-orientationchange-fix.js"></script>
    <!-- scrollbar -->
  <!--  <script src="<?php //echo base_url(); ?>/js/antiscroll.js"></script>-->
  <!--  <script src="<?php //echo base_url(); ?>/js/jquery-mousewheel.js"></script>-->
    
    
     <!-- datepicker -->
   <!-- <script src="<?php //echo base_url(); ?>/js/bootstrap-datepicker.min.js"></script>-->
   
    <!-- validation -->
    <script src="<?php echo base_url(); ?>/js/jquery.validate.min.js"></script>
            <!-- validation functions -->
    <script src="<?php echo base_url(); ?>js/zebra_datepicker.js"></script>        
           
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/default.css" type="text/css">
			
        
        <style>.table-striped tbody tr:nth-child(2n+1) td, .table-striped tbody tr:nth-child(2n+1) th {
    background-color: #fff!important;
}
.table-bordered th, .table-bordered td {
    border:none!important;
}
.table th, .table td {
    
    line-height: 20px!important;
    padding: 2px 2px 2px 4px!important;
    text-align: left;
    vertical-align: top;
}
</style>
    </head>
    <body>
		<div id="loading_layer" style="display:none"><img src="img/ajax_loader.gif" alt="" /></div>
		
		
		<div id="maincontainer" class="clearfix">
			<!-- header -->
            <header>
                <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            <a class="brand" href="<?php echo base_url(); ?>user/profile"><i class="icon-home icon-white"></i> VMS-1.0</a>
                            <ul class="nav user_menu pull-right">
                               
                                <li class="divider-vertical hidden-phone hidden-tablet"></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('user_name'); ?> <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>user/profile">My Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url(); ?>user/logout">Log Out</a></li>
                                </ul>
                                </li>
                            </ul>
							<a data-target=".nav-collapse" data-toggle="collapse" class="btn_menu">
								<span class="icon-align-justify icon-white"></span>
							</a>
                            
                        </div>
                    </div>
                </div>
             </header>
