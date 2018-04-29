<?php
defined('BASEPATH') OR exit('No direct script access allowed');
		$this->load->view('layouts/head', array('title' => "Report"));
		$this->load->view('layouts/body_layout_1');
		$this->load->view('layouts/menu');
?>

	<!--content-->
	<div class="col-lg-12">
		<div class="row">
			<!-- report -->
			<div class="col-lg-12">
				<div class="">
					<div class="">
						<div class="row">
							<div class="col-lg-12 ">
								<div class="row">
									<div class="col-lg-4">
										<h2 id="header-report">Daily Report</h2>
									</div>
									<div class="col-lg-4">
									</div>
									<div class="col-lg-3">
										<form id="dateForm" method="POST" action="<?php echo base_url();?>report">
											<!-- <input id="mydate" name ="datepicker" type="text" /> -->
											<?php
												echo "<input type=\"date\" id=\"date\" name =\"datepicker\" class=\"form-control pull-right\" onkeydown=\"return false\" onchange=\"change();\" value=\"".$dateReceive."\"  max=\"".date('Y-m-d')."\" />" ;
											?>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="widget-content">
					<div class="col-lg-12">
							<hr>
							<div class="col-lg-3">
								<!-- <div id="lineAmount" style="vertical-align: middle; display: inline-block; width: 100px; height: 30px;"></div> -->
								<h3 class="text-center">
									<?php echo "<b>Total Activity</b><br><br>".$amounts['amountAll'] ; ?>
								</h3>
							</div>
							<div class="col-lg-3">
								<!-- <div id="lineTemp" style="vertical-align: middle; display: inline-block; width: 100px; height: 30px;"></div> -->
								<h3 class="text-center">
									<?php echo "<b>Average Temperature (&#8451)</b> <br><br>".$weather['tmp'] ;?> </h3>
							</div>
							<div class="col-lg-3">
								<!-- <div id="lineLight" style="vertical-align: middle; display: inline-block; width: 100px; height: 30px;"></div> -->
								<h3 class="text-center">
									<?php echo "<b>Max/Min Temperature (&#8451)</b> <br><br>".$weather['maxTmp']." / ".$weather['minTmp'] ; ?> </h3>
							</div>
							<div class="col-lg-3">
								<!-- <div id="lineHumid" style="vertical-align: middle; display: inline-block; width: 100px; height: 30px;"></div> -->
								<h3 class="text-center">
									<?php echo"<b>Average Humidity</b> <br><br>". $weather['humid']." %" ;?>
								</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--average-->
			<div class="col-lg-12 ">
				<div class="row">
					<br>
					<!-- column 1 -->
					<div class="col-lg-6">
						<div class="row">
							<!-- radar chart -->
							<div class="col-lg-12 ">
								<div class="widget">
									<div class="widget-header">
										<h3>Total Amount</h3>
									</div>
									<div class="widget-content">
										<div class="row">
											<?php 
												if(is_null($mostNodes['mostNode'])){
													echo	"<div id=\"reportRadar1\" style=\"height: 500px; width:100%;\"></div>";
												}else{
													if($nodecount[$mostNodes['mostNode']-1] >=50)
														echo	"<div id=\"reportRadar1\" style=\"height: 400px; width:100%;\"></div>";
													else if($nodecount[$mostNodes['mostNode']-1] >=10 && $nodecount[$mostNodes['mostNode']-1] <50)
														echo	"<div id=\"reportRadar2\" style=\"height: 400px; width:100%;\"></div>";
													else if($nodecount[$mostNodes['mostNode']-1] >=5 && $nodecount[$mostNodes['mostNode']-1] <10)
														echo	"<div id=\"reportRadar3\" style=\"height: 400px; width:100%;\"></div>";
													else
														echo	"<div id=\"reportRadar4\" style=\"height: 400px; width:100%;\"></div>";	
												}
											?>
										</div>
										<div class="row" style=" padding-top:5px; padding-bottom:15px;">
											<div class="col text-center">
												<span class="badge badge-pill badge-light" style=" height: 55px; line-height: 4; margin-right:12.5px; background-color:#CC33334D; color:#e9e9e2E6;">Cage B</span>
												<span class="badge badge-pill badge-info" style=" height: 55px; line-height: 4; margin-left:12.5px; background-color:#0066CC4D;  color:#e9e9e2E6;">Cage A</span>

											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- by cage (if exist) -->
							<?php if(count($day) != 0) {?>
							<div class="col-lg-12 ">
								<div class="widget widget-table">
									<div class="widget-header">
										<h3>Cages</h3>
									</div>
									<div class="widget-content">
										<table class="table" >
											<thead>
												<tr>
													<th>#</th>
													<th>Mean (hr)</th>
													<th>Most Active Period</th>
													<th>Most Active Sensor</th>
													<th>Percentage</th>
													<th>Amount</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>A</td>
													<td>
														<?php echo $means['meanA'] ; ?>
													</td>
													<td>
														<?php echo $periods['mostPeriodA'] ; ?>
													</td>
													<td>
														<?php echo $mostNodes['mostNodeA'] ; ?>
													</td>
													<td>
														<?php echo $percentages['percentageA']; ?>
													</td>
													<td>
														<?php echo $amounts['amountA'] ; ?>
													</td>
												</tr>
												<tr>
													<td>B</td>
													<td>
														<?php echo $means['meanB'] ; ?>
													</td>
													<td>
														<?php echo $periods['mostPeriodB'] ; ?>
													</td>
													<td>
														<?php echo $mostNodes['mostNodeB'] ; ?>
													</td>
													<td>
														<?php echo $percentages['percentageB']; ?>
													</td>
													<td>
														<?php echo $amounts['amountB'] ; ?>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<?php
							}
							?>
						</div>
					</div>
					<!-- column 2 -->
					<div class="col-lg-6">
						<div class="row">
							<!-- by sensor -->
							<div class="col-lg-12">
								<div class="widget widget-table">
									<div class="widget-header">
										<h3>Sensors</h3>
									</div>
									<div class="widget-content">
										<table class="table">
											<thead>
												<tr>
													<th>#</th>
													<th>Mean (hr)</th>
													<th>Most Active Period</th>
													<th>Percentage</th>
													<th>Amount</th>
												</tr>
											</thead>
											<tbody>
												<?php if(count($day)!=0){?>
												<?php
														$counter = 0 ;
														while($counter<10){
													?>
													<tr>
														<td>
															<?php echo $counter+1 ;?>
														</td>
														<td>
															<?php echo $means['meanNode'][$counter] ;?>
														</td>
														<td>
															<?php echo $periods['mostPeriodNode'][$counter] ;?>
														</td>
														<td>
															<?php echo $percentages['percentageNode'][$counter] ;?>
														</td>
														<td>
															<?php echo $amounts['amountNode'][$counter] ;?>
														</td>
													</tr>
													<?php 
														$counter++;
													}
													?>
													<?php
												}
												else{
												?>
													<td class="text-center" colspan="5">
														<p>NO DATA TO SHOW</p>
													</td>
													<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>

							</div>
							<!-- whole system -->
							<div class="col-lg-12 ">
								<div class="widget widget-table">
									<div class="widget-header">
										<h3>Whole</h3>
									</div>
									<div class="widget-content">
										<table class="table">
											<thead>
												<tr>
													<th>Mean (hr)</th>
													<th>Most Active Period</th>
													<th>Most Active Sensor</th>
													<th>Amount</th>
												</tr>
											</thead>
											<tbody>
												<?php if(count($day)!=0 ){?>
												<tr>
													<td>
														<?php echo $means['meanWhole'] ;?> </td>
													<td>
														<?php echo $periods['mostPeriod'] ?> </td>
													<td>
														<?php echo $mostNodes['mostNode'] ?> </td>
													<td>
														<?php echo $amounts['amountAll'] ?> </td>
												</tr>
												<?php
												}
												else{
												?>
												<td class="text-center" colspan="6">
													<p>NO DATA TO SHOW</p>
												</td>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>

							<?php if(count($day)==0){?>
							<div class="col-lg-12 ">
								<div class="widget widget-table">
									<div class="widget-header">
										<h3>Cages</h3>
									</div>
									<div class="widget-content">
										<table class="table">
											<thead>
												<tr>
													<th>#</th>
													<th>Mean (hr)</th>
													<th>Most Active Period</th>
													<th>Most Active Sensor</th>
													<th>Percentage</th>
													<th>Amount</th>
												</tr>
											</thead>
											<tbody>
												<?php if(count($day)!=0){?>
												<tr>
													<td>A</td>
													<td>
														<?php echo $means['meanA'] ; ?>
													</td>
													<td>
														<?php echo $periods['mostPeriodA'] ; ?>
													</td>
													<td>
														<?php echo $mostNodes['mostNodeA'] ; ?>
													</td>
													<td>
														<?php echo $percentages['percentageA']; ?>
													</td>
													<td>
														<?php echo $amounts['amountA'] ; ?>
													</td>
												</tr>
												<tr>
													<td>B</td>
													<td>
														<?php echo $means['meanB'] ; ?>
													</td>
													<td>
														<?php echo $periods['mostPeriodB'] ; ?>
													</td>
													<td>
														<?php echo $mostNodes['mostNodeB'] ; ?>
													</td>
													<td>
														<?php echo $percentages['percentageB']; ?>
													</td>
													<td>
														<?php echo $amounts['amountB'] ; ?>
													</td>
												</tr>

												<?php
													}
													else{
													?>
												<td class="text-center" colspan="6">
													<p>NO DATA TO SHOW</p>
												</td>
												<?php
													}
													?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- <hr />
				<footer>
					<div class="container-fluid">
						<p>&copy; @DateTime.Now.Year - Logical Supporting Logistic System</p>
					</div>
				</footer> -->

	<div class="container-fluid">Page rendered in
		<strong>{elapsed_time}</strong> seconds.
		<?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
	</div>

	<?php 
	$this->load->view('layouts/body_layout_2');
	$this->load->view('scripts/report_script');
	$this->load->view('layouts/body_layout_3');
?>
