<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function index()
	{
		$this->load->model('animal_log_model');
		$this->load->view('_dailyreport',
			array(
				"log" => $this->animal_log_model->get()
			)
		);
		$datepicker = $this->input->post('datepicker');
		$datepicker = date("Y-m-d",strtotime($datepicker));
		var_dump($datepicker);
	}

	public function get(){
		$datepicker = $this->input->post('datepicker');
		$datepicker = date("Y-m-d",strtotime($datepicker));
		$this->load->model('animal_log_model');
		$this->animal_log_model->get_data_by_date($datepicker);
	}


}

