
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


<!-- mean / max / min -->
<div id="meanD1" hidden><?php echo $meanD[0];?></div>
<div id="meanD2" hidden><?php echo $meanD[1];?></div>
<div id="meanD3" hidden><?php echo $meanD[2];?></div>
<div id="meanD4" hidden><?php echo $meanD[3];?></div>
<div id="meanD5" hidden><?php echo $meanD[4];?></div>
<div id="meanD6" hidden><?php echo $meanD[5];?></div>
<div id="meanD7" hidden><?php echo $meanD[6];?></div>
<div id="meanD8" hidden><?php echo $meanD[7];?></div>
<div id="meanD9" hidden><?php echo $meanD[8];?></div>
<div id="meanD10" hidden><?php echo $meanD[9];?></div>

<div id="meanN1" hidden><?php echo $meanN[0];?></div>
<div id="meanN2" hidden><?php echo $meanN[1];?></div>
<div id="meanN3" hidden><?php echo $meanN[2];?></div>
<div id="meanN4" hidden><?php echo $meanN[3];?></div>
<div id="meanN5" hidden><?php echo $meanN[4];?></div>
<div id="meanN6" hidden><?php echo $meanN[5];?></div>
<div id="meanN7" hidden><?php echo $meanN[6];?></div>
<div id="meanN8" hidden><?php echo $meanN[7];?></div>
<div id="meanN9" hidden><?php echo $meanN[8];?></div>
<div id="meanN10" hidden><?php echo $meanN[9];?></div>


<div id="maxD1" hidden><?php echo $maxD[0];?></div>
<div id="maxD2" hidden><?php echo $maxD[1];?></div>
<div id="maxD3" hidden><?php echo $maxD[2];?></div>
<div id="maxD4" hidden><?php echo $maxD[3];?></div>
<div id="maxD5" hidden><?php echo $maxD[4];?></div>
<div id="maxD6" hidden><?php echo $maxD[5];?></div>
<div id="maxD7" hidden><?php echo $maxD[6];?></div>
<div id="maxD8" hidden><?php echo $maxD[7];?></div>
<div id="maxD9" hidden><?php echo $maxD[8];?></div>
<div id="maxD10" hidden><?php echo $maxD[9];?></div>

<div id="maxN1" hidden><?php echo $maxN[0];?></div>
<div id="maxN2" hidden><?php echo $maxN[1];?></div>
<div id="maxN3" hidden><?php echo $maxN[2];?></div>
<div id="maxN4" hidden><?php echo $maxN[3];?></div>
<div id="maxN5" hidden><?php echo $maxN[4];?></div>
<div id="maxN6" hidden><?php echo $maxN[5];?></div>
<div id="maxN7" hidden><?php echo $maxN[6];?></div>
<div id="maxN8" hidden><?php echo $maxN[7];?></div>
<div id="maxN9" hidden><?php echo $maxN[8];?></div>
<div id="maxN10" hidden><?php echo $maxN[9];?></div>


<div id="minD1" hidden><?php echo $minD[0];?></div>
<div id="minD2" hidden><?php echo $minD[1];?></div>
<div id="minD3" hidden><?php echo $minD[2];?></div>
<div id="minD4" hidden><?php echo $minD[3];?></div>
<div id="minD5" hidden><?php echo $minD[4];?></div>
<div id="minD6" hidden><?php echo $minD[5];?></div>
<div id="minD7" hidden><?php echo $minD[6];?></div>
<div id="minD8" hidden><?php echo $minD[7];?></div>
<div id="minD9" hidden><?php echo $minD[8];?></div>
<div id="minD10" hidden><?php echo $minD[9];?></div>

<div id="minN1" hidden><?php echo $minN[0];?></div>
<div id="minN2" hidden><?php echo $minN[1];?></div>
<div id="minN3" hidden><?php echo $minN[2];?></div>
<div id="minN4" hidden><?php echo $minN[3];?></div>
<div id="minN5" hidden><?php echo $minN[4];?></div>
<div id="minN6" hidden><?php echo $minN[5];?></div>
<div id="minN7" hidden><?php echo $minN[6];?></div>
<div id="minN8" hidden><?php echo $minN[7];?></div>
<div id="minN9" hidden><?php echo $minN[8];?></div>
<div id="minN10" hidden><?php echo $minN[9];?></div>

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

