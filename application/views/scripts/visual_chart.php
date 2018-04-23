<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<?php $nodeWeek = (array)$nodeWeek ;?>
<script>
	
	<?php
	echo "var itemsDay = [];" ; // transfer data from php to javascript 
	$node = 0 ; // node 1 - 10
	while($node < 10){
		echo "itemsDay.push([]);";
		$dataDay = 0 ; // data in on week ( 7 days )
		while($dataDay < 24){
			$item = json_encode($nodeDay[$node][$dataDay], JSON_HEX_TAG);
			echo "itemsDay[".$node."][".$dataDay."] = ".$item.";" ;
			$dataDay++;
		}
		$node++;
	} 
	?>
	console.log(itemsDay);

	<?php	
	echo "var itemsWeek = [];" ; // transfer data from php to javascript 
	$node = 0 ; // node 1 - 10
	while($node < 10){
		echo "itemsWeek.push([]);";
		$dataWeek = 0 ; // data in on week ( 7 days )
		while($dataWeek < 7){
			$item = json_encode($nodeWeek[$node][$dataWeek], JSON_HEX_TAG);
			echo "itemsWeek[".$node."][".$dataWeek."] = ".$item.";" ;
			$dataWeek++;
		}
		$node++;
	}
	?>

	<?php	
	echo "var itemsMonth = [];" ; // transfer data from php to javascript 
	$node = 0 ; // node 1 - 10
	while($node < 10){
		echo "itemsMonth.push([]);";
		$dataMonth = 0 ; // data in on week ( 7 days )
		while($dataMonth < 30){
			$item = json_encode($nodeMonth[$node][$dataMonth], JSON_HEX_TAG);
			echo "itemsMonth[".$node."][".$dataMonth."] = ".$item.";" ;
			$dataMonth++;
		}
		$node++;
	}
	?>
	console.log(itemsWeek);
	console.log(itemsMonth);

	<?php
	echo "var dateWeek = [];";
	$countDateWeek=0;
	while($countDateWeek < 7){
		$dateSet = date("Y-m-d",strtotime($dateReceive.'-'.$countDateWeek.'day'));
		echo "dateWeek[".$countDateWeek."] = '".$dateSet."';" ;
		$countDateWeek++;

	}
	?>
	console.log(dateWeek);

	<?php
	echo "var dateMonth = [];";
	$countDateMonth=0;
	while($countDateMonth < 30){
		$dateSet = date("M d",strtotime($dateReceive.'-'.$countDateMonth.'day'));
		echo "dateMonth[".$countDateMonth."] = '".$dateSet."';" ;
		$countDateMonth++;

	}
	?>

		console.log(dateMonth);

	var hrTime = ["1 AM","2 AM","3 AM","4 AM","5 AM","6 AM","7 AM","8 AM","9 AM","10 AM","11 AM","12 AM",
				"1 PM","2 PM","3 PM","4 PM","5 PM","6 PM","7 PM","8 PM","9 PM","10 PM","11 PM","12 PM",];
	var weekTime = [dateWeek[0],dateWeek[1],dateWeek[2],dateWeek[3],dateWeek[4],dateWeek[5],dateWeek[6],] ;
	var monthTime = [dateMonth[0],dateMonth[1],dateMonth[2],dateMonth[3],dateMonth[4],dateMonth[5],dateMonth[6],dateMonth[7],dateMonth[8],dateMonth[9],dateMonth[10],dateMonth[11],dateMonth[12],dateMonth[13],dateMonth[14],dateMonth[15],dateMonth[16],dateMonth[17],dateMonth[18],dateMonth[19],dateMonth[20],dateMonth[21],dateMonth[22],dateMonth[23],dateMonth[24],dateMonth[25],dateMonth[26],dateMonth[27],dateMonth[28],dateMonth[29]] ;	

	var dayA = [];
	for(var i = 0 ; i<6 ; i++){
		dayA.push([]);
		for(var j = 0 ; j<24 ; j++){
			dayA[i][j] = itemsDay[i][j] ; 
		}
	}

	var dayB = [];
	for(var i = 0 ; i<4 ; i++){
		dayB.push([]);
		for(var j = 0 ; j<24 ; j++){
			dayB[i][j] = itemsDay[i+6][j] ; 
		}
	}


	var weekA = [];
	for(var i = 0 ; i<6 ; i++){
		weekA.push([]);
		for(var j = 0 ; j<7 ; j++){
			weekA[i][j] = itemsWeek[i][j] ; 
		}
	}

	var weekB = [];
	for(var i = 0 ; i<4 ; i++){
		weekB.push([]);
		for(var j = 0 ; j<7 ; j++){
			weekB[i][j] = itemsWeek[i+6][j] ; 
		}
	}

	var monthA = [];
	for(var i = 0 ; i<6 ; i++){
		monthA.push([]);
		for(var j = 0 ; j<30 ; j++){
			monthA[i][j] = itemsMonth[i][j] ; 
		}
	}

	var monthB = [];
	for(var i = 0 ; i<4 ; i++){
		monthB.push([]);
		for(var j = 0 ; j<30 ; j++){
			monthB[i][j] = itemsMonth[i+6][j] ; 
		}
	}

