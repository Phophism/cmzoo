<?php
defined('BASEPATH') OR exit('No direct script access allowed');
		$this->load->view('layouts/head', array('title' => "Day Night Status",'test'=>"Test"));
		$this->load->view('layouts/body_layout_1');
		$this->load->view('layouts/header');
		$this->load->view('layouts/menu');
?>

	<div class="col-lg-10 ">
		<div class="row">
			<!--Group 1-->
			<div class="col-lg-12">
				<div class="card" >
					<div class="card-header" >
						<form id="dateForm" method="POST" action="<?php echo base_url();?>daynight">
							<input type="checkbox" id="checkbox" name="cageselect" data-toggle="toggle" style="min-height:32px;" data-onstyle="success" data-offstyle="info" onchange="change();" 
							<?php
								if(!isset($cageReceive))
									echo " " ;
								else
									echo " checked";	
							?>
							/>
							<?php
								if(isset($dateReceive))
									echo "<input type=\"date\" id=\"date\" name =\"datepicker\" class=\"input-sm float-right\" onkeydown=\"return false\" onchange=\"change();\" value=\"".$dateReceive."\"  max=\"".date('Y-m-d')."\" />" ;
								else
									echo "<input type=\"date\" id=\"date\" name =\"datepicker\" class=\"input-sm float-right\" onkeydown=\"return false\" onchange=\"change();\" value=\"".date('Y-m-d')."\"  max=\"".date('Y-m-d')."\" />" ;				
							?>			
						</form>
					</div>
				</div>
			</div>
			<hr/>

			<!--Group 2-->
			<div class="col-lg-12" style="margin-top:12px;">
				<div class="card">
					<div class="row">
						<div class="col-lg-12">
							<h1 style="text-align:center;">A</h1>
						</div>
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-6">
									<div class="card">
										<div class="row">
											<div class="col-lg-12" >
												<div class="card" >
													<?php
														if($cageReceive=="on"){
															if(count($logDayA)!=0)
																echo "<div id=\"numActDayA\" style=\"height:350px;\"></div>" ;
															else
																echo "<h1 style=\"height:350px; margin:0;\">No Data to Show</h1>" ;
														}else {
															if(count($logDayB)!=0)
																echo "<div id=\"numActDayB\" style=\"height:350px;\"></div>" ;
															else
																 echo "<h1 style=\"height:350px; margin:0;\">No Data to Show</h1>" ;
														}	
													?>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="card">
													<?php
														if($cageReceive=="on"){
															if(count($logDayA)!=0)
																echo "<div id=\"percentageDA\" style=\"height:350px;\"></div>" ;
															else
																echo "<h1 style=\"height:350px; margin:0;\">No Data to Show</h1>" ;
														}else {
															if(count($logDayB)!=0)
																echo  "<div id=\"percentageDB\" style=\"height:350px;\"></div>" ;
															else
																echo "<h1 style=\"height:350px; margin:0;\">No Data to Show</h1>" ;
														}
													?>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="card">
													<?php
														if($cageReceive=="on"){
															if(count($logDayA)!=0)
																echo "<div id=\"chartMeanDA\" style=\"height:350px; \"></div>" ;
															else
																echo "<h1 style=\"height:350px; margin:0;\">No Data to Show</h1>" ;
														}else {
															if(count($logDayB)!=0)
																echo   "<div id=\"chartMeanDB\" style=\"height:350px; \"></div>" ;
															else
																echo "<h1 style=\"height:350px; margin:0;\">No Data to Show</h1>" ;
														}
													?>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="card">
													<?php
														if($cageReceive=="on"){
															if(count($logDayA)!=0)
																echo "<div id=\"sdLineDA\" style=\"height:350px; \"></div>" ;
															else
																echo "<h1 style=\"height:350px; margin:0;\">No Data to Show</h1>" ;
														}else {
															if(count($logDayB)!=0)
																echo "<div id=\"sdLineDB\" style=\"height:350px; \"></div>" ;
															else
																echo "<h1 style=\"height:350px; margin:0;\">No Data to Show</h1>" ;
														}
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="card">
										<div class="row">
											<div class="col-lg-12">
												<div class="card">
													<?php
														if($cageReceive=="on"){
															if(count($logNightA) != 0)
																echo "<div id=\"numActNightA\" style=\"height:350px;\"></div>" ;
															else
																echo "<h1 style=\"height:350px; margin:0;\">No Data to Show</h1>" ;
														}else {
															if(count($logNightB) != 0)
																echo "<div id=\"numActNightB\" style=\"height:350px;\"></div>" ;
															else
																echo "<h1 style=\"height:350px; margin:0;\">No Data to Show</h1>" ;
														}	
													?>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="card">
													<?php
														if($cageReceive=="on"){
															if(count($logNightA) != 0)
																echo "<div id=\"percentageNA\" style=\"height:350px;\"></div>" ;
															else
																echo "<h1 style=\"height:350px; margin:0;\">No Data to Show</h1>" ;
														}else {
															if(count($logNightB)!=0)
																echo  "<div id=\"percentageNB\" style=\"height:350px;\"></div>" ;
															else
																echo "<h1 style=\"height:350px; margin:0;\">No Data to Show</h1>" ;
														}	
													?>	
												</div>
											</div>
											<div class="col-lg-12">
												<div class="card">
													<?php
														if($cageReceive=="on"){
															if(count($logNightA)!=0)
																echo "<div id=\"chartMeanNA\" style=\"height:350px; \"></div>" ;
															else
																echo "<h1 style=\"height:350px; margin:0;\">No Data to Show</h1>" ;
														}else {
															if(count($logNightB)!=0)
																echo   "<div id=\"chartMeanNB\" style=\"height:350px; \"></div>" ;
															else
																echo "<h1 style=\"height:350px; margin:0;\">No Data to Show</h1>" ;
														}
													?>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="card">
													<?php
														if($cageReceive=="on"){
															if(count($logNightA)!=0)
																echo "<div id=\"sdLineNA\" style=\"height:350px; \"></div>" ;
															else
																echo "<h1 style=\"height:350px; margin:0;\">No Data to Show</h1>" ;
														}else {
															if(count($logNightB)!=0)
																echo "<div id=\"sdLineNB\" style=\"height:350px; \"></div>" ;
															else
																echo "<h1 style=\"height:350px; margin:0;\">No Data to Show</h1>" ;
														}
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">Page rendered in
		<strong>{elapsed_time}</strong> seconds.
		<?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
	</div>
	<?php 
	$this->load->view('layouts/body_layout_2');
	$this->load->view('scripts/daynight_script');
	$this->load->view('layouts/body_layout_3');
?>

