<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daynight extends CI_Controller {

	public function index(){
		$this->load->model('animal_log_model');

		$this->load->view('_daynight',
			array(
				"log" => $this->get()
			)
		);
	}

	public function get(){
		$datepicker = $this->input->post('datepicker');
		$datepicker = date("Y-m-d",strtotime($datepicker));
		$this->load->model('animal_log_model');
		$this->animal_log_model->get_data_by_date($datepicker);
	}

}

