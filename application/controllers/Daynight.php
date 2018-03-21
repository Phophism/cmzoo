<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daynight extends CI_Controller {

	public function index(){
		$this->load->model('animal_log_model');
		$datepicker = $this->input->post('datepicker');
		
		if($datepicker==null){
			$this->load->view('_daynight');
		}else{
			$datepicker = date("Y-m-d",strtotime($datepicker));
			$this->load->model('animal_log_model');
			$date = $this->animal_log_model->get_data_by_date($datepicker);
			var_dump($date);
			$this->load->view('_daynight',
				array(
					"log" => $date
				)
			);
		}
	}

	

}

