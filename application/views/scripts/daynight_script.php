<!-- Chart Day&Night -->

<script src="assets/amchart/amcharts/amcharts.js"></script>
<script src="assets/amchart/amcharts/serial.js"></script>
<script src="assets/amchart/amcharts/themes/light.js"></script>

<!-- Standdard Diviation -->
<script>
	var chart = AmCharts.makeChart("sdLine", {
		"type": "serial",
		"theme": "light",
		"dataProvider": [{
			"year": 2005,
			"value": 11.5,
			"error": 5
		}, {
			"year": 2006,
			"value": 26.2,
			"error": 5
		}, {
			"year": 2007,
			"value": 30.1,
			"error": 5
		}, {
			"year": 2008,
			"value": 29.5,
			"error": 7
		}, {
			"year": 2009,
			"value": 24.6,
			"error": 10
		}],
		"balloon": {
			"textAlign": "left"
		},
		"valueAxes": [{
			"id": "v1",
			"axisAlpha": 0
		}],
		"startDuration": 1,
		"graphs": [{
			"balloonText": "value:<b>[[value]]</b><br>error:<b>[[error]]</b>",
			"bullet": "yError",
			"bulletamount": 10,
			"errorField": "error",
			"lineThickness": 2,
			"valueField": "value",
			"bulletAxis": "v1",
			"fillAlphas": 0
		}, {
			"bullet": "round",
			"bulletBorderAlpha": 1,
			"bulletBorderColor": "#FFFFFF",
			"lineAlpha": 0,
			"lineThickness": 2,
			"showBalloon": false,
			"valueField": "value"

		}],
		"chartCursor": {
			"cursorAlpha": 0,
			"cursorPosition": "mouse",
			"graphBulletamount": 1,
			"zoomable": false
		},
		"categoryField": "year",
		"categoryAxis": {
			"gridPosition": "start",
			"axisAlpha": 0
		},
		"export": {
			"enabled": true
		}
	});

</script>







<!-- pie -->

<script src="assets/amchart/amcharts/amcharts.js"></script>
<script src="assets/amchart/amcharts/pie.js"></script>
<link rel="stylesheet" href="assets/amchart/amcharts/plugins/export/export.css" type="text/css" media="all" />
<script src="assets/amchart/amcharts/themes/dark.js"></script>
<script src="assets/amchart/amcharts/plugins/animate/animate.min.js"></script>

<!-- Chart code -->
<script>
	/**
	 * Define data for each sensor
	 */
	var chartData = {
		"1": [{
				"sensor": "Sensor#1",
				"amount": 66
			},
			{
				"sensor": "Sensor#2",
				"amount": 6
			},
			{
				"sensor": "Sensor#3",
				"amount": 23
			},
			{
				"sensor": "Sensor#4",
				"amount": 40
			},
			{
				"sensor": "Sensor#5",
				"amount": 70
			},
			{
				"sensor": "Sensor#6",
				"amount": 90
			}
		],
		"2": [{
				"sensor": "Sensor#1",
				"amount": 67
			},
			{
				"sensor": "Sensor#2",
				"amount": 50
			},
			{
				"sensor": "Sensor#3",
				"amount": 34
			},
			{
				"sensor": "Sensor#4",
				"amount": 50
			},
			{
				"sensor": "Sensor#5",
				"amount": 75
			},
			{
				"sensor": "Sensor#6",
				"amount": 97
			}
		]
	};

	/**
	 * Create the chart
	 */
	var currentYear = 1;
	var chart = AmCharts.makeChart("percentile", {
		"type": "pie",
		"theme": "white",
		"dataProvider": [],
		"valueField": "amount",
		"titleField": "sensor",
		"startDuration": 0,
		"innerRadius": 60,
		"pullOutRadius": 20,
		"marginTop": 30,
		"titles": [{
			"text": "South African Economy"
		}],
		"allLabels": [{
			"y": "58%",
			"align": "center",
			"amount": 25,
			"bold": true,
			"text": "Day1",
			"color": "#555"
		}, {
			"y": "53%",
			"align": "center",
			"amount": 15,
			"text": "Day",
			"color": "#555"
		}],
		"listeners": [{
			"event": "init",
			"method": function (e) {
				var chart = e.chart;

				function getCurrentData() {
					var data = chartData[currentYear];
					currentYear++;
					if (currentYear > 2)
						currentYear = 1;
					return data;
				}

				function loop() {
					chart.allLabels[0].text = currentYear;
					var data = getCurrentData();
					chart.animateData(data, {
						duration: 1000,
						complete: function () {
							setTimeout(loop, 5000);
						}
					});
				}

				loop();
			}
		}],
		"export": {
			"enabled": true
		}
	});

</script>




<!-- # of act -->

