<?php
defined('BASEPATH') OR exit('No direct script access allowed');
		$this->load->view('layouts/head', array('title' => "Sensor Status"));
		$this->load->view('layouts/body_layout_1');
		$this->load->view('layouts/header');
		$this->load->view('layouts/menu');
?>

	<!--details-->
	<div class="col-lg-10 row">
		<!-- sensorstatus -->
		<div class="container" style="padding-top:81px;">
			<div class="card text-white bg-secondary mb-3" style="max-width: 55rem; ">
				<div class="card-header">Sensor Status</div>
				<div class="card-body">
					<div class="row-fluid">
						<div class="col-lg-12">
							<a>Current Time : </a> <?php echo date("M d, Y H:i:s"); ?>
						</div>
						<div class="col-lg-12">
							<table class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Status</th>
										<th>Start Activity Time</th>
										<th>Activity Running Time</th>
										<th>Note</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										foreach($sensors as $sensor){
									?>
										<tr>
											<td><?php echo $sensor->nodeId; ?></td>
											<td><?php echo $sensor->status; ?></td>
											<td><?php echo $sensor->startTime; ?></td>
											<td><?php echo $sensor->recentTime; ?></td>
											<td><?php if($sensor->status==0){
												echo "Node Inactive";
											}else if($sensor->status==1){
												echo "Node Active";
											}else{
												echo "Detecting";
											}
											 ?></td>
										</tr>
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

<?php 
	$this->load->view('layouts/body_layout_2');
?>