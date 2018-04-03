
<?php	
$count = array(0,0,0,0,0,0,0,0,0,0);
if(isset($logs)){
	foreach($logs as $log){
		if( $log->nodeId == "1")
			$count[0]++;
		else if( $log->nodeId == "2")
			$count[1]++;	
		else if( $log->nodeId == "3")
			$count[2]++;	
		else if( $log->nodeId == "4")
			$count[3]++;	
		else if( $log->nodeId == "5")
			$count[4]++;	
		else if( $log->nodeId == "6")
			$count[5]++;
		else if( $log->nodeId == "7")
			$count[6]++;
		else if( $log->nodeId == "8")
			$count[7]++;
		else if( $log->nodeId == "9")
			$count[8]++;
		else if( $log->nodeId == "10")
			$count[9]++;
	}
}
?>

<!-- set sensor's value -->
<div id="val1" hidden><?php echo $count[0]; ?></div>
<div id="val2" hidden><?php echo $count[1]; ?></div>
<div id="val3" hidden><?php echo $count[2]; ?></div>
<div id="val4" hidden><?php echo $count[3]; ?></div>
<div id="val5" hidden><?php echo $count[4]; ?></div>
<div id="val6" hidden><?php echo $count[5]; ?></div>
<div id="val7" hidden><?php echo $count[6]; ?></div>
<div id="val8" hidden><?php echo $count[7]; ?></div>
<div id="val9" hidden><?php echo $count[8]; ?></div>
<div id="val10" hidden><?php echo $count[9]; ?></div>

<script>

// declare variable that contain value of each sensor
var value1 = document.getElementById('val1').innerHTML;
var value2 = document.getElementById('val2').innerHTML;
var value3 = document.getElementById('val3').innerHTML;
var value4 = document.getElementById('val4').innerHTML;
var value5 = document.getElementById('val5').innerHTML;
var value6 = document.getElementById('val6').innerHTML;
var value7 = document.getElementById('val7').innerHTML;
var value8 = document.getElementById('val8').innerHTML;
var value9 = document.getElementById('val9').innerHTML;
var value10 = document.getElementById('val10').innerHTML;

var dataSet = [value1,value2,value3,value4,value5,value6,value7,value8,value9,value10];
maxActivity  = Math.max.apply(null,dataSet);
</script>

