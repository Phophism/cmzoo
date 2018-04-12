<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller {

	public function index()
	{
		$this->load->model('animal_log_model');
		$this->load->model('sensor_model');
		$dateReceive = $this->input->post('datepicker');
		// $cageA = $this->input->post('cageButtonA');
		// $cageB = $this->input->post('cageButtonB');

		if($dateReceive==null /*&& $cageA==null && $cageB==null*/){
			$dateReceive = date("Y-m-d");
		}else{
			$dateReceive = date("Y-m-d",strtotime($dateReceive));
		}	
		$day = $this->animal_log_model->get_data_by_date($dateReceive);
		$sensors = $this->sensor_model->get();

		if(isset($day)){
			$dataNode = array(); // Get Id,Status,Start Time, End Time, Duration
			$statusNode = array(); // get id , status
			foreach($day as $whole){ 
				$dataNode[($whole->nodeId)-1][] = array(
					"id" => $whole->nodeId,
					"duration" => $whole->duration,
					"start" => $whole->startTime,
					"end" => $whole->endTime
				);
			}
			foreach($sensors as $sensor){
				$statusNode[] = $sensor->status;
			}
		}	
		$this->load->view('_map',array(
			"data" => $dataNode ,
			"status" => $statusNode,
			"dateReceive" => $dateReceive

		));
	
	}
}

