<?php
defined('BASEPATH') OR exit('No direct script access allowed');
		$this->load->view('layouts/head', array('title' => "Day Night Status",'test'=>"Test"));
		$this->load->view('layouts/body_layout_1');
		$this->load->view('layouts/menu');
?>

	<div class="col-lg-12">
		<div class="row">
			<!--Group 1-->
			<div class="col-lg-12">
				<div class="widget">
					<div class="widget-header" style="height:50px; padding-top: 7px;">
						<form id="dateForm" method="POST" action="<?php echo base_url();?>daynight">
							<div class="col-lg-3">
								<input type="checkbox" id="checkbox" name="cageselect" data-toggle="toggle" style="min-height:32px;" data-onstyle="success"
								data-offstyle="info" data-on="Cage A" data-off="Cage B" onchange="change();" <?php if(!isset($cageReceive)) echo
								" " ; else echo " checked"; ?> />
							</div>
							<div class="col-lg-6">
								<h2 id="header-daynigth">Day &#38; Night Activity Report</h2>
							</div>
							<div class="col-lg-3">
								<?php
								if(isset($dateReceive))
									echo "<input type=\"date\" id=\"date\" name =\"datepicker\" class=\"form-control pull-right\" onkeydown=\"return false\" onchange=\"change();\" value=\"".$dateReceive."\"  max=\"".date('Y-m-d')."\" />" ;
								else
									echo "<input type=\"date\" id=\"date\" name =\"datepicker\" class=\"form-control pull-right\" onkeydown=\"return false\" onchange=\"change();\" value=\"".date('Y-m-d')."\"  max=\"".date('Y-m-d')."\" />" ;				
							?>
							</div>

						</form>
					</div>
				</div>
			</div>
			<hr>

			<!--Group 2-->
			<div class="col-lg-12" style="margin-top:12px;">
				<div class="widget">
					<div class="row">
						<div class="col-lg-5">
							<p id="show-zone" style="text-align:right; font-size:30px; margin-top : 28px;">Day</p>
						</div>
						<div class="col-lg-2" style="margin-top: 15px;">
							<div id="daynight"></div>
						</div>
						<div class="col-lg-5">
							<p id="show-zone" style="text-align:left; font-size:30px;  margin-top : 28px;">Night</p>
						</div>
						<!-- number of act -->
						<div class="col-lg-12">
							<hr/>
							<div class="widget">
								<p id="show-zone" style="text-align:center; font-size:30px;">Number of Activity</p>
								<p id="show-zone" style="text-align:center; margin-top:5px; font-size:12px;">Number of an activiy that has been detected</p>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="widget">
										<div class="row">
											<div class="col-lg-12">
												<div class="widget">
													<?php
														if($cageReceive=="on"){
															if(count($logDayA)!=0)
																echo "<div id=\"numActDayA\" style=\"height:350px;\"></div>" ;
															else
																echo "<p class='noContent' >No Content Found</p>" ;
														}else {
															if(count($logDayB)!=0)
																echo "<div id=\"numActDayB\" style=\"height:350px;\"></div>" ;
															else
																 echo "<p class='noContent'>No Content Found</p>" ;
														}	
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="widget">
										<div class="row">
											<div class="col-lg-12">
												<div class="widget">
													<?php
														if($cageReceive=="on"){
															if(count($logNightA) != 0)
																echo "<div id=\"numActNightA\" style=\"height:350px;\"></div>" ;
															else
																echo "<p class='noContent'>No Content Found</p>" ;
														}else {
															if(count($logNightB) != 0)
																echo "<div id=\"numActNightB\" style=\"height:350px;\"></div>" ;
															else
																echo "<p class='noContent'>No Content Found</p>" ;
														}	
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Percentage -->
						<div class="col-lg-12">
							<div class="widget">
								<p id="show-zone" style="text-align:center; font-size:30px;">Percentage</p>
								<p id="show-zone" style="text-align:center; margin-top:5px; font-size:12px;">Ratio of an activity in each sensor</p>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="widget">
										<div class="row">
											<div class="col-lg-12">
												<div class="widget">
													<?php
														if($cageReceive=="on"){
															if(count($logDayA)!=0)
																echo "<div id=\"percentageDA\" style=\"height:350px;\"></div>" ;
															else
																echo "<p class='noContent'>No Content Found</p>" ;
														}else {
															if(count($logDayB)!=0)
																echo  "<div id=\"percentageDB\" style=\"height:350px;\"></div>" ;
															else
																echo "<p class='noContent'>No Content Found</p>" ;
														}
													?>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="widget">
										<div class="row">
											<div class="col-lg-12">
												<div class="widget">
													<?php
														if($cageReceive=="on"){
															if(count($logNightA) != 0)
																echo "<div id=\"percentageNA\" style=\"height:350px;\"></div>" ;
															else
																echo "<p class='noContent'>No Content Found</p>" ;
														}else {
															if(count($logNightB)!=0)
																echo  "<div id=\"percentageNB\" style=\"height:350px;\"></div>" ;
															else
																echo "<p class='noContent'>No Content Found</p>" ;
														}	
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Mean -->
						<div class="col-lg-12">
							<div class="widget">
								<p id="show-zone" style="text-align:center; font-size:30px;">Mean</p>
								<p id="show-zone" style="text-align:center; margin-top:5px; font-size:12px;">Average of number of activity per day in last 30 days<br/>A color area is represent a maximum of activity in last 30 says<br/>( x-axis = sensor , y-axis = amount )</p>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="widget">
										<div class="row">
											<div class="col-lg-12">
												<div class="widget">
													<?php
														if($cageReceive=="on"){
															if(count($logDayA)!=0)
																echo "<div id=\"chartMeanDA\" style=\"height:350px; \"></div>" ;
															else
																echo "<p class='noContent'>No Content Found</p>" ;
														}else {
															if(count($logDayB)!=0)
																echo   "<div id=\"chartMeanDB\" style=\"height:350px; \"></div>" ;
															else
																echo "<p class='noContent'>No Content Found</p>" ;
														}
													?>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="widget">
										<div class="row">
											<div class="col-lg-12">
												<div class="widget">
													<?php
														if($cageReceive=="on"){
															if(count($logNightA)!=0)
																echo "<div id=\"chartMeanNA\" style=\"height:350px; \"></div>" ;
															else
																echo "<p class='noContent'>No Content Found</p>" ;
														}else {
															if(count($logNightB)!=0)
																echo   "<div id=\"chartMeanNB\" style=\"height:350px; \"></div>" ;
															else
																echo "<p class='noContent'>No Content Found</p>" ;
														}
													?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- SD -->
						<div class="col-lg-12">
							<div class="widget">
								<p id="show-zone" style="text-align:center; font-size:30px;">Standard deviation</p>
								<p id="show-zone" style="text-align:center; margin-top:5px; font-size:12px;">Activity's sample standard deviation of each sensor in last 30 days<br/>( x-axis = sensor , y-axis = amount )</p>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="widget">
										<div class="row">
											<div class="col-lg-12">
												<div class="widget">
													<?php
														if($cageReceive=="on"){
															if(count($logDayA)!=0)
																echo "<div id=\"sdLineDA\" style=\"height:350px; \"></div>" ;
															else
																echo "<p class='noContent'>No Content Found</p>" ;
														}else {
															if(count($logDayB)!=0)
																echo "<div id=\"sdLineDB\" style=\"height:350px; \"></div>" ;
															else{
																echo "<p class='noContent'>No Content Found</p>" ;
															}
														}
													?>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="widget">
										<div class="row">
											<div class="col-lg-12">
												<div class="widget">
													<?php
														if($cageReceive=="on"){
															if(count($logNightA)!=0)
																echo "<div id=\"sdLineNA\" style=\"height:350px; \"></div>" ;
															else
																echo "<p class='noContent'>No Content Found</p>" ;
														}else {
															if(count($logNightB)!=0)
																echo "<div id=\"sdLineNB\" style=\"height:350px; \"></div>" ;
															else
																echo "<p class='noContent'>No Content Found</p>" ;
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
	<!-- <div class="container-fluid">Page rendered in
		<strong>{elapsed_time}</strong> seconds.
		<?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
	</div> -->
	<?php 
	$this->load->view('layouts/body_layout_2');
	$this->load->view('scripts/daynight_script');
	$this->load->view('layouts/body_layout_3');
?>
