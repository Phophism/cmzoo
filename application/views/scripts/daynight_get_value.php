
<!-- separate sensor's value (DA) -->
<?php	
$countDay = array(0,0,0,0,0,0,0,0,0,0);
if(isset($logDayA)){
	foreach($logDayA as $val){
		if( $val['id'] == "1")
			$countDay[0]++;
		else if( $val['id'] == "2")
			$countDay[1]++;	
		else if( $val['id'] == "3")
			$countDay[2]++;	
		else if( $val['id'] == "4")
			$countDay[3]++;	
		else if( $val['id'] == "5")
			$countDay[4]++;	
		else
			$countDay[5]++;	
	}
}
?>

<!-- separate sensor's value (DB)-->
<?php	
if(isset($logDayB)){
	foreach($logDayB as $val){
		if( $val['id'] == "7")
			$countDay[6]++;	
		else if( $val['id'] == "8")
			$countDay[7]++;	
		else if( $val['id'] == "9")
			$countDay[8]++;		
		else
			$countDay[9]++;	
	}
}
?>


<!-- separate sensor's value (NA)-->
<?php	
$countNight = array(0,0,0,0,0,0,0,0,0,0);
if(isset($logNightA)){
	foreach($logNightA as $val){
		if( $val['id'] == "1")
			$countNight[0]++;
		else if( $val['id'] == "2")
			$countNight[1]++;	
		else if( $val['id'] == "3")
			$countNight[2]++;	
		else if( $val['id'] == "4")
			$countNight[3]++;	
		else if( $val['id'] == "5")
			$countNight[4]++;	
		else
			$countNight[5]++;	
	}
}
?>

<!-- separate sensor's value (NB)-->
<?php	
if(isset($logNightB)){
	foreach($logNightB as $val){
		if( $val['id'] == "7")
			$countNight[6]++;	
		else if( $val['id'] == "8")
			$countNight[7]++;	
		else if( $val['id'] == "9")
			$countNight[8]++;		
		else
			$countNight[9]++;	
	}
}
?>

<!-- set sensor's value Day-->
<div id="valD1" hidden><?php echo $countDay[0]; ?></div>
<div id="valD2" hidden><?php echo $countDay[1]; ?></div>
<div id="valD3" hidden><?php echo $countDay[2]; ?></div>
<div id="valD4" hidden><?php echo $countDay[3]; ?></div>
<div id="valD5" hidden><?php echo $countDay[4]; ?></div>
<div id="valD6" hidden><?php echo $countDay[5]; ?></div>
<div id="valD7" hidden><?php echo $countDay[6]; ?></div>
<div id="valD8" hidden><?php echo $countDay[7]; ?></div>
<div id="valD9" hidden><?php echo $countDay[8]; ?></div>
<div id="valD10" hidden><?php echo $countDay[9]; ?></div>

<!-- set sensor's value Night-->
<div id="valN1" hidden><?php echo $countNight[0]; ?></div>
<div id="valN2" hidden><?php echo $countNight[1]; ?></div>
<div id="valN3" hidden><?php echo $countNight[2]; ?></div>
<div id="valN4" hidden><?php echo $countNight[3]; ?></div>
<div id="valN5" hidden><?php echo $countNight[4]; ?></div>
<div id="valN6" hidden><?php echo $countNight[5]; ?></div>
<div id="valN7" hidden><?php echo $countNight[6]; ?></div>
<div id="valN8" hidden><?php echo $countNight[7]; ?></div>
<div id="valN9" hidden><?php echo $countNight[8]; ?></div>
<div id="valN10" hidden><?php echo $countNight[9]; ?></div>

<script>

// declare variable that contain value of each sensor
var valueD1 = document.getElementById('valD1').innerHTML;
var valueD2 = document.getElementById('valD2').innerHTML;
var valueD3 = document.getElementById('valD3').innerHTML;
var valueD4 = document.getElementById('valD4').innerHTML;
var valueD5 = document.getElementById('valD5').innerHTML;
var valueD6 = document.getElementById('valD6').innerHTML;
var valueD7 = document.getElementById('valD7').innerHTML;
var valueD8 = document.getElementById('valD8').innerHTML;
var valueD9 = document.getElementById('valD9').innerHTML;
var valueD10 = document.getElementById('valD10').innerHTML;
// window.alert(value1 + " " + value2 + " " + value3 + " " + value4 + " " + value5 + " " + value6);

// declare variable that contain value of each sensor
var valueN1 = document.getElementById('valN1').innerHTML;
var valueN2 = document.getElementById('valN2').innerHTML;
var valueN3 = document.getElementById('valN3').innerHTML;
var valueN4 = document.getElementById('valN4').innerHTML;
var valueN5 = document.getElementById('valN5').innerHTML;
var valueN6 = document.getElementById('valN6').innerHTML;
var valueN7 = document.getElementById('valN7').innerHTML;
var valueN8 = document.getElementById('valN8').innerHTML;
var valueN9 = document.getElementById('valN9').innerHTML;
var valueN10 = document.getElementById('valN10').innerHTML;

//window.alert(valueD1 + valueN1);

// create separate sensor in system to set of day and night to find maximum amount of activities  
var daySet = [valueD1,valueD2,valueD3,valueD4,valueD5,valueD6,valueD7,valueD8,valueD9,valueD10];
var nightSet = [valueN1,valueN2,valueN3,valueN4,valueN5,valueN6,valueN7,valueN8,valueN9,valueN10];
var maxDay = Math.max.apply(null,daySet);
var maxNight = Math.max.apply(null,nightSet);
var maxAll = Math.max.apply(maxDay,maxNight);
</script>