<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller {

	public function index()
	{
		$this->load->model('animal_log_model');
		$this->load->model('sensor_model');
		$dateReceive = $this->input->post('datepicker');
		$previousDate = $this->input->post('datepickerOld');
		$timeReceive = $this->input->post('timeSlider');
		// $cageA = $this->input->post('cageButtonA');
		// $cageB = $this->input->post('cageButtonB');
		var_dump($dateReceive);
		var_dump($previousDate);
		if($dateReceive==null /*&& $cageA==null && $cageB==null*/){
			$dateReceive = date("Y-m-d");
			$previousDate = date("Y-m-d");
		}else{
			$dateReceive = date("Y-m-d",strtotime($dateReceive));
		}	

		$timeSlide = gmdate("H:i",($timeReceive/2));

		$day = $this->animal_log_model->get_data_by_date($dateReceive);
		$sensors = $this->sensor_model->get();
		
		$detectDescription= array();
		$errorDescription = array();
		$countErrorAll = 0;
		$countErrorCageA = 0;
		$countErrorCageB = 0;
		
		$maxTime = 172680;
		$valueTime = 0 ;

		//--------------Calculate Sensor Status--------------//

		// add description
		foreach($sensors as $sensor){	
			//error
			if($sensor->status == 0 ){
				$errorDescription[] = "Caution : sensor number ".$sensor->nodeId." got some problem, please check it!";
				$countErrorAll++;
				if($sensor->status < 7){
					$countErrorCageA++;
				}else
					$countErrorCageB++;
			}

			// detect
			if($sensor->status == 2){
				if($sensor->nodeId == 1)
					$detectDescription[] = "Notice : Activity detected at the eating area (A)";
				else if($sensor->nodeId == 2)
					$detectDescription[] = "Notice : Activity detected at the excretory-area-1 (A)";
				else if($sensor->nodeId == 3)
					$detectDescription[] = "Notice : Activity detected at the excretory-area-2 (A)";
				else if($sensor->nodeId == 4)
					$detectDescription[] = "Notice : Activity detected at the relaxing-area-1 (A)";
				else if($sensor->nodeId == 5)
					$detectDescription[] = "Notice : Activity detected at the relaxing-area-2 (A)";
				else if($sensor->nodeId == 6)
					$detectDescription[] = "Notice : Activity detected at the relaxing-area-3 (A)";
				else if($sensor->nodeId == 7)
					$detectDescription[] = "Notice : Activity detected at the eating area (B)";
				else if($sensor->nodeId == 8)
					$detectDescription[] = "Notice : Activity detected at the relaxing-area-1 (B)";
				else if($sensor->nodeId == 9)
					$detectDescription[] = "Notice : Activity detected at the excretory area (B)";
				else if($sensor->nodeId == 10)
					$detectDescription[] = "Notice : Activity detected at the relaxing-area-2 (B)";
			}
		}

		if($countErrorCageA == 6 ){
			while($countErrorCageA < 1){
				unset($errorDescription[$countErrorCageA-1]);
				$countErrorCageA--;
			}
			$errorDescription[] = "Caution : all sensor in cage \"A\" is down, please check them!!! ";
		}
		if($countErrorCageB == 4 ){
			$errorDescription=array_splice($errorDescription,-4);
			$errorDescription[] = "Caution : all sensor in cage \"B\" is down, please check them!!! ";
		}
		if($countErrorAll == 10){
			$errorDescription = null;
			$errorDescription[] = "Caution : all sensor is down, please check them!!! ";
		}

		if($countErrorAll == 0){
			$errorDescription = null;
		}

		//-------------- collect day ---------------//

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
		
		if(isset($dataNode)){
			foreach($dataNode as $node=>$id){
				if(isset($id)){
					foreach($id as $time => $end){
						var_dump($end);
					}
				}
			}
		}
		// -------------------- status logic ---------------- //

	
		if($timeReceive == null ) {
			// First Time access ??
			// convert H:i to second (Now)
			list($h,$m) = explode(':',date("H:i"));
			$highestTime = ($h*3600)+($m*60);
			$maxTime = $highestTime;
			$valueTime = $highestTime ;

			$this->load->view('_map',array(
				"dateReceive" => $dateReceive,
				"note" => $detectDescription,
				"errorNote" => $errorDescription,
				"maxTime" => $maxTime,
				"value" => $valueTime
			));

		}else if($dateReceive == date("Y-m-d")){
			// Second Access
			// Today
			if($dateReceive != $previousDate){
				// day change
				// convert H:i to second (Now)
				list($h,$m) = explode(':',date("H:i"));
				$highestTime = ($h*3600)+($m*60);

				$maxTime = $highestTime ;
				$valueTime = $highestTime ;

				$this->load->view('_map',array(
					"dateReceive" => $dateReceive,
					"note" => $detectDescription,
					"errorNote" => $errorDescription,
					"maxTime" => $maxTime,
					"value" => $valueTime
				));
			}else if($dateReceive == $previousDate && $timeSlide == date('H:i')){
				// Day not change -> Time = Now
				// day change
				// convert H:i to second (Now)
				list($h,$m) = explode(':',date("H:i"));
				$highestTime = ($h*3600)+($m*60);

				$maxTime = $highestTime ;
				$valueTime = $highestTime ;

				$this->load->view('_map',array(
					"dateReceive" => $dateReceive,
					"note" => $detectDescription,
					"errorNote" => $errorDescription,
					"maxTime" => $maxTime,
					"value" => $valueTime
				));
			}else if($dateReceive == $previousDate && $timeSlide != date('H:i')){
				// day change -> Time != now
				// convert H:i to second (Now)
				list($h,$m) = explode(':',$timeSlide);
				$valueToSec = ($h*3600)+($m*60);

				list($h,$m) = explode(':',date("H:i"));
				$highestTime = ($h*3600)+($m*60);

				$valueTime = $valueToSec ;
				$valueMax = $highestTime ;
				
				$this->load->view('_map',array(
					"dateReceive" => $dateReceive,
					"note" => $detectDescription,
					"errorNote" => $errorDescription,
					"maxTime" => $maxTime,
					"value" => $valueTime
				));
			}

				// $this->load->view('_map',array(
				// 	"data" => $dataNode ,
				// 	"status" => $statusNode,
				// 	"dateReceive" => $dateReceive,
				// 	"note" => $detectDescription,
				// 	"errorNote" => $errorDescription
				// ));
				
			
		} else {
			// Not today
			if($timeSlide == $previousDate){
				// day not change
				list($h,$m) = explode(':',$timeSlide);
				$valueToSec = ($h*3600)+($m*60);

				$valueTime = $valueToSec ;
				// $this->load->view('_map',array(
				// 	"dateReceive" => $dateReceive,
				// 	"note" => $detectDescription,
				// 	"errorNote" => $errorDescription,
				// 	"maxTime" => $maxTime,
				// 	"value" => $valueTime
				// ));
				$this->load->view('_map',array(
					"dateReceive" => $dateReceive,
					"note" => $detectDescription,
					"errorNote" => $errorDescription,
					"maxTime" => $maxTime,
					"value" => $valueTime
				));
			}else{
				// day change
				// $this->load->view('_map',array(
				// 	"dateReceive" => $dateReceive,
				// 	"note" => $detectDescription,
				// 	"errorNote" => $errorDescription,
				// 	"maxTime" => $maxTime,
				// 	"value" => $valueTime
				// ));
				$this->load->view('_map',array(
					"dateReceive" => $dateReceive,
					"note" => $detectDescription,
					"errorNote" => $errorDescription,
					"maxTime" => $maxTime,
					"value" => $valueTime
				));
				
			}
		}
	}
}