</script>


<script>
	new Chart(document.getElementById("visualize-chart"), {
		type: 'line',
		data: {
			labels: <?php
					if($period == 1){
						echo "hrTime";
					}else if($period == 2){
						echo "weekTime";
					}else
						echo "monthTime";
					?>,
			datasets: [{
				data: <?php
						if($cageReceive=="on"){
							if($period == 1){
								echo "dayA[0]";
							}else if($period == 2){
								echo "weekA[0]";
							}else
								echo "monthA[0]";
						}else{
							if($period == 1){
								echo "dayB[0]";
							}else if($period == 2){
								echo "weekB[0]";
							}else
								echo "monthB[0]";
						}
						?>,
				label: <?php 
						if($cageReceive=="on")
							echo "\"Sensor #1\"" ; 
						else
							echo "\"Sensor #7\"" ;
						?>,
				borderColor: "#3e95cd",
				fill: false
			}, {
				data:<?php
						if($cageReceive=="on"){
							if($period == 1){
								echo "dayA[1]";
							}else if($period == 2){
								echo "weekA[1]";
							}else
								echo "monthA[1]";
						}else{
							if($period == 1){
								echo "dayB[1]";
							}else if($period == 2){
								echo "weekB[1]";
							}else
								echo "monthB[1]";
						}
						?>,
				label: <?php 
						if($cageReceive=="on")
							echo "\"Sensor #2\"" ; 
						else
							echo "\"Sensor #8\"" ;
						?>,
				borderColor: "#8e5ea2",
				fill: false 
			}, {
				data: <?php
						if($cageReceive=="on"){
							if($period == 1){
								echo "dayA[2]";
							}else if($period == 2){
								echo "weekA[2]";
							}else
								echo "monthA[2]";
						}else{
							if($period == 1){
								echo "dayB[2]";
							}else if($period == 2){
								echo "weekB[2]";
							}else
								echo "monthB[2]";
						}
						?>,
				label: <?php 
						if($cageReceive=="on")
							echo "\"Sensor #3\"" ; 
						else
							echo "\"Sensor #9\"" ;
						?>,
				borderColor: "#3cba9f",
				fill: false
			}, {
				data: <?php
						if($cageReceive=="on"){
							if($period == 1){
								echo "dayA[3]";
							}else if($period == 2){
								echo "weekA[3]";
							}else
								echo "monthA[3]";
						}else{
							if($period == 1){
								echo "dayB[3]";
							}else if($period == 2){
								echo "weekB[3]";
							}else
								echo "monthB[3]";
						}
						?>,
				label: <?php 
						if($cageReceive=="on")
							echo "\"Sensor #4\"" ; 
						else
							echo "\"Sensor #10\"" ;
						?>,
				borderColor: "#e8c3b9",
				fill: false
			}
			<?php
				if($cageReceive == "on"){
					if($period == 1){
						echo"
						, {
							data: itemsDay[4],
							label: \"Sensor #5\",
							borderColor: \"#c45850\",
							fill: false
						},{
							data: itemsDay[5],
							label: \"Sensor #6\",
							borderColor: \"#ff8080\",
							fill: false
						}" ;
					}else if($period == 2){
						echo"
						, {
							data: itemsWeek[4],
							label: \"Sensor #5\",
							borderColor: \"#c45850\",
							fill: false
						},{
							data: itemsWeek[5],
							label: \"Sensor #6\",
							borderColor: \"#ff8080\",
							fill: false
						}" ;
					}else{
						echo"
						, {
							data: itemsMonth[4],
							label: \"Sensor #5\",
							borderColor: \"#c45850\",
							fill: false
						},{
							data: itemsMonth[5],
							label: \"Sensor #6\",
							borderColor: \"#e8c3b9\",
							fill: false
						}" ;
					}
				}
			?>
			]
		},
		options: {
			title: {
				display: true,
				<?php if ($period == 1 ){ ?>
					text: ['Amount of activities detected per hour [ X-axist = Time(hr.) , Y-axist = Amount ]']
				<?php }else{ ?>
					text: ['Amount of activities detected per day [ X-axist = Time(date) , Y-axist = Amount ]']
			<?php } ?>	
			}
		}
	});


</script>
