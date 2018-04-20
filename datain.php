<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<style type="text/css">
		body,
		td,
		th {
			font-family: Verdana, Geneva, sans-serif;
			font-size: small;
		}

	</style>
</head>

<body>
	Datain.php
<?php

date_default_timezone_set("Asia/Bangkok");
require "connection.php";
error_reporting( error_reporting() & ~E_NOTICE );
$cknow=date("Y-m-d H:i:s");
echo "data in test...";
if ($_GET["sensor_id"]!="") 
	{  /* $sql = "INSERT INTO sensordata (node_id, temp, sensor_id, lux, time) */
        $sql = "INSERT INTO cmzoo (sensor_id, light_intensity, temperatureC, temperatureF, humidity, duration, date_time)
      	VALUES ('".$_GET["sensor_id"]."', '".$_GET["light_intensity"]."','".$_GET["temperatureC"]."','".$_GET["temperatureF"]."','".$_GET["humidity"]."','".$_GET["duration"]."','".$cknow."')";
		echo $sql;
		if (mysqli_query($conn, $sql)) {
    		echo "New record created successfully";
		} else {
	    	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		// curl && file_get_contents ?temp=3&hum=2&poomy=20
		file_get_contents('http://teng.thai2biz.net/cmzoo2/application/controllers/Animal_log/add?nodeId'. $_GET["temperatureC"] .'&poomy=' . $_GET['light_intensity'], false, $context);
		file_get_contents('http://teng.thai2biz.net/sensorData/update', false, $context);
	}

?>


</body>
