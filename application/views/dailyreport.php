<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<style>
		.header{
			height: 50px;
			background-color: Yellow ;
		}
		.border{
			margin : 30px;
			border-width: 10px;
		}
		body{
			background-color: #cdcdcd;
		}
	</style>

</head>

<body>
	<div class = "header"></div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2">
				<h1>A</h1>
			</div>

			<!--details-->
			<div class="col-lg-10 row">
				<!-- report -->
				<div class="col-lg-12 row">
					<div class = "col-lg-6">
						<h1>report</h1>
					</div>
					<div class = "col-lg-6">
						<h1>date picker</h1>
					</div>
					<div class = "col-lg-12 row">
						<div class = "col-lg-3">
							<h1>1</h1>
						</div>
						<div class = "col-lg-3">
							<h1>2</h1>
						</div>
						<div class = "col-lg-3">
							<h1>3</h1>
						</div>
						<div class = "col-lg-3">
							<h1>4</h1>
						</div>
					</div>
				</div>
				<!--average-->
				<div class="col-lg-12 row">
					<!-- column 1 -->
					<div class="col-lg-5 row-fluid ">
						<!-- radar chart -->
						<div class="col-lg-12 ">
							<h1>Radar Chart</h1>
						</div>
						<!-- whole system -->
						<div class="col-lg-12 " >
							<h1>whole system</h1>
						</div>
					</div>
					<!-- column 2 -->
					<div class="col-lg-5 row">
						<!-- by cage -->
						<div class="col-lg-12">
							<h1>by cage</h1>
						</div>
						<!-- by system -->
						<div class="col-lg-12 " style="background-color: transparent;">
							<div class="card text-white bg-secondary mb-3" style="max-width: 30rem; ">
								<div class="card-header">Header</div>
								<div class="card-body">
									<table class="table">
										<thead>
											<tr>
												<th>#</th>
												<th>First Name</th>
												<th>Last Name</th>
												<th>Username</th>
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
		
			<div class="container-fluid" >Page rendered in
				<strong>{elapsed_time}</strong> seconds.
				<?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
			</div>
		</div>
	</div>
</body>


</html>