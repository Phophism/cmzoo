<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function index()
	{

		$this->load->model('animal_log_model');


		$this->load->view('_dailyreport'
		);
	}


}

