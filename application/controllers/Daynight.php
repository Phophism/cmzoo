<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daynight extends CI_Controller {

	public function index(){
		$this->load->model('animal_log_model');
		$dateReceive = null;
		$dateReceive = $this->input->post('datepicker');
		$cageReceive = $this->input->post('cageselect');
		var_dump($cageReceive);
		if($dateReceive==null && $cageReceive==null){
			$this->load->view('_daynight');
		}else{
			$dateReceive = date("Y-m-d",strtotime($dateReceive));
			$this->load->model('animal_log_model');
			$day = $this->animal_log_model->get_data_by_date_day($dateReceive);
			$night = $this->animal_log_model->get_data_by_date_night($dateReceive);
		
			$minA = 1; // First node of cage A
			$maxA = 6; // Last node of cage A
			$minB = 7; // Fisrt node of cage B
			$maxB = 10; // Last node of cage B

			// Day A
			if(isset($day)){
				foreach($day as $node){
					if(($node->nodeId >= $minA)&&($node->nodeId <= $maxA)){
						$dayNodeA[] = array(
							'id' => $node->nodeId
						) ;
					}	
				}
			}
			// Day B
			if(isset($day)){
				foreach($day as $node){
					if(($node->nodeId >= $minB)&&($node->nodeId <= $maxB)){
						$dayNodeB[] = array(
							'id' => $node->nodeId
						) ;
					}	
				}
			}

			// Night A
			if(isset($night)){
				foreach($night as $node){
					if(($node->nodeId >= $minA)&&($node->nodeId <= $maxA)){
						$nightNodeA[] = array(
							'id' => $node->nodeId
						) ;
					}	
				}
			}
			// Night B
			if(isset($night)){
				foreach($night as $node){
					if(($node->nodeId >= $minB)&&($node->nodeId <= $maxB)){
						$nightNodeB[] = array(
							'id' => $node->nodeId
						) ;
					}	
				}
			}		

			$this->load->view('_daynight',
				array(
					"logDayA" => $dayNodeA,
					"logNightA" => $nightNodeA,
					"logDayB" => $dayNodeB,
					"logNightB" => $nightNodeB,
					"dateReceive" => $dateReceive
				)
			);
		}
	}
}