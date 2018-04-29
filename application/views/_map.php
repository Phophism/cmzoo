<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('layouts/head', array('title' => "Visual Map"));
$this->load->view('layouts/body_layout_1');
$this->load->view('layouts/menu');
?>
	<!-- content -->
	<div class="col-lg-12">
		<div class="widget-header" >
			<h2 id="header-map">Visual Map</h2>
		</div>
		<hr>
		<div class="row">
			<!-- Map -->
			<div class="col-lg-8">
				<div class="widget">
					<form id="dateForm" method="POST" action="<?php echo base_url();?>map">
						<div class="row">
							<!-- map side -->
							<div class="col-lg-12">
								<div class="row">
									<div class="widget">
										<!--Map and slider-->
										<div class="col-lg-12">
											<!--Map-->
											<div id="map">
												<div id="sensor"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="widget-content">
									<a>Current Time : </a>
									<?php echo date("M d, Y H:i:s"); ?>
									<h3>Timepicker</h3>
									<p>Drag the slider to select a time.</p>
									<p class = "float-right">Time :
											<span id="displayTime"></span>
										</p>
									<div class="slidecontainer">
										<input type="range" min="1" max="<?php echo $maxTime ;?>" value="<?php echo $value ;?>" class="slider" id="timepicker" name="timeSlider"
										onchange="change();">
									</div>
								</div>
							</div>
						</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="widget">
					<div class="row">
						<!-- option side -->
						<div class="col-lg-12">
							<!--Date Time-->
							<?php
									echo "<input type=\"date\" id=\"date\" name =\"datepicker\" class=\"form-control float-left\" onkeydown=\"return false\" onchange=\"change();\" value=\"".$dateReceive."\"  max=\"".date('Y-m-d')."\" />" ;
								?>
								<input type="text" id="previousDate" name="datepickerOld" value="<?php echo $dateReceive ;?>" hidden/>
						</div>
						<div class="col-lg-12">
							<div class="row">
								<!-- <div class="col-lg-12 ">
									<div class="row">
										<div class="col-lg-6">
											<form id="cageFormA" method="POST" action="<?php echo base_url();?>map">
												<button type="button" name="cageButtonA" class="btn btn-outline-success float-right" onclick="selectA();">A</button>
											</form>
										</div>
										<div class="col-lg-6">
											<form id="cageFormB" method="POST" action="<?php echo base_url();?>map">
												<button type="button" name="cageButtonB" class="btn btn-outline-info" onclick="selectA();">B</button>
											</form>
										</div>
									</div>
								</div> -->
								<div class="col-lg-12">
									<!--Description-->
									<div class="widget">
										<div class="widget-body" style="padding-top:5px; padding-bottom:15px; panding padding-rigth:10px; padding-left:10px;">
											<h4>
												<i class="fa fa-list-alt fw"></i>
												<span>&nbsp;
													<U>Status Activity&nbsp;</U>
												</span>
											</h4>
											<?php if(count($errors) == 0 && count($notes) == 0){?>
												<p> No activity detected.. </p>
											<?php }else { ?>
												<p> Activity Found!! :</p>
											<ul>
												<?php
													if(isset($errors)){												
														foreach($errors as $err){
															echo "<li class='errDes'>". $err ."</li>" ;
														}
													}
												?>

													<?php	
														if(isset($notes)){
															foreach($notes as $note){
															echo "<li class='detectDes'>". $note ."</li>" ;
															}
														}
													?>
											</ul>
											<?php 
													} 
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12 ">
							<!--Status Details-->
							<div class="row" style=" padding-top:5px; padding-bottom:15px;">
								<div class="col text-center">
									<span class="badge badge-pill badge-light" style=" height: 55px; width: 55px; line-height: 4;  background-color:#CC333366; color:#e9e9e2E6;">Inactive</span>
									<span class="badge badge-pill badge-info" style=" height: 55px; width: 55px; line-height: 4; margin-left:12px; margin-right:12px; background-color:#67ce6766;  color:#e9e9e2E6;">Active</span>
									<span class="badge badge-pill badge-info" style=" height: 55px; width: 55px; line-height: 4;   background-color:#0066CC66;  color:#e9e9e2E6;">Detect</span>
								</div>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>

	<?php 
	$this->load->view('layouts/body_layout_2');
	$this->load->view('scripts/map_script');
	$this->load->view('layouts/body_layout_3');
	?>

	<!-- 
					
					โละออก สร้าง function ใน Model ใหม่
				รับค่าราย col -> getDur() , getstart() , getend 
				
				-->