<!-- separate sensor's value (DA)-->
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
<div id="valN1" hidden><?php echo $countDay[0]; ?></div>
<div id="valN2" hidden><?php echo $countDay[1]; ?></div>
<div id="valN3" hidden><?php echo $countDay[2]; ?></div>
<div id="valN4" hidden><?php echo $countDay[3]; ?></div>
<div id="valN5" hidden><?php echo $countDay[4]; ?></div>
<div id="valN6" hidden><?php echo $countDay[5]; ?></div>
<div id="valN7" hidden><?php echo $countDay[6]; ?></div>
<div id="valN8" hidden><?php echo $countDay[7]; ?></div>
<div id="valN9" hidden><?php echo $countDay[8]; ?></div>
<div id="valN10" hidden><?php echo $countDay[9]; ?></div>

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

// create separate sensor in system to set of day and night to find maximum amount of activities  
var daySet = [valueD1,valueD2,valueD3,valueD4,valueD5,valueD6,valueD7,valueD8,valueD9,valueD10];
var nightSet = [valueN1,valueN2,valueN3,valueN4,valueN5,valueN6,valueN7,valueN8,valueN9,valueN10];
var maxDay = Math.max.apply(null,daySet);
var maxNight = Math.max.apply(null,nightSet);

// ********************** DA ***********************//
var chart = AmCharts.makeChart("numActDayA",
{
    "type": "serial",
    "theme": "white",
    "dataProvider": [{
        "name": "Sensor #1",
		"activities":valueD1,
        "color": "#7F8DA9",
        "bullet": "https://www.amcharts.com/lib/images/faces/A04.png"
    }, {
        "name": "Sensor #2",
        "activities": valueD2,
        "color": "#FEC514",
        "bullet": "https://www.amcharts.com/lib/images/faces/C02.png"
    }, {
        "name": "Sensor #3",
        "activities": valueD3,
        "color": "#DB4C3C",
        "bullet": "https://www.amcharts.com/lib/images/faces/D02.png"
    }, {
        "name": "Sensor #4",
        "activities": valueD4,
        "color": "#DAF0FD",
        "bullet": "https://www.amcharts.com/lib/images/faces/E01.png"
    }, {
        "name": "Sensor #5",
        "activities": valueD5,
        "color": "#FEC552",
        "bullet": "https://www.amcharts.com/lib/images/faces/C02.png"
    }, {
        "name": "Sensor #6",
        "activities": valueD6,
        "color": "#DB4C1A",
        "bullet": "https://www.amcharts.com/lib/images/faces/D02.png"
    }],
    "valueAxes": [{
        "maximum": maxDay+3,
        "minimum": -1,
        "axisAlpha": 0,
        "dashLength": 4,
        "position": "left"
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "<span style='color:gray; font-size:13px;'> Actsivities : <b>[[value]]</b></span>",
        "bulletOffset": 10,
        "bulletSize": 52,
        "colorField": "color",
        "cornerRadiusTop": 8,
        "customBulletField": "bullet",
        "fillAlphas": 0.8,
        "lineAlpha": 0,
        "type": "column",
        "valueField": "activities"
    }],
    "marginTop": 0,
    "marginRight": 0,
    "marginLeft": 0,
    "marginBottom": 0,
    "autoMargins": false,
    "categoryField": "name",
    "categoryAxis": {
        "axisAlpha": 0,
        "gridAlpha": 0,
        "inside": true,
        "tickLength": 0
    },
    "export": {
    	"enabled": true
     }
});

