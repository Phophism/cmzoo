<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daynight extends CI_Controller {

	public function index(){
		$this->load->model('animal_log_model');
		$dateReceive = $this->input->post('datepicker');
		
		if($dateReceive==null){
			$this->load->view('_daynight');
		}else{

			$dateReceive = date("Y-m-d",strtotime($dateReceive));
			$this->load->model('animal_log_model');
			$day = $this->animal_log_model->get_data_by_date_day($dateReceive);
			$night = $this->animal_log_model->get_data_by_date_night($dateReceive);

			$dayNode = array();
			if(isset($day)){
				foreach($day as $dayNode){
					$dayNode->node = $day->nodeId;
				}
			}
			var_dump($dayNode);

			$this->load->view('_daynight',
				array(
					"logDay" => $day,
					"logNight" => $night
				)
			);
			
		}
	}
}

