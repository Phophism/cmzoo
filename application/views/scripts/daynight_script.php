<!-- Chart Day&Night -->

<script src="assets/amchart/amcharts/amcharts.js"></script>
<script src="assets/amchart/amcharts/serial.js"></script>
<script src="assets/amchart/amcharts/themes/light.js"></script>
<script src="assets/amchart/amcharts/themes/dark.js"></script>



<!-- Number of act -->
<?php
    $this->load->view('scripts/daynight_get_value');
	$this->load->view('scripts/daynight_num_of_act'); 
	$this->load->view('scripts/daynight_pie');
	$this->load->view('scripts/daynight_mean');
?>

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


<!-- datepicker -->

<script type="text/javascript">
	function change() {
		document.getElementById("dateForm").submit();
		console.log($("#date").val());
		console.log($("#checkbox").val());
	}
</script>
