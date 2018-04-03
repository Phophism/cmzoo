<script src="assets/amchart/amcharts/amcharts.js"></script>
<script src="assets/amchart/amcharts/radar.js"></script>
<script src="assets/amchart/amcharts/serial.js"></script>
<script src="assets/amchart/amcharts/themes/light.js"></script>

<?php
	$this->load->view('scripts/report_get_value');
?>


<?php
	$this->load->view('scripts/report_radar')
?>

<!-- Line Amount -->

<script>
	AmCharts.makeChart("lineAmount", {
		"type": "serial",
		"dataProvider": [{
			"day": 1,
			"value": 120
		}, {
			"day": 2,
			"value": 54
		}, {
			"day": 3,
			"value": -18
		}, {
			"day": 4,
			"value": -12
		}, {
			"day": 5,
			"value": -51
		}, {
			"day": 6,
			"value": 12
		}, {
			"day": 7,
			"value": 56
		}, {
			"day": 8,
			"value": 113
		}, {
			"day": 9,
			"value": 142
		}, {
			"day": 10,
			"value": 125
		}],
		"categoryField": "day",
		"autoMargins": false,
		"marginLeft": 0,
		"marginRight": 5,
		"marginTop": 0,
		"marginBottom": 0,
		"graphs": [{
			"valueField": "value",
			"showBalloon": false,
			"lineColor": "#ffbf63",
			"negativeLineColor": "#289eaf"
		}],
		"valueAxes": [{
			"gridAlpha": 0,
			"axisAlpha": 0,
			"guides": [{
				"value": 0,
				"lineAlpha": 0.1
			}]
		}],
		"categoryAxis": {
			"gridAlpha": 0,
			"axisAlpha": 0,
			"startOnAxis": true
		}
	});

</script>

<!-- Line Amount -->

<script>
	AmCharts.makeChart("lineTemp", {
		"type": "serial",
		"dataProvider": [{
			"day": 1,
			"value": 120
		}, {
			"day": 2,
			"value": 54
		}, {
			"day": 3,
			"value": -18
		}, {
			"day": 4,
			"value": -12
		}, {
			"day": 5,
			"value": -51
		}, {
			"day": 6,
			"value": 12
		}, {
			"day": 7,
			"value": 56
		}, {
			"day": 8,
			"value": 113
		}, {
			"day": 9,
			"value": 142
		}, {
			"day": 10,
			"value": 125
		}],
		"categoryField": "day",
		"autoMargins": false,
		"marginLeft": 0,
		"marginRight": 5,
		"marginTop": 0,
		"marginBottom": 0,
		"graphs": [{
			"valueField": "value",
			"showBalloon": false,
			"lineColor": "#ffbf63",
			"negativeLineColor": "#289eaf"
		}],
		"valueAxes": [{
			"gridAlpha": 0,
			"axisAlpha": 0,
			"guides": [{
				"value": 0,
				"lineAlpha": 0.1
			}]
		}],
		"categoryAxis": {
			"gridAlpha": 0,
			"axisAlpha": 0,
			"startOnAxis": true
		}
	});

</script>

<!-- Line Amount -->

<script>
	AmCharts.makeChart("lineLight", {
		"type": "serial",
		"dataProvider": [{
			"day": 1,
			"value": 120
		}, {
			"day": 2,
			"value": 54
		}, {
			"day": 3,
			"value": -18
		}, {
			"day": 4,
			"value": -12
		}, {
			"day": 5,
			"value": -51
		}, {
			"day": 6,
			"value": 12
		}, {
			"day": 7,
			"value": 56
		}, {
			"day": 8,
			"value": 113
		}, {
			"day": 9,
			"value": 142
		}, {
			"day": 10,
			"value": 125
		}],
		"categoryField": "day",
		"autoMargins": false,
		"marginLeft": 0,
		"marginRight": 5,
		"marginTop": 0,
		"marginBottom": 0,
		"graphs": [{
			"valueField": "value",
			"showBalloon": false,
			"lineColor": "#ffbf63",
			"negativeLineColor": "#289eaf"
		}],
		"valueAxes": [{
			"gridAlpha": 0,
			"axisAlpha": 0,
			"guides": [{
				"value": 0,
				"lineAlpha": 0.1
			}]
		}],
		"categoryAxis": {
			"gridAlpha": 0,
			"axisAlpha": 0,
			"startOnAxis": true
		}
	});

</script>

<!-- Line Amount -->

<script>
	AmCharts.makeChart("lineHumid", {
		"type": "serial",
		"dataProvider": [{
			"day": 1,
			"value": 120
		}, {
			"day": 2,
			"value": 54
		}, {
			"day": 3,
			"value": -18
		}, {
			"day": 4,
			"value": -12
		}, {
			"day": 5,
			"value": -51
		}, {
			"day": 6,
			"value": 12
		}, {
			"day": 7,
			"value": 56
		}, {
			"day": 8,
			"value": 113
		}, {
			"day": 9,
			"value": 142
		}, {
			"day": 10,
			"value": 125
		}],
		"categoryField": "day",
		"autoMargins": false,
		"marginLeft": 0,
		"marginRight": 5,
		"marginTop": 0,
		"marginBottom": 0,
		"graphs": [{
			"valueField": "value",
			"showBalloon": false,
			"lineColor": "#ffbf63",
			"negativeLineColor": "#289eaf"
		}],
		"valueAxes": [{
			"gridAlpha": 0,
			"axisAlpha": 0,
			"guides": [{
				"value": 0,
				"lineAlpha": 0.1
			}]
		}],
		"categoryAxis": {
			"gridAlpha": 0,
			"axisAlpha": 0,
			"startOnAxis": true
		}
	});

</script>


<!-- datepicker -->

<script type="text/javascript">
	function change() {
		document.getElementById("dateForm").submit();
		console.log($("#date").val());
	}

</script>
