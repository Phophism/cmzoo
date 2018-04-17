<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!--Responsive meta tag-->
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<!-- bootstrap 2.3.2 toggle -->
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sb-admin-2.css">
	
	<!-- slider -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>node_modules/bootstrap-slider/dist/css/bootstrap-slider.css" />

	<!-- amchart -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/amchart/amcharts/plugins/export/export.css" type="text/css" media="all" />

	

	<!-- chartjs -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


	
	<style>
		.header{
			height: 50px;
			background-color: #39393aA6 ;
		}
		.border{
			margin : 30px;
			border-width: 10px;
		}
		body{
			background-color: #455E66;
		}

		.map{
			border-width:1px;
			border-style:solid;
			border-color:black;
			height:50px;
			width:50px;
			margin: 20px;
		}
		/* side bar */
		.side-nav {
			list-style-type: none;
    		display: flex;
    		flex-direction: column;
    		height: 100vh;
    		padding: 0;
		}

		.side-nav-link-panel {
			cursor: pointer;
			padding: 20px;
    		text-align: center;
		}

		.side-nav-link-panel:hover {
			background-color: rgba(255,255,255, 0.3);
			color: #cecece;
		}

		.side-nav-link {
			color: #cecece;
			font-size: 16px;
			font-size: 18px;
   			font-weight: bold;
		}

		a{
			text-decoration : none!important;
		}

		a:hover {
			text-decoration : none;
			color : rgba(255,255,255,0.6);
		}

		span{
			color : rgba(255,255,255,0.6);
		}

		#map{
			background-image : url("assets/img/Map.jpg");   
			background-size : cover;
			background-repeat : no-repeat;
			height : 650px;
			width : 100%;"
			margin:0px;

		}

		/* slider */
		.slidecontainer {
			width: 100%;
		}

		.slider {
			-webkit-appearance: none;
			width: 100%;
			height: 25px;
			background: #d3d3d3;
			outline: none;
			opacity: 0.7;
			-webkit-transition: .2s;
			transition: opacity .2s;
		}

		.slider:hover {
			opacity: 1;
		}

		.slider::-webkit-slider-thumb {
			-webkit-appearance: none;
			appearance: none;
			width: 25px;
			height: 25px;
			background: #4CAF50;
			cursor: pointer;
		}

		.slider::-moz-range-thumb {
			width: 25px;
			height: 25px;
			background: #4CAF50;
			cursor: pointer;
		}
		
	</style>

<!--Mean chart Day-Night-->
	<style>
		#chartdiv {
		width: 96%;
		height: 475px;
		margin-left: auto;
		margin-right: auto;
		margin-top: 15px;
		}

		.amcharts-graph-g1 .amcharts-graph-fill {
		filter: url(#blur);
		}

		.amcharts-graph-g2 .amcharts-graph-fill {
		filter: url(#blur);
		}

		.amcharts-cursor-fill {
		filter: url(#shadow);
		}
	</style>

	

</head>
