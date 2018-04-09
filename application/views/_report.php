<?php
defined('BASEPATH') OR exit('No direct script access allowed');
		$this->load->view('layouts/head', array('title' => "Report"));
		$this->load->view('layouts/body_layout_1');
		$this->load->view('layouts/header');
		$this->load->view('layouts/menu');
?>

	<!--content-->
	<div class="col-lg-10 row">
		<div class="row">
			<!-- report -->
			<div class="col-lg-12">
				<div class="card text-white bg-secondary mb-3">
					<div class="card-header">
						<div class="row">
							<div class="col-lg-12 ">
								<div class="row">
									<div class="col-lg-6">
										<h1>report</h1>
									</div>
									<div class="col-lg-6">
										<form id="dateForm" method="POST" action="<?php echo base_url();?>report">
											<!-- <input id="mydate" name ="datepicker" type="text" /> -->
											<?php
												echo "<input type=\"date\" id=\"date\" name =\"datepicker\" class=\"input-sm float-right\" onkeydown=\"return false\" onchange=\"change();\" value=\"".$datepicker."\"  max=\"".date('Y-m-d')."\" />" ;
											?>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-3">
									<!-- <div id="lineAmount" style="vertical-align: middle; display: inline-block; width: 100px; height: 30px;"></div> -->
									<h1>Total Amount : <?php echo $amounts['amountAll'];?> </h1>  
								</div>
								<div class="col-lg-3">
									<!-- <div id="lineTemp" style="vertical-align: middle; display: inline-block; width: 100px; height: 30px;"></div> -->
									<h1>temperature(&#8451) : <?php ?> </h1>
								</div>
								<div class="col-lg-3">
									<!-- <div id="lineLight" style="vertical-align: middle; display: inline-block; width: 100px; height: 30px;"></div> -->
								</div>
								<div class="col-lg-3">
									<!-- <div id="lineHumid" style="vertical-align: middle; display: inline-block; width: 100px; height: 30px;"></div> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--average-->
			<div class="col-lg-12 ">
				<div class="row">
					<!-- column 1 -->
					<div class="col-lg-6">
						<div class="row">
							<!-- radar chart -->
							<div class="col-lg-12 ">
								<div class="card text-white bg-secondary mb-3" style="max-width: 50rem; ">
									<div class="card-header">Total Amount</div>
									<div class="card-body">
										<div class = "row">
											<?php 
												if(is_null($mostNodes['mostNode'])){
													echo	"<div id=\"reportRadar1\" style=\"height: 500px; width:100%;\"></div>";
												}else{
													if($nodecount[$mostNodes['mostNode']-1] >=50)
														echo	"<div id=\"reportRadar1\" style=\"height: 400px; width:100%;\"></div>";
													else if($nodecount[$mostNodes['mostNode']-1] >=10 && $nodecount[$mostNodes['mostNode']-1] <50)
														echo	"<div id=\"reportRadar2\" style=\"height: 400px; width:100%;\"></div>";
													else 
														echo	"<div id=\"reportRadar3\" style=\"height: 400px; width:100%;\"></div>";
												}
											?>
										</div>
										<div class = "row" style=" padding-top:5px; padding-bottom:15px;">
											<div class="col text-center">
												<span class="badge badge-pill badge-light" style=" height: 55px; line-height: 4; margin-right:12.5px; background-color:#CC33334D; color:#e9e9e2E6;"  >Cage B</span>
												<span class="badge badge-pill badge-info" style=" height: 55px; line-height: 4; margin-left:12.5px; background-color:#0066CC4D;  color:#e9e9e2E6;"  >Cage A</span>
												
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- whole system -->
							<div class="col-lg-12 ">
								<div class="card text-white bg-secondary mb-3" style="max-width: 50rem; ">
									<div class="card-header">Cages</div>
									<div class="card-body">
										<table class="table">
											<thead>
												<tr>
													<th>#</th>
													<th>Mean</th>
													<th>M.A.P</th>
													<th>M.A.N</th>
													<th>Percentage</th>
													<th>Amount</th>
												</tr>
											</thead>
											<tbody>
												<?php if(count($day)!=0){?>
													<tr>
														<td>A</td>
														<td><?php echo $means['meanA'] ; ?></td>
														<td><?php echo $periods['mostPeriodA'] ; ?></td>
														<td><?php echo $mostNodes['mostNodeA'] ; ?></td>
														<td><?php echo $percentages['percentageA']; ?></td>
														<td><?php echo $amounts['amountA'] ; ?></td>
													</tr>
													<tr>
														<td>B</td>
														<td><?php echo $means['meanB'] ; ?></td>
														<td><?php echo $periods['mostPeriodB'] ; ?></td>
														<td><?php echo $mostNodes['mostNodeB'] ; ?></td>
														<td><?php echo $percentages['percentageB']; ?></td>
														<td><?php echo $amounts['amountB'] ; ?></td>
													</tr>

												<?php
												}
												else{
												?>
													<td class="text-center" colspan="6"><p>NO DATA TO SHOW</p></td>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>

							</div>
						</div>
					</div>
					<!-- column 2 -->
					<div class="col-lg-6">
						<div class="row">
							<!-- by cage -->
							<div class="col-lg-12">
								<div class="card text-white bg-secondary mb-3" style="max-width: 50rem; ">
									<div class="card-header">Sensors</div>
									<div class="card-body">
										<table class="table">
											<thead>
												<tr>
													<th>#</th>
													<th>Mean</th>
													<th>M.A.P</th>
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
														<td><?php echo $counter+1 ;?></td>
														<td><?php echo $means['meanNode'][$counter] ;?></td>
														<td><?php echo $periods['mostPeriodNode'][$counter] ;?></td>
														<td><?php echo $percentages['percentageNode'][$counter] ;?></td>
														<td><?php echo $amounts['amountNode'][$counter] ;?></td>
													</tr>
													<?php 
														$counter++;
													}
													?>
												<?php
												}
												else{
												?>
													<td class="text-center" colspan="5"><p>NO DATA TO SHOW</p></td>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>

							</div>
							<!-- by system -->
							<div class="col-lg-12 ">
								<div class="card text-white bg-secondary mb-3" style="max-width: 50rem; ">
									<div class="card-header">whole</div>
									<div class="card-body">
										<table class="table">
											<thead>
												<tr>
													<th>Mean</th>
													<th>M.A.P</th>
													<th>M.A.N</th>
													<th>Amount</th>
												</tr>
											</thead>
											<tbody>
												<?php if(count($day)!=0 ){?>
													<tr>
														<td><?php echo $means['meanWhole'] ;?> </td>
														<td><?php echo $periods['mostPeriod'] ?> </td>
														<td><?php echo $mostNodes['mostNode'] ?> </td>
														<td><?php echo $amounts['amountAll'] ?> </td>
													</tr>
												<?php
												}
												else{
												?>
													<td class="text-center" colspan="6"><p>NO DATA TO SHOW</p></td>
												<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
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
?>

