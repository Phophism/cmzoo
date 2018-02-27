<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<style type="text/css">
	
	::selection {
		background-color: #E13300;
		color: white;
	}

	::-moz-selection {
		background-color: #E13300;
		color: white;
	}

	/* Optional: Makes the sample page fill the window. */

	html{
		height: 100%;
		margin: 0;
		padding: 0;
	}

	body {
		background-color: #fff;
		/* margin: 40px; */
		font: 13px/20px normal Helvetica, Arial, sans-serif;
        height : 100%;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	/* h1 {
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	} */

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	h1 {
        font-family: Consolas, Monaco, Courier New, Courier, monospace;
        color:#002166;
        font-size: 12px;
		/* margin-left: 15px; */
	}

	.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		/* padding: 0 10px 0 10px; */
		/* margin: 20px 0 0 0; */
		margin: 15px 20px 0 0;
		flex: 0;
	}

	#container {
		display: flex;
		flex-direction: column;
		height: 100%;
	}

	.header {
		flex: 1;
		color: #444;
		background-color: transparent;
		/* border-bottom: 1px solid #D0D0D0;
		margin-bottom: 15px; */
        flex: 1;
        background-color: #FF5733;
	}

    .card {
		flex: 10;
		margin-left: 300px;
		display: row;
		flex-direction: column;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
        background-color: #FFBD33;
	}

    #body {
		display: flex;
		flex: 1;
		flex-direction: row;
		margin: 0 15px;
	}

	#map {
		height: 100%;
		flex: 3;
	}

	

	#opt {
		flex: 2;
	}

	#manu {
		align-items: flex-end;
	}

	</style>


</head>

<body>
	<div id="container">
		<div class="header"></div>
		<div class="card">
			<div id='body'>
				<div class="row">
					<div class="col-lg-10">
						<h1>A</h1>
					</div>
					<div class="col-lg-6">
						<h1>B</h1>
					</div>
				</div>
				<!-- <div id="map"></div>
				<div id="opt"></div> -->
			</div>
			<div class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.
				<?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></div>
		</div>
	</div>
</body>

</html>