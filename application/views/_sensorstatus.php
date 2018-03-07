<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
							<a>Current Time</a>
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
							</table>
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

