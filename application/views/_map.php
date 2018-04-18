<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('layouts/head', array('title' => "Visual Map"));
$this->load->view('layouts/body_layout_1');
$this->load->view('layouts/header');
$this->load->view('layouts/menu');
?>

	<!-- content -->
	<div class="col-lg-10">
		<div class="row">
		
			<!-- Map -->
			<div class="col-lg-8">
				<div class="card text-white bg-secondary mb-3"  style="max-width: ">
					<form id="dateForm" method="POST" action="<?php echo base_url();?>map">
						<div class="row">
							<!-- map side -->
							<div class="col-lg-12">
								<div class="row">
									<!--Map and slider-->
									<div class="col-lg-12" >
										<!--Map-->
										<div id="map">
											<div id="sensor" ></div>
										</div>
									</div>
									<div class="col-lg-12 container">
										<h3>Timepicker</h3>
										<p>Drag the slider to select a time.</p>

										<div class="slidecontainer">
											<input type="range" min="1" max="172680" value="1" class="slider" id="timepicker" name="timeSlider" onchange="change();">
											<p>Time : <span id="displayTime"></span></p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-12 ">
								<!--Status Details-->
								<div class="row">
									<!-- Each status detail -->
									<div class="col-lg-4">
										<h1>green</h1>
									</div>
									<div class="col-lg-4">
										<h1>red</h1>
									</div>
									<div class="col-lg-4">
										<h1>blue</h1>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="card text-white bg-secondary mb-3">
					<div class="row">
						<!-- option side -->
						<div class="col-lg-12">
							<!--Date Time-->
								<?php
									echo "<input type=\"date\" id=\"date\" name =\"datepicker\" class=\"input-sm float-left\" onkeydown=\"return false\" onchange=\"change();\" value=\"".$dateReceive."\"  max=\"".date('Y-m-d')."\" />" ;
									echo "<input type=\"date\" id=\"date\" name =\"datepickerOld\" class=\"input-sm float-left\" onkeydown=\"return false\"  value=\"".$dateReceive."\"  max=\"".date('Y-m-d')."\" hidden/>" ;
								?>
							
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
									<div class="card border-dark mb-3">
										<div class="card-header" style="color:black;">Description</div>
										<div class="card-body">
										
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

	<?php 
	$this->load->view('layouts/body_layout_2');
	$this->load->view('scripts/map_script');
	$this->load->view('layouts/body_layout_3');
	?>

