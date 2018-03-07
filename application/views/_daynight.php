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
							<input type="checkbox" id="checkbox" name="cageselect" data-toggle="toggle" data-onstyle="success" data-offstyle="info" onchange="change();" 
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
														if($cageReceive=="on")
															echo "<div id=\"numActDayA\" style=\"height:350px;\"></div>" ;
														else 
															echo "<div id=\"numActDayB\" style=\"height:350px;\"></div>" ;
													?>
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
													<?php
														if($cageReceive=="on")
															echo "<div id=\"numActNightA\" style=\"height:350px;\"></div>" ;
														else 
															echo "<div id=\"numActNightB\" style=\"height:350px;\"></div>" ;
													?>
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

