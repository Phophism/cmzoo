<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller {

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

		$timeSlide = gmdate("H:i",$timeReceive);

		if($dateReceive==null && $timeReceive==null /*&& $cageA==null && $cageB==null*/){
			$dateReceive = date("Y-m-d");
			$previousDate = date("Y-m-d");
			$timeReceive = date("H:i");
			$timeSlide = date("H:i");
		}else{
			$dateReceive = date("Y-m-d",strtotime($dateReceive));
			$timeSlide = gmdate("H:i",$timeReceive);
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
		foreach($sensors as $status){
		
			list($h1,$m1,$s1) = explode(':',date("H:i:s",strtotime($status->startTime)));
			$startT= ($h1*3600)+($m1*60)+$s1;
			list($h2,$m2,$s1) = explode(':',gmdate("H:i:s",strtotime($status->recentTime)));
			$durT= ($h2*3600)+($m2*60)+$s1;

			$sensorStatus[] = array(
				'id' => (int)$status->status,
				'startT' => date("H:i",strtotime($status->startTime)),
				'endT' => $durT + $startT ,
				'dur' => date("H:i",strtotime($status->recentTime))
			);
		}
		var_dump($sensorStatus);


		//--------------Calculate Sensor Status--------------//
		

		if($dateReceive == date("Y-m-d") && $timeSlide == date("H:i")){
			// add description
			foreach($sensors as $sensor){	
				//error
				if($sensor->status == 0 ){
					$errorDescription[] = "Sensor Number".$sensor->nodeId." is Down!!";
					$countErrorAll++;
					if($sensor->nodeId < 7){
						$countErrorCageA++;
					}else
						$countErrorCageB++;
				}

				// detect
				if($sensor->status == 2){
					if($sensor->nodeId == 1)
						$detectDescription[] = "Activity Detected at Sensor 1 (eating area A)";
					else if($sensor->nodeId == 2)
						$detectDescription[] = "Activity Detected at Sensor 2 (Excretory-Area-A1)";
					else if($sensor->nodeId == 3)
						$detectDescription[] = "Activity Detected at Sensor 3 (Excretory-Area-A2)";
					else if($sensor->nodeId == 4)
						$detectDescription[] = "Activity Detected at Sensor 4 (Relaxing-area-1A)";
					else if($sensor->nodeId == 5)
						$detectDescription[] = "Activity Detected at Sensor 5 (Relaxing-area-2A)";
					else if($sensor->nodeId == 6)
						$detectDescription[] = "Activity Detected at Sensor 6 (Relaxing-area-3A)";
					else if($sensor->nodeId == 7)
						$detectDescription[] = "Activity Detected at Sensor 7 (Eating area B)";
					else if($sensor->nodeId == 8)
						$detectDescription[] = "Activity Detected at Sensor 8 (Relaxing-Area-2)";
					else if($sensor->nodeId == 9)
						$detectDescription[] = "Activity Detected at Sensor 9 (Excretory-Area-B)";
					else if($sensor->nodeId == 10)
						$detectDescription[] = "Activity Detected at Sensor 10 (Relaxing-area-2)";
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
				$errorDescription=array_splice($errorDescription,-4);
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

			if(isset($day)){
				$dataNode = array(); // Get Id,Status,Start Time, End Time, Duration
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
			
			if(isset($dataNode)){
				foreach($dataNode as $node=>$id){
					if(isset($id)){
						foreach($id as $time => $end){
							list($h,$m) = explode(':',date("H:i",strtotime($end['end'])));
							$endTimeToSec = ($h*3600)+($m*60);
							if($endTimeToSec-$end['duration']<=$timeReceive && $endTimeToSec>=$timeReceive ){
								$detected[] = array(
									'id' => (int)$end['id'],
									'start' => $end['start'],
									'end' => $end['end'],
									"dur" => $end['duration']
								);
								
							}
						}
					}
				}
			}
		
			unset($sensorStatus);
			$nodeStatusCounter = 0;
			while($nodeStatusCounter < 10){
				$sensorStatus[] = 1 ;
				$nodeStatusCounter++;
			}
			
			if(isset($detected)){
				foreach($detected as $node){
					$sensorStatus[($node['id'])-1] = 2 ;
				}
			}

		  	var_dump($sensorStatus);"<hr/>";
			foreach($detected as $node){
				var_dump($node) ; echo "<br/>";
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
			echo "first" ;
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
			echo "today" ;
			// Second Access
			// Today
			if($dateReceive != $previousDate){
				echo "day change" ;
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
				echo "day not change" ;
				// Day not change 
				if( $timeSlide == date('H:i')){
					echo "Time = now" ;
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
					echo "Time != now" ;
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
			echo "not today";
			//$dateReceive != date("Y-m-d")
			// Not today
			if($dateReceive == $previousDate){
				echo " day not change";
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
				echo " day change";
				
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
	}
}

