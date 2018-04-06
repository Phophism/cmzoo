<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daynight extends CI_Controller {

	public function index(){
		$this->load->model('animal_log_model');
		$dateReceive = $this->input->post('datepicker');
		$cageReceive = $this->input->post('cageselect');
	

		if($dateReceive==null && $cageReceive==null){
			$dateReceive = date("Y-m-d");
			$cageReceive = "ON";
		}else{
			$dateReceive = date("Y-m-d",strtotime($dateReceive));
			var_dump($dateReceive);
		}
			echo "datechange";
			$dateReceive = date("Y-m-d",strtotime($dateReceive));
			$this->load->model('animal_log_model');
			$day = $this->animal_log_model->get_data_by_date_day($dateReceive);
			$night = $this->animal_log_model->get_data_by_date_night($dateReceive);
		
			$minA = 1; // First node of cage A
			$maxA = 6; // Last node of cage A
			$minB = 7; // First node of cage B
			$maxB = 10; // Last node of cage 

			//send id of DayA/DayB/NightA/NightB
			// Day A
			if(isset($day)){
				foreach($day as $node){
					if(($node->nodeId >= $minA)&&($node->nodeId <= $maxA)){
						$dayNodeA[] = array(
							'id' => $node->nodeId // A
						) ;
					}
					else if(($node->nodeId >= $minB)&&($node->nodeId <= $maxB)){
						$dayNodeB[] = array(
							'id' => $node->nodeId // B
						) ;
					}	
				}
			}

			// Night A/B
			if(isset($night)){
				foreach($night as $node){ 
					if(($node->nodeId >= $minA)&&($node->nodeId <= $maxA)){
						$nightNodeA[] = array(
							'id' => $node->nodeId //A
						) ;
					}
					else if(($node->nodeId >= $minB)&&($node->nodeId <= $maxB)){
						$nightNodeB[] = array(
							'id' => $node->nodeId //B
						) ;
					}		
				}
			} 

			if(empty($night)&&empty($day)){
				$this->load->view('_daynight',
					array(
						"dateReceive" => $dateReceive,
						"cageReceive" => $cageReceive
					)
				);
			}else if(!empty($night)&&empty($day)){
				echo "Hello N" ;
				if(empty($nightNodeA)){
					$this->load->view('_daynight',
						array(
							"logNightB" => $nightNodeB,
							"dateReceive" => $dateReceive,
							"cageReceive" => $cageReceive
						)
					);
				}else if(empty($nightNodeB)){
					$this->load->view('_daynight',
						array(
							"logNightA" => $nightNodeA,
							"dateReceive" => $dateReceive,
							"cageReceive" => $cageReceive
						)
					);
				}else{ 
					$this->load->view('_daynight',
						array(
						"logNightA" => $nightNodeA,
						"logNightB" => $nightNodeB,
						"dateReceive" => $dateReceive,
						"cageReceive" => $cageReceive
						)
					);
				}
			}else if(!empty($day)&&empty($night)){
				echo "Hello D" ;
				if(empty($dayNodeA)){
					$this->load->view('_daynight',
						array(
							"logDayB" => $dayNodeB,
							"dateReceive" => $dateReceive,
							"cageReceive" => $cageReceive
						)
					);
				}else if(empty($dayNodeB)){
					$this->load->view('_daynight',
						array(
							"logDayA" => $dayNodeA,
							"dateReceive" => $dateReceive,
							"cageReceive" => $cageReceive
						)
					);
				}else{ 
					$this->load->view('_daynight',
						array(
						"logDayA" => $dayNodeA,
						"logDayB" => $dayNodeB,
						"dateReceive" => $dateReceive,
						"cageReceive" => $cageReceive
						)
					);	
				}
			}else if(!empty($night)&&!empty($day)){
				echo "Hello DN" ;
				$this->load->view('_daynight',
					array(
						"logDayA" => $dayNodeA,
						"logNightA" => $nightNodeA,
						"logDayB" => $dayNodeB,
						"logNightB" => $nightNodeB,
						"dateReceive" => $dateReceive,
						"cageReceive" => $cageReceive
					)
				);
			} 	
		
	}
}