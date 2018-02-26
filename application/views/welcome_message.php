<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }


/* Optional: Makes the sample page fill the window. */
html, body {
  height: 100%;
  margin: 0;
  padding: 0;
}

	body {
		background-color: #fff;
		/* margin: 40px; */
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
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

	#body {
		display : flex;
		flex: 1;
		flex-direction: row;
		margin: 0 15px;
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
		flex: 0;
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		margin-bottom: 15px; 
	}
	#map {
		height: 100%;
		flex : 3;
	}
	.card {
		flex: 1;
		margin: 30px;
		display: flex;
		flex-direction: column;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	#opt{
		flex:2;
	}
	</style>

</head>
<body>

<div id="container">
	<div class="card">
		<div class="header">
			<h1><?=$name;?></h1>
		</div>
		<div id='body'>
			<div id="map"></div>
			<div id="opt"></div>
		</div>	
		<div class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></div>
	</div>
</div>



<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYq_A_0vrK4r5n2iOFH4SoEZ0s2FH2r3o&callback=initMap">
</script>  

<script>
	var map;
	function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: -34.397, lng: 150.644},
		zoom: 8
	});
	}
</script>

</body>
</html>