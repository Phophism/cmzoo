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
					<div class="car-header">
						<div class="row">
							<div class="col-lg-12 ">
								<div class="row">
									<div class="col-lg-6">
										<h1>report</h1>
									</div>
									<div class="col-lg-6">
										<form id="dateForm" method="POST" action="<?php echo base_url();?>report">
											<!-- <input id="mydate" name ="datepicker" type="text" /> -->
											<input type="date" id="date" name ="datepicker" class="input-sm float-right" onkeydown="return false" onchange="change();"  />
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
									<div id="lineAmount" style="vertical-align: middle; display: inline-block; width: 100px; height: 30px;"></div>
								</div>
								<div class="col-lg-3">
									<div id="lineTemp" style="vertical-align: middle; display: inline-block; width: 100px; height: 30px;"></div>
								</div>
								<div class="col-lg-3">
									<div id="lineLight" style="vertical-align: middle; display: inline-block; width: 100px; height: 30px;"></div>
								</div>
								<div class="col-lg-3">
									<div id="lineHumid" style="vertical-align: middle; display: inline-block; width: 100px; height: 30px;"></div>
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
					<div class="col-lg-6" >
						<div class="row">
							<!-- radar chart -->
							<div class="col-lg-12 " >
								<div class="card text-white bg-secondary mb-3" style="max-width: 50rem; ">
									<div class="card-header">Total Amount</div>
									<div class="card-body">
										<div id="reportRadar" style="height: 400px; width:100%;"></div>
									</div>
								</div>
							</div>
							<!-- whole system -->
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
												<tr>
													<td> <?php echo $dataSet['meanWhole'] ;?> </td>
													<td> <?php echo $dataSet['mostPeriod'] ?> </td>
													<td> <?php echo $dataSet['mostNode'] ?> </td>
													<td> <?php echo $dataSet['amountAll'] ?> </td>
												</tr>
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
												<tr>
													<td>A</td>
													<td><?php echo $dataSet['meanA'] ; ?></td>
													<td><?php echo $dataSet['mostPeriodA'] ; ?></td>
													<td><?php echo $dataSet['mostNodeA'] ; ?></td>
													<td><?php echo $dataSet['percentageA']." %" ; ?></td>
													<td><?php echo $dataSet['amountA'] ; ?></td>
												</tr>
												<tr>
													<td>B</td>
													<td><?php echo $dataSet['meanB'] ; ?></td>
													<td><?php echo $dataSet['mostPeriodB'] ; ?></td>
													<td><?php echo $dataSet['mostNodeB'] ; ?></td>
													<td><?php echo $dataSet['percentageB']." %"; ?></td>
													<td><?php echo $dataSet['amountB'] ; ?></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- by system -->
							<div class="col-lg-12 ">
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

