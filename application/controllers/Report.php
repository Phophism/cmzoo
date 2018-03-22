<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	$this->load->model('animal_log_model');
	$datepicker = $this->input->post('datepicker');
	
	if($datepicker==null){
		$this->load->view('_dailyreport');
	}else{

		$datepicker = date("Y-m-d",strtotime($datepicker));
		$this->load->model('animal_log_model');
		$day = $this->animal_log_model->get_data_by_date($datepicker);
		var_dump($day);
		>view('_dailyreport',
			array(
				"log" => $day,
			)
		);
		
	}
	}


}