// ********************** DB ***********************//
var chart = AmCharts.makeChart("numActDayB",
{
    "type": "serial",
    "theme": "white",
    "dataProvider": [{
        "name": "Sensor #7",
		"activities":valueD7,
        "color": "#7F8DA9",
        "bullet": "https://www.amcharts.com/lib/images/faces/A04.png"
    }, {
        "name": "Sensor #8",
        "activities": valueD8,
        "color": "#FEC514",
        "bullet": "https://www.amcharts.com/lib/images/faces/C02.png"
    },{
        "name": "Sensor #9",
        "activities": valueD9,
        "color": "#FEC552",
        "bullet": "https://www.amcharts.com/lib/images/faces/C02.png"
    }, {
        "name": "Sensor #10",
        "activities": valueD10,
        "color": "#DB4C1A",
        "bullet": "https://www.amcharts.com/lib/images/faces/D02.png"
    }],
    "valueAxes": [{
        "maximum": maxDay+3,
        "minimum": -1,
        "axisAlpha": 0,
        "dashLength": 4,
        "position": "left"
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "<span style='color:gray; font-size:13px;'> Actsivities : <b>[[value]]</b></span>",
        "bulletOffset": 10,
        "bulletSize": 52,
        "colorField": "color",
        "cornerRadiusTop": 8,
        "customBulletField": "bullet",
        "fillAlphas": 0.8,
        "lineAlpha": 0,
        "type": "column",
        "valueField": "activities"
    }],
    "marginTop": 0,
    "marginRight": 0,
    "marginLeft": 0,
    "marginBottom": 0,
    "autoMargins": false,
    "categoryField": "name",
    "categoryAxis": {
        "axisAlpha": 0,
        "gridAlpha": 0,
        "inside": true,
        "tickLength": 0
    },
    "export": {
    	"enabled": true
     }
});
// ********************** NA ***********************//
var chart = AmCharts.makeChart("numActNightA",
{
    "type": "serial",
    "theme": "white",
    "dataProvider": [{
        "name": "Sensor #1",
		"activities":valueN1,
        "color": "#7F8DA9",
        "bullet": "https://www.amcharts.com/lib/images/faces/A04.png"
    }, {
        "name": "Sensor #2",
        "activities": valueN2,
        "color": "#FEC514",
        "bullet": "https://www.amcharts.com/lib/images/faces/C02.png"
    }, {
        "name": "Sensor #3",
        "activities": valueN3,
        "color": "#DB4C3C",
        "bullet": "https://www.amcharts.com/lib/images/faces/D02.png"
    }, {
        "name": "Sensor #4",
        "activities": valueN4,
        "color": "#DAF0FD",
        "bullet": "https://www.amcharts.com/lib/images/faces/E01.png"
    }, {
        "name": "Sensor #5",
        "activities": valueN5,
        "color": "#FEC552",
        "bullet": "https://www.amcharts.com/lib/images/faces/C02.png"
    }, {
        "name": "Sensor #6",
        "activities": valueN6,
        "color": "#DB4C1A",
        "bullet": "https://www.amcharts.com/lib/images/faces/D02.png"
    }],
    "valueAxes": [{
        "maximum": maxNight+3,
        "minimum": -1,
        "axisAlpha": 0,
        "dashLength": 4,
        "position": "left"
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "<span style='color:gray; font-size:13px;'> Actsivities : <b>[[value]]</b></span>",
        "bulletOffset": 10,
        "bulletSize": 52,
        "colorField": "color",
        "cornerRadiusTop": 8,
        "customBulletField": "bullet",
        "fillAlphas": 0.8,
        "lineAlpha": 0,
        "type": "column",
        "valueField": "activities"
    }],
    "marginTop": 0,
    "marginRight": 0,
    "marginLeft": 0,
    "marginBottom": 0,
    "autoMargins": false,
    "categoryField": "name",
    "categoryAxis": {
        "axisAlpha": 0,
        "gridAlpha": 0,
        "inside": true,
        "tickLength": 0
    },
    "export": {
    	"enabled": true
     }
});

// **********************NB ***********************//
var chart = AmCharts.makeChart("numActNightB",
{
    "type": "serial",
    "theme": "white",
    "dataProvider": [{
        "name": "Sensor #7",
		"activities":valueN7,
        "color": "#7F8DA9",
        "bullet": "https://www.amcharts.com/lib/images/faces/A04.png"
    }, {
        "name": "Sensor #8",
        "activities": valueN8,
        "color": "#FEC514",
        "bullet": "https://www.amcharts.com/lib/images/faces/C02.png"
    },{
        "name": "Sensor #9",
        "activities": valueN9,
        "color": "#FEC552",
        "bullet": "https://www.amcharts.com/lib/images/faces/C02.png"
    }, {
        "name": "Sensor #10",
        "activities": valueN10,
        "color": "#DB4C1A",
        "bullet": "https://www.amcharts.com/lib/images/faces/D02.png"
    }],
    "valueAxes": [{
        "maximum": maxNight+3,
        "minimum": -1,
        "axisAlpha": 0,
        "dashLength": 4,
        "position": "left"
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "<span style='color:gray; font-size:13px;'> Actsivities : <b>[[value]]</b></span>",
        "bulletOffset": 10,
        "bulletSize": 52,
        "colorField": "color",
        "cornerRadiusTop": 8,
        "customBulletField": "bullet",
        "fillAlphas": 0.8,
        "lineAlpha": 0,
        "type": "column",
        "valueField": "activities"
    }],
    "marginTop": 0,
    "marginRight": 0,
    "marginLeft": 0,
    "marginBottom": 0,
    "autoMargins": false,
    "categoryField": "name",
    "categoryAxis": {
        "axisAlpha": 0,
        "gridAlpha": 0,
        "inside": true,
        "tickLength": 0
    },
    "export": {
    	"enabled": true
     }
});
</script>


<!-- datepicker -->

<script type="text/javascript">
	function change() {
		document.getElementById("dateForm").submit();
		console.log($("#date").val());
		console.log($("#checkbox").val());
	}
</script>
