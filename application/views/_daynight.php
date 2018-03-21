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
				<div class="card">
					<div class="card-header">
					<form id="dateForm" method="POST" action="<?php echo base_url();?>daynight">
						<input type="checkbox" id="checkbox" checked data-toggle="toggle" data-style="ios" onchange="change();">
						<span class="slider round"></span>
						<input type="date" id="date" name ="datepicker" class="input-sm float-right" onkeydown="return false" onchange="change();"  />
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
													<div id="numAct" style="height:350px;"></div>	
												</div>
											</div>
											<div class="col-lg-12">
												<div class="card">
													<div id="percentile" style="height:350px;"></div>	
												</div>
											</div>
											<div class="col-lg-12">
												<div class="card">
													<h1 style="text-align:center;">A</h1>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="card">
													<div id="sdLine" style="height:350px;	"></div>
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
													<div id="numAct" style="height:350px;"></div>	
												</div>
											</div>
											<div class="col-lg-12">
												<div class="card">
													<div id="percentile" style="height:350px;"></div>	
												</div>
											</div>
											<div class="col-lg-12">
												<div class="card">
													<h1 style="text-align:center;">A</h1>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="card">
													<div id="sdLine" style="height:350px;	"></div>
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

	<?php 
	$this->load->view('layouts/body_layout_2');
	$this->load->view('scripts/daynight_script');
?>

