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
					<div class="car-body">
						<div class="row">
							<div class="col-lg-12 ">
								<div class="row">
									<div class="col-lg-6">
										<h1>report</h1>
									</div>
									<div class="col-lg-6">
										<form id="dateForm" method="POST" action="<?php echo base_url();?>report/get">
											<!-- <input id="mydate" name ="datepicker" type="text" /> -->
											<input type="date" class="input-sm float-right"  name ="datepicker" id="date"/>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-3">
									<h1>1</h1>
								</div>
								<div class="col-lg-3">
									<h1>2</h1>
								</div>
								<div class="col-lg-3">
									<h1>3</h1>
								</div>
								<div class="col-lg-3">
									<h1>4</h1>
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
								<div class="card text-white bg-secondary mb-3" style="max-width: 30rem; ">
									<div class="card-header">Header</div>
									<div class="card-body">
										<div id="reportRadar" style="height: 400px; width:100%;"></div>
									</div>
								</div>
							</div>
							<!-- whole system -->
							<div class="col-lg-12 ">
								<div class="card text-white bg-secondary mb-3" style="max-width: 30rem; ">
									<div class="card-header">whole</div>
									<div class="card-body">
										<table class="table">
											<thead>
												<tr>
													<th>#</th>
													<th>Mean</th>
													<th>Mediun</th>
													<th>Mode</th>
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
					<!-- column 2 -->
					<div class="col-lg-6">
						<div class="row">
							<!-- by cage -->
							<div class="col-lg-12">
								<div class="card text-white bg-secondary mb-3" style="max-width: 30rem; ">
									<div class="card-header">Cages</div>
									<div class="card-body">
										<table class="table">
											<thead>
												<tr>
													<th>#</th>
													<th>Mean</th>
													<th>Mediun</th>
													<th>Mode</th>
													<th>Percentage</th>
													<th>Amount</th>
												</tr>
											</thead>
										</table>
									</div>
								</div>
							</div>
							<!-- by system -->
							<div class="col-lg-12 ">
								<div class="card text-white bg-secondary mb-3" style="max-width: 30rem; ">
									<div class="card-header">Sensors</div>
									<div class="card-body">
										<table class="table">
											<thead>
												<tr>
													<th>#</th>
													<th>Mean</th>
													<th>Mediun</th>
													<th>Mode</th>
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

