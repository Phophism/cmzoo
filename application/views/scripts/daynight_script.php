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
	$this->load->view('scripts/daynight_standard_deviation');
?>

<!-- datepicker -->

<script type="text/javascript">
	function change() {
		document.getElementById("dateForm").submit();
		console.log($("#date").val());
		console.log($("#checkbox").val());
	}
</script>
