<?php
defined('BASEPATH') OR exit('No direct script access allowed');
		$this->load->view('layouts/head', array('title' => "Sensor Status"));
		$this->load->view('layouts/body_layout_1');
		$this->load->view('layouts/menu');
?>

	<!--details-->
	<div class="col-lg-12">
		<div class="row">
			<!-- sensorstatus -->
			<div class="container">
				<div class="widget widget-table">
					<div class="widget-header">
						<h3>Sensor Status</h3>
					</div>
					<div class="widget-content">
						<div class="row-fluid">
							<div class="col-lg-12">
								<a>Current Time : </a>
								<?php echo date("M d, Y H:i:s"); ?>
								<table class="table" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<th class="text-center">Status</th>
											<th class="text-center">Start Activity Time</th>
											<th class="text-center">Activity Running Time</th>
											<th class="text-center">Note</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										foreach($sensors as $sensor){
									?>
										<tr>
											<td>
												<?php echo $sensor->nodeId; ?>
											</td>
											<td style="
												<?php 
													if($sensor->status==0){
														echo " background-color:#d9534f; ";
													}else if($sensor->status==1){
														echo "background-color:#5cb85c; ";
													}else{
														echo "background-color:#11B4C2; ";
													}
												?>
											border-radius: 7%;
											">
											</td>
											<td class="text-center">
												<?php echo $sensor->startTime; ?>
											</td>
											<td class="text-center">
												<?php echo $sensor->recentTime; ?>
											</td>
											<td class="text-center">
												<?php if($sensor->status==0){
												echo "Node Inactive";
											}else if($sensor->status==1){
												echo "Node Active";
											}else{
												echo "Detecting";
											}
											 ?>
											</td>
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
	$this->load->view('layouts/body_layout_3');
?>
