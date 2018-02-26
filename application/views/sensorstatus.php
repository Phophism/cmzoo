<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Animal Monitoring System</title>

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

	html,
	body {
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
		display: flex;
		flex: 1;
		flex-direction: row;
		margin: 30px;
	}

	h1 {
		margin-left: 15px;
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
		flex: 3;
	}

	.card {
		flex: 1;
		/* margin: 30px; */
		display: flex;
		flex-direction: column;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>


</head>
<body>
	
	<?php
	date_default_timezone_set("Asia/Bangkok");
	$cknow=date("d-m-Y H:i:s");

	function activity_time($time1,$time2){
		//$datetime1 = date_create('2009-10-11 23:50:00');Real time
		//$datetime2 = date_create('2009-10-12 0:25:00' );Original time
		
		$datetime1 = date_create($time1);
		$datetime2 = date_create($time2);
		$interval = date_diff($datetime1, $datetime2);

		$result=$interval->format('%ad, %Hh-%im-%ss');
		$daycheck=$interval->format('%a');
		$result2=$interval->format('%H');
		$result3=$interval->format('%i');
		$result4=$interval->format('%s');
		//echo $result." ";
		
	return $result;
	}
	function time_diff($time1,$time2){
		//$datetime1 = date_create('2009-10-11 23:50:00');Real time
		//$datetime2 = date_create('2009-10-12 0:25:00' );Original time
		
		$datetime1 = date_create($time1);
		$datetime2 = date_create($time2);
		$interval = date_diff($datetime1, $datetime2);

		$result=$interval->format('%d-%m-%Y %H:%i:%s');
		$daycheck=$interval->format('%a');
		$result2=$interval->format('%H');
		$result3=$interval->format('%i');
		$result4=$interval->format('%s');
		//echo $result." ";
		
	return $result4;
	}


	function ckstatus($timediff,$status,$nid){

	if ($status!=0) {
		if ($timediff>=15){
		
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_URL,'http://teng.thai2biz.net/cmzoo/dataupdate.php?sensor_ping=0&state=0&Node_ID='.$nid);		// + stage = 0 เปลี่ยน state  อัตโนมัติ
			curl_exec($ch);   
		}
	}
	}
	?>

<div id="container">
	<div class="card">
		
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<a class="navbar-brand" href="#">CMZoo</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01"
			aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarColor01">
				<ul class="navbar-nav ml-auto ">
					<li class="nav-item">
						<a class="nav-link" href="welcome_message.php">Map </a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="#">Status <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Pricing</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">About</a>
					</li>
				</ul>
			</div>
		</nav>

		<div id='body'>
			<div class="row">
				<div class="col-lg-2">
				</div>
				<div class="col-lg-8">
					<div class="panel panel-default">
						<div class="panel-heading">
							Monitoring Activity List
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
									<tr>
										<th>Node ID</th>
										<th>Status</th>
										<th>Start Activity Time</th>
										<th>Activity Runnig Time</th>
										<th>Note</th>


									</tr>
								</thead>
								<tbody>

									<?php
										date_default_timezone_set("Asia/Bangkok");
										error_reporting( error_reporting() & ~E_NOTICE );
													
										echo "Current time :  ". $cknow;    
										require "./models/connection.php";

										$sql2 = "SELECT * from device";
										$result2 = mysqli_query($conn, $sql2);
																
										if (mysqli_num_rows($result2) > 0) {
											while($row = mysqli_fetch_assoc($result2)) {
												$acc_time=activity_time($cknow,$row["activityTime"]);
												$timediff=time_diff($cknow,$row["date_time"]);
												echo "<tr><td style='width:10%'>".$row["nodeId"]."</td>"; if ($row["status"]==1) echo "<td bgcolor=#70D19F>"; 
										else if 
											($row["status"]==2) echo "<td bgcolor=#00e6e6></td>";
										else echo "<td bgcolor=#F77D7D></td>";
												echo "<td style='width:20%'>".$row["activityTime"]."</td><td>";
												echo $acc_time." ";
												echo "</td><td>";
												if ($row["status"]==1) echo "Active"; 
														else if ($row["status"]==2) echo "Activity Detected"; 
															else echo "Node Inactive";
												echo "</td></tr>";
												
												ckstatus($timediff,$row["status"],$row["nodeId"]);																	
											}
										}
									?>
								</tbody>
							</table>



						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.
			<?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></div>
	</div>
</div>

</body>
</html>