// declare variable that contain Mean of each sensor for last 30 days (Day)
var meanD1 = document.getElementById('meanD1').innerHTML;
var meanD2 = document.getElementById('meanD2').innerHTML;
var meanD3 = document.getElementById('meanD3').innerHTML;
var meanD4 = document.getElementById('meanD4').innerHTML;
var meanD5 = document.getElementById('meanD5').innerHTML;
var meanD6 = document.getElementById('meanD6').innerHTML;
var meanD7 = document.getElementById('meanD7').innerHTML;
var meanD8 = document.getElementById('meanD8').innerHTML;
var meanD9 = document.getElementById('meanD9').innerHTML;
var meanD10 = document.getElementById('meanD10').innerHTML;

// declare variable that contain Mean of each sensor for last 30 days (Night)
var meanN1 = document.getElementById('meanN1').innerHTML;
var meanN2 = document.getElementById('meanN2').innerHTML;
var meanN3 = document.getElementById('meanN3').innerHTML;
var meanN4 = document.getElementById('meanN4').innerHTML;
var meanN5 = document.getElementById('meanN5').innerHTML;
var meanN6 = document.getElementById('meanN6').innerHTML;
var meanN7 = document.getElementById('meanN7').innerHTML;
var meanN8 = document.getElementById('meanN8').innerHTML;
var meanN9 = document.getElementById('meanN9').innerHTML;
var meanN10 = document.getElementById('meanN10').innerHTML;


// declare variable that contain Minimum of each sensor for last 30 days (Day)
var minD1 = document.getElementById('minD1').innerHTML;
var minD2 = document.getElementById('minD2').innerHTML;
var minD3 = document.getElementById('minD3').innerHTML;
var minD4 = document.getElementById('minD4').innerHTML;
var minD5 = document.getElementById('minD5').innerHTML;
var minD6 = document.getElementById('minD6').innerHTML;
var minD7 = document.getElementById('minD7').innerHTML;
var minD8 = document.getElementById('minD8').innerHTML;
var minD9 = document.getElementById('minD9').innerHTML;
var minD10 = document.getElementById('minD10').innerHTML;

// declare variable that contain minimum of each sensor for last 30 days (Night)
var minN1 = document.getElementById('minN1').innerHTML;
var minN2 = document.getElementById('minN2').innerHTML;
var minN3 = document.getElementById('minN3').innerHTML;
var minN4 = document.getElementById('minN4').innerHTML;
var minN5 = document.getElementById('minN5').innerHTML;
var minN6 = document.getElementById('minN6').innerHTML;
var minN7 = document.getElementById('minN7').innerHTML;
var minN8 = document.getElementById('minN8').innerHTML;
var minN9 = document.getElementById('minN9').innerHTML;
var minN10 = document.getElementById('minN10').innerHTML;


// declare variable that contain Maximum of each sensor for last 30 days (Day)
var maxD1 = document.getElementById('maxD1').innerHTML;
var maxD2 = document.getElementById('maxD2').innerHTML;
var maxD3 = document.getElementById('maxD3').innerHTML;
var maxD4 = document.getElementById('maxD4').innerHTML;
var maxD5 = document.getElementById('maxD5').innerHTML;
var maxD6 = document.getElementById('maxD6').innerHTML;
var maxD7 = document.getElementById('maxD7').innerHTML;
var maxD8 = document.getElementById('maxD8').innerHTML;
var maxD9 = document.getElementById('maxD9').innerHTML;
var maxD10 = document.getElementById('maxD10').innerHTML;

// declare variable that contain Maximum of each sensor for last 30 days (Night)
var maxN1 = document.getElementById('maxN1').innerHTML;
var maxN2 = document.getElementById('maxN2').innerHTML;
var maxN3 = document.getElementById('maxN3').innerHTML;
var maxN4 = document.getElementById('maxN4').innerHTML;
var maxN5 = document.getElementById('maxN5').innerHTML;
var maxN6 = document.getElementById('maxN6').innerHTML;
var maxN7 = document.getElementById('maxN7').innerHTML;
var maxN8 = document.getElementById('maxN8').innerHTML;
var maxN9 = document.getElementById('maxN9').innerHTML;
var maxN10 = document.getElementById('maxN10').innerHTML;


// create separate sensor in system to set of day and night to find maximum amount of activities  
var daySet = [valueD1,valueD2,valueD3,valueD4,valueD5,valueD6,valueD7,valueD8,valueD9,valueD10];
var nightSet = [valueN1,valueN2,valueN3,valueN4,valueN5,valueN6,valueN7,valueN8,valueN9,valueN10];
var maxDay = Math.max.apply(null,daySet);
var maxNight = Math.max.apply(null,nightSet);
var maxAll = Math.max.apply(maxDay,maxNight);
</script>