<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller {

// see calculate -> search and delete -> //*-
// see logic -> search and delete -> //+-

	public function index()
	{
		date_default_timezone_set("Asia/bangkok"); // set timezone

		$this->load->model('animal_log_model');
		$this->load->model('sensor_model');
		$dateReceive = $this->input->post('datepicker');
		$previousDate = $this->input->post('datepickerOld');
		$timeReceive = $this->input->post('timeSlider');
		// $cageA = $this->input->post('cageButtonA');
		// $cageB = $this->input->post('cageButtonB');

		if($dateReceive==null && $timeReceive==null /*&& $cageA==null && $cageB==null*/){ // first time access
			$dateReceive = date("Y-m-d");
			$previousDate = date("Y-m-d");
			$timeReceive = date("H:i");
			$timeSlide = date("H:i");
		}else{
			if($dateReceive > date("Y-m-d")){
				$dateReceive = date("Y-m-d") ;
			}else{
				$dateReceive = date("Y-m-d",strtotime($dateReceive));
			}

			if($timeReceive >= 60){
				$timeSlide = gmdate("H:i",$timeReceive);
			}else{
				$timeSlide = gmdate("H:i",60);
			}
		}	

		$day = $this->animal_log_model->get_data_by_date($dateReceive);
		$sensors = $this->sensor_model->get();
		
		$detectDescription= array();
		$errorDescription = array();
		$countErrorAll = 0;
		$countErrorCageA = 0;
		$countErrorCageB = 0;
		
		$detected = array(); // for calculate by day
		
		$maxTime = 86340;
		$valueTime = 0 ;

		// var_dump($dateReceive); echo "<br/>";
		// var_dump( date("Y-m-d") );  echo "<br/>";
		// var_dump($timeSlide);  echo "<br/>";
		// var_dump(date("H:i"));  echo "<br/>";

		// --------------- Sensor Status ---------------//

		$sensorStatus = array();
		
		$sensorStatus = $this->sensorStatus($sensors);

		//--------------Calculate Sensor Status--------------//
		
		// use only today //

		if(($dateReceive == date("Y-m-d") && $timeSlide == date("H:i")) || ($dateReceive == date("Y-m-d") && $dateReceive!=$previousDate)){
		//	var_dump($sensorStatus);
			// add description
			foreach($sensors as $sensor){	
				//error
				if($sensor->status == 0 ){
					$errorDescription[] = $this->errorMsg($sensor);
					$countErrorAll++;
					if($sensor->nodeId < 7){
						$countErrorCageA++;
					}else
						$countErrorCageB++;
				}

				// detect
				if($sensor->status == 2){
					$detectDescription[] = $this->detectMsg($sensor);
				}
			}

			if($countErrorCageA == 6 ){
				while($countErrorCageA < 1){
					unset($errorDescription[$countErrorCageA-1]);
					$countErrorCageA--;
				}
				$errorDescription[] = "Caution : All sensors in cage \"A\" is Down!!! ";
			}
			if($countErrorCageB == 4 ){
				$errorDescription = array_splice($errorDescription,-4);
				$errorDescription[] = "Caution : All sensors in cage \"B\" is Down!!! ";
			}
			if($countErrorAll == 10){
				$errorDescription = null;
				$errorDescription[] = "Caution : All SENSOR IS DOWN!!! ";
			}

			if($countErrorAll == 0){
				$errorDescription = null;
			}
		}

		//-------------- collect day && calculate status by end time---------------//
	
		else {
			$dataNode = array(); // Get Id,Status,Start Time, End Time, Duration
			// in case data in that day exist
			if(isset($day)){
				// $statusNode = array(); // get id , status
				foreach($day as $whole){ 
					$dataNode[($whole->nodeId)-1][] = array(
						"id" => $whole->nodeId,
						"duration" => $whole->duration,
						"start" => $whole->startTime,
						"end" => $whole->endTime
					);
				}
				// foreach($sensors as $sensor){
				// 	$statusNode[] = $sensor->status;
				// }
			}
			
			if(count($dataNode)>0){
				//*-echo "date Node";
				foreach($dataNode as $node=>$id){
					if(isset($id)){
						foreach($id as $time => $end){
							list($h,$m) = explode(':',date("H:i",strtotime($end['end'])));
							$endTimeToSec = ($h*3600)+($m*60);

							// เก็บตัวที่ Detected by sensor
							if($endTimeToSec-$end['duration']<=$timeReceive && $endTimeToSec>=$timeReceive ){
								$detected[(int)$end['id']-1] = array(
									'id' => (int)$end['id'],
									'status' => 2 ,
									'start' => $end['start'],
									'end' => $end['end'],
									'dur' => $end['duration']
								);
							}
						}
					}
				}
			}
			
			if(count($detected)>0){
				// ------- วันนั้นมีข้อมูลเข้าบ้าง-------//
				//*-echo "detected exist" ;
				$sensorStatus=null;
				$nodeStatusCounter = 1;
				while($nodeStatusCounter <= 10 ){
					if(isset($detected[$nodeStatusCounter-1])){
						// not now where status should be detect
						$sensorStatus[$nodeStatusCounter-1] = $detected[$nodeStatusCounter-1];
					}else{
						// not now where status should be active
						$sensorStatus[$nodeStatusCounter-1] = array(
							// not today
							'id' => (int)($nodeStatusCounter),
							'status' => 1 ,
							'start' => $this->animal_log_model->get_recent_start_time($dateReceive,$timeSlide,$nodeStatusCounter),
							'end' => $this->animal_log_model->get_recent_end_time($dateReceive,$timeSlide,$nodeStatusCounter),
							'dur' => $this->animal_log_model->get_recent_duration($dateReceive,$timeSlide,$nodeStatusCounter)
						);
					}
					$nodeStatusCounter++;
				}
			}
			else{
				// ------- วันนั้นไม่มีข้อมูลเข้าเลย-------//
				// -------Set sensor status ------//
				//*-echo "detected not exist";
				$sensorStatus=null;
				$nodeStatusCounter = 1 ;
				while($nodeStatusCounter <= 10){
					$sensorStatus[($nodeStatusCounter)-1] = array(
						'id' => (int)$nodeStatusCounter,
						'status' => 1 ,
						'start' => $this->animal_log_model->get_recent_start_time($dateReceive,$timeSlide,$nodeStatusCounter),
						'end'  => $this->animal_log_model->get_recent_end_time($dateReceive,$timeSlide,$nodeStatusCounter),
						'dur' => $this->animal_log_model->get_recent_duration($dateReceive,$timeSlide,$nodeStatusCounter)
					);
					$nodeStatusCounter++;
				}
				
			}
			// -------Set ------//
			foreach($detected as $node){
				if($node['id'] == 1)
					$detectDescription[] = "Activity Detected at Sensor 1 (eating area A)";
				else if($node['id'] == 2)
					$detectDescription[] = "Activity Detected at Sensor 2 (Excretory-Area-A1)";
				else if($node['id'] == 3)
					$detectDescription[] = "Activity Detected at Sensor 3 (Excretory-Area-A2)";
				else if($node['id'] == 4)
					$detectDescription[] = "Activity Detected at Sensor 4 (Relaxing-area-1A)";
				else if($node['id'] == 5)
					$detectDescription[] = "Activity Detected at Sensor 5 (Relaxing-area-2A)";
				else if($node['id'] == 6)
					$detectDescription[] = "Activity Detected at Sensor 6 (Relaxing-area-3A)";
				else if($node['id'] == 7)
					$detectDescription[] = "Activity Detected at Sensor 7 (Eating area B)";
				else if($node['id'] == 8)
					$detectDescription[] = "Activity Detected at Sensor 8 (Relaxing-Area-2)";
				else if($node['id'] == 9)
					$detectDescription[] = "Activity Detected at Sensor 9 (Excretory-Area-B)";
				else if($node['id'] == 10)
					$detectDescription[] = "Activity Detected at Sensor 10 (relaxing-area-2B)";
			}

		}

		// -------------------- status logic ---------------- //

		if($timeReceive == date("H:i") && $dateReceive = date("Y-m-d") ){
			//+- echo "first" ;
			// First Time access ??
			// convert H:i to second (Now)
			list($h,$m) = explode(':',date("H:i"));
			$highestTime = ($h*3600)+($m*60);
			$maxTime = $highestTime;
			$valueTime = $highestTime ;

			$this->load->view('_map',array(
				"dateReceive" => $dateReceive,
				"maxTime" => $maxTime,
				"value" => $valueTime,
				"notes" => $detectDescription,
				"errors" => $errorDescription,
				"status" => $sensorStatus
			));

		}else if($dateReceive == date("Y-m-d")){
			//+- echo "today" ;
			// Second Access
			// Today
			if($dateReceive != $previousDate){
				//+- echo "day change" ;
				// day change
				// convert H:i to second (Now)
				list($h,$m) = explode(':',date("H:i"));
				$highestTime = ($h*3600)+($m*60);
 
				$maxTime = $highestTime ;
				$valueTime = $highestTime ;

				$this->load->view('_map',array(
					"dateReceive" => $dateReceive,
					"maxTime" => $maxTime,
					"value" => $valueTime,
					"notes" => $detectDescription,
					"errors" => $errorDescription,
					"status" => $sensorStatus
				));
			}else if($dateReceive == $previousDate ){
				//+- echo "day not change" ;
				// Day not change 
				if( $timeSlide == date('H:i')){
					//+-echo "Time = now" ;
					// Time = Now
					// day change
					// convert H:i to second (Now)
					list($h,$m) = explode(':',date("H:i"));
					$highestTime = ($h*3600)+($m*60);

					$maxTime = $highestTime ;
					$valueTime = $highestTime ;

					$this->load->view('_map',array(
						"dateReceive" => $dateReceive,
						"maxTime" => $maxTime,
						"value" => $valueTime,
						"notes" => $detectDescription,
						"errors" => $errorDescription,
						"status" => $sensorStatus
					));
				}else{
					//+- echo "Time != now" ;
					// day change -> Time != now
					// convert H:i to second (Now)
					list($h,$m) = explode(':',$timeSlide);
					$valueToSec = ($h*3600)+($m*60);

					list($h,$m) = explode(':',date("H:i"));
					$highestTime = ($h*3600)+($m*60);

					$valueTime = $valueToSec ;
					$maxTime = $highestTime ;
					
					$this->load->view('_map',array(
						"dateReceive" => $dateReceive,
						"maxTime" => $maxTime,
						"value" => $valueTime,
						"notes" => $detectDescription,
						"errors" => $errorDescription,
						"status" => $sensorStatus
					));
				}
			}

		} else {
			//+-echo "not today";
			//$dateReceive != date("Y-m-d")
			// Not today
			if($dateReceive == $previousDate){
				//+-echo " day not change";
				// day not change
				list($h,$m) = explode(':',$timeSlide);
				$valueToSec = ($h*3600)+($m*60);

				$valueTime = $valueToSec ;

				$this->load->view('_map',array(
					"dateReceive" => $dateReceive,
					"maxTime" => $maxTime,
					"value" => $valueTime,
					"notes" => $detectDescription,
					"errors" => $errorDescription,
					"status" => $sensorStatus
				));
			}else{
				//+- echo " day change";
				
				$this->load->view('_map',array(
					"dateReceive" => $dateReceive,
					"maxTime" => $maxTime,
					"value" => 0,
					"notes" => $detectDescription,
					"errors" => $errorDescription,
					"status" => $sensorStatus
				));
				
			}
		}
	}

	public function sensorStatus($sensors){
		date_default_timezone_set("Asia/bangkok"); // set timezone
		foreach($sensors as $status){
		
			list($h1,$m1,$s1) = explode(':',date("H:i:s",strtotime($status->startTime)));
			$startT= ($h1*3600)+($m1*60)+$s1;
			list($h2,$m2,$s1) = explode(':',gmdate("H:i:s",strtotime($status->recentTime)));
			$durT= ($h2*3600)+($m2*60)+$s1;

			$sensorStatus[] = array(
				'id' => (int)$status->nodeId,
				'status' => (int)$status->status,
				'start' => $status->startTime,
				'end' => "-" ,
				'dur' => $status->recentTime
			);
		}
		return $sensorStatus ;
	}

	public function detectMsg($sensor){
		if($sensor->nodeId == 1)
			$detectDescription = "Activity Detected at Sensor 1 (eating area A)";
		else if($sensor->nodeId == 2)
			$detectDescription = "Activity Detected at Sensor 2 (Excretory-Area-A1)";
		else if($sensor->nodeId == 3)
			$detectDescription = "Activity Detected at Sensor 3 (Excretory-Area-A2)";
		else if($sensor->nodeId == 4)
			$detectDescription = "Activity Detected at Sensor 4 (Relaxing-area-1A)";
		else if($sensor->nodeId == 5)
			$detectDescription = "Activity Detected at Sensor 5 (Relaxing-area-2A)";
		else if($sensor->nodeId == 6)
			$detectDescription = "Activity Detected at Sensor 6 (Relaxing-area-3A)";
		else if($sensor->nodeId == 7)
			$detectDescription = "Activity Detected at Sensor 7 (Eating area B)";
		else if($sensor->nodeId == 8)
			$detectDescription = "Activity Detected at Sensor 8 (Relaxing-Area-2)";
		else if($sensor->nodeId == 9)
			$detectDescription = "Activity Detected at Sensor 9 (Excretory-Area-B)";
		else if($sensor->nodeId == 10)
			$detectDescription = "Activity Detected at Sensor 10 (Relaxing-area-2)";
	
		return $detectDescription;
	}

	public function errorMsg($sensor){
		$errorDescription = "Sensor Number".$sensor->nodeId." is Down!!";

		return	$errorDescription;
	}
	
}

