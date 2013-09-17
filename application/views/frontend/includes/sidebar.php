<!-- sidebar -->
<a href="#" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
            <div class="sidebar">
				<div class="antiScroll">
					<div class="antiscroll-inner">
						<div class="antiscroll-content">
							<div class="sidebar_inner">
								 <h5 class="heading"> &nbsp;&nbsp;
                               <?php echo date('l jS \of F Y'); ?> </h5>
								<div id="side_accordion" class="accordion">
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-user"></i> Administration 		</a>
										</div>
										<div class="accordion-body collapse" id="collapseOne">
											<div class="accordion-inner">
												<ul class="nav nav-list">
									<li><a href="<?php echo base_url(); ?>/index.php?user/registration">User Registration</a></li>				
													<li><a href="<?php echo base_url(); ?>/index.php?vendor/viewForm">Vender Management</a></li>
                                                    <li><a href="<?php echo base_url(); ?>vendor/vendorReports">Vender-List Report</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-th"></i> Vehicle Management 
											</a>
										</div>
										<div class="accordion-body collapse" id="collapseTwo">
			<div class="accordion-inner">
				<ul class="nav nav-list">
				<li><a href="<?php echo base_url(); ?>/index.php?vehicle/viewForm">Add Vehicle</a></li>
				<li><a href="<?php echo base_url(); ?>/index.php?maintainance/viewForm">Vehicle Maintainance</a></li>
				<li><a href="<?php echo base_url(); ?>/index.php?vehicleInsurance/viewVehicleInsurance">Vehicle Insurance</a></li>
				<li><a href="<?php echo base_url(); ?>/index.php?driver/viewForm">Add Driver</a></li>
				<li><a href="<?php echo base_url(); ?>/index.php?driver/driverReport">Driver Reports</a></li>
				<li><a href="<?php echo base_url(); ?>/index.php?vehicleFuel/viewVehicleFuel">Vehicle Fuel</a></li>
                 <li><a href="<?php echo base_url(); ?>/index.php?vehicletrip/viewForm">Vehicle Trip</a></li>
<li><a href="<?php echo base_url(); ?>/index.php?distance_controller/distance">Distance Master Entry</a></li>
 <li><a href="<?php echo base_url(); ?>vehicle/vehicleReport">Vehicles Report</a></li>
 <li><a href="<?php echo base_url(); ?>/index.php?vehicleFuel/vehicleReport">Vehicle-Fuel Report</a></li>
 <!--<li><a href="#">Vehicle-Maintainance Report</a></li>-->
 <li><a href="<?php echo base_url(); ?>/index.php?vehicleInsurance/insuranceReport">Insurance Expiry-Report</a></li>
 <li><a href="<?php echo base_url(); ?>/index.php?vehicleInsurance/insuranceReportEx">Insurance Expense-Report</a></li>
							</ul>
							</div>
							</div>
							</div>
							<div class="accordion-group">
							<div class="accordion-heading">
							<a href="#collapseThree" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
		<i class="icon-user"></i> Tender Management</a>
		</div>
		<div class="accordion-body collapse" id="collapseThree">
		<div class="accordion-inner">
		<ul class="nav nav-list">
		<li><a href="<?php echo base_url(); ?>/tendor/tendorMaster">Add Tender</a></li>
		<li><a href="<?php echo base_url(); ?>/tendor/tendorReport">Tender Report</a></li>
		</ul>
		</div>
		</div>
		</div>
		<div class="accordion-group">
		<div class="accordion-heading">
		<a href="#collapseFive" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
									<i class="icon-user"></i> Inverntory Management	</a>
										</div>
										<div class="accordion-body collapse" id="collapseFive">
											<div class="accordion-inner">
												<ul class="nav nav-list">
                                                <li><a href="<?php echo base_url(); ?>materialmaster/viewForm">Material-Stock Entry</a></li>
													<li><a href="<?php echo base_url(); ?>/index.php?stockinmaster/viewForm">Stock In</a></li>
													<li><a href="<?php echo base_url(); ?>/index.php?stockmaster/viewForm">Stock Out</a></li>
											<li><a href="<?php echo base_url(); ?>materialmaster/materialReports">Material-Stock Report</a></li>
												</ul>
												
											</div>
										</div>
									</div>
                                    <div class="accordion-group">
		<div class="accordion-heading">
		<a href="#collapseSix" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
			<i class="icon-user"></i>Production</a>
			</div>
			<div class="accordion-body collapse" id="collapseSix">
			<div class="accordion-inner">
			<ul class="nav nav-list">
             <li><a href="<?php echo base_url(); ?>production">Production Stock In</a></li>
			<li><a href="<?php echo base_url(); ?>production/stockOut">Production Stock Out</a></li>
			<li><a href="<?php echo base_url(); ?>production/productionMaterial">Production Material</a></li>
			</ul>
			</div>
			</div>
		</div>
                                    <div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseFour" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-cog"></i> HR Management
											</a>
										</div>
										<div class="accordion-body collapse" id="collapseFour">
											<div class="accordion-inner">
                                            <ul class="nav nav-list">
													<li><a href="#">Coming Soon..</a></li>
													
												</ul>
											</div>
										</div>
									</div>
									
								</div>
								
								<div class="push"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
