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
	</style>

</head>

<body>
	<div class = "header"></div>
	<div id="container">
		<div class="row">
			<div class="col-lg-2">
				<h1>A</h1>
			</div>

			<div class="col-lg-10">
				<div class="col-lg-12">
					<div class = "col-lg-6">
						<h1>report</h1>
					</div>
					<div class = "col-lg-6">
						<h1>date picker</h1>
					</div>
					<div class = "col-lg-12">
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
				
				<div class="col-lg-12"></div>
			</div>


			<div class="footer">Page rendered in
				<strong>{elapsed_time}</strong> seconds.
				<?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
			</div>
		</div>
	</div>
</body>


</html>