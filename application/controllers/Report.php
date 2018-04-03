<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function index(){
		
		$this->load->model('animal_log_model');
		$datepicker = $this->input->post('datepicker');
		
		if($datepicker==null){
			$this->load->view('_dailyreport');
		}else{
			$datepicker = date("Y-m-d",strtotime($datepicker));
			$day = $this->animal_log_model->get_data_by_date($datepicker);
			
			if(isset(day)){
				foreach($day as $whole){
					if(/*time = this period*/){
						// @period = 1
					}
					$byWhole[] = array(
		 				'sensor' => $whole->nodeId,
						'time' => // @period
					)	
				}
				
			}
			$this->load->view('_dailyreport',
				array(
					"logs" => $day
				)
			);
		}
	}


}

