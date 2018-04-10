<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daynight extends CI_Controller {

	public function index(){
		$this->load->model('animal_log_model');
		$dateReceive = $this->input->post('datepicker');
		$cageReceive = $this->input->post('cageselect');
	

		if($dateReceive==null && $cageReceive==null){
			$dateReceive = date("Y-m-d");
			$cageReceive = "on";
		}else{
			$dateReceive = date("Y-m-d",strtotime($dateReceive));
		}	
		
		echo "datechange";
		$dateReceive = date("Y-m-d",strtotime($dateReceive));
		$this->load->model('animal_log_model');

		$sdSetDay =  $this->animal_log_model->get_data_set_month_day($dateReceive);
		$sdSetNight =  $this->animal_log_model->get_data_set_month_night($dateReceive);
		$meanSetDay =  $this->animal_log_model->get_data_set_month_day($dateReceive);
		$meanSetNight =  $this->animal_log_model->get_data_set_month_night($dateReceive);
		$day = $this->animal_log_model->get_data_by_date_day($dateReceive);
		$night = $this->animal_log_model->get_data_by_date_night($dateReceive);
		

		$minA = 1; // First node of cage A
		$maxA = 6; // Last node of cage A
		$minB = 7; // First node of cage B
		$maxB = 10; // Last node of cage 

		// ------------------ Total / Percen ------------------ //

		//send id of DayA/DayB/NightA/NightB
		// Day A
		if(isset($day)){
			$dayNodeA = array();
			$dayNodeB = array();
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
		}else{
			$dayNodeA = array();
			$dayNodeB = array();
		}

		// Night A/B
		if(isset($night)){
			$nightNodeA = array();
			$nightNodeB = array();
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
		}else{
			$nightNodeA = array();
			$nightNodeB = array();
		}
			

		// -------------------- Mean / SD ----------------- //

			if(isset($meanSetDay)){
				$monthCountD1 = array();
				$monthCountD2 = array();
				$monthCountD3 = array();
				$monthCountD4 = array();
				$monthCountD5 = array();
				$monthCountD6 = array();
				$monthCountD7 = array();
				$monthCountD8 = array();
				$monthCountD9 = array();
				$monthCountD10 = array();
				
				foreach($meanSetDay as $node=>$datas){
					$countDayMonthA = 0 ;
					$countDayMonthB = 0;
					if(isset($datas)){
						$dayMonthA = array();
						$dayMonthB = array();
						foreach($datas as $data ){
							if(isset($data)){
								if(($data->nodeId >= $minA)&&($data->nodeId <= $maxA)){
									$dayMonthA[] = array(
										'id' => $data->nodeId // A
									) ;
								}
								else if(($data->nodeId >= $minB)&&($data->nodeId <= $maxB)){
									$dayMonthB[] = array(
										'id' => $data->nodeId // B
									) ;
								}	
							}else{
								$dayMonthA[]=0;
								$dayMonthB[]=0;
							}
						}
					}else{
						$dayMonthA[]=0;
						$dayMonthB[]=0;
					}
				
					if(count($dayMonthA)!=0)	
						$countDayMonthA = array_count_values(array_column($dayMonthA,'id'));
				
					if(count($dayMonthB)!=0)
						$countDayMonthB = array_count_values(array_column($dayMonthB,'id'));
					

					if(isset($countDayMonthA['1']))
						$monthCountD1[] = $countDayMonthA['1'];
					else
						$monthCountD1[] = 0 ;		
					
					if(isset($countDayMonthA['2']))
						$monthCountD2[] = $countDayMonthA['2'];
					else	
						$monthCountD2[] = 0 ; 
		
					if(isset($countDayMonthA['3']))
						$monthCountD3[] = $countDayMonthA['3'];
					else	
						$monthCountD3[] = 0 ; 
		
					if(isset($countDayMonthA['4']))
						$monthCountD4[] = $countDayMonthA['4'];
					else	
						$monthCountD4[] = 0 ; 
		
					if(isset($countDayMonthA['5']))
						$monthCountD5[] = $countDayMonthA['5'];
					else	
						$monthCountD5[] = 0 ; 

					if(isset($countDayMonthA['6']))
						$monthCountD6[] = $countDayMonthA['6'];
					else	
						$monthCountD6[] = 0;

					if(isset($countDayMonthB['7']))
						$monthCountD7[] = $countDayMonthB['7'];
					else	
						$monthCountD7[] = 0;

					if(isset($countDayMonthB['8']))
						$monthCountD8[] = $countDayMonthB['8'];
					else	
						$monthCountD8[] = 0;

					if(isset($countDayMonthB['9']))
						$monthCountD9[] = $countDayMonthB['9'];
					else	
						$monthCountD9[] = 0;

					if(isset($countDayMonthB['10']))
						$monthCountD10[] = $countDayMonthB['10'];
					else	
						$monthCountD10[] = 0;
						
				}
				$maxD1 = max($monthCountD1);
				$maxD2 = max($monthCountD2);
				$maxD3 = max($monthCountD3);
				$maxD4 = max($monthCountD4);
				$maxD5 = max($monthCountD5);
				$maxD6 = max($monthCountD6);
				$maxD7 = max($monthCountD7);
				$maxD8 = max($monthCountD8);
				$maxD9 = max($monthCountD9);
				$maxD10 = max($monthCountD10);

				$minD1 = min($monthCountD1);
				$minD2 = min($monthCountD2);
				$minD3 = min($monthCountD3);
				$minD4 = min($monthCountD4);
				$minD5 = min($monthCountD5);
				$minD6 = min($monthCountD6);
				$minD7 = min($monthCountD7);
				$minD8 = min($monthCountD8);
				$minD9 = min($monthCountD9);
				$minD10 = min($monthCountD10);

				$meanD1 = round(((array_sum($monthCountD1))/30),3);			
				$meanD2 = round(((array_sum($monthCountD2))/30),3);				
				$meanD3 = round(((array_sum($monthCountD3))/30),3);				
				$meanD4 = round(((array_sum($monthCountD4))/30),3);				
				$meanD5 = round(((array_sum($monthCountD5))/30),3);					
				$meanD6 = round(((array_sum($monthCountD6))/30),3);						
				$meanD7 = round(((array_sum($monthCountD7))/30),3);					
				$meanD8 = round(((array_sum($monthCountD8))/30),3);					
				$meanD9 = round(((array_sum($monthCountD9))/30),3);			
				$meanD10 = round(((array_sum($monthCountD10))/30),3);			
			}

			// --------- Night ---------- //

			if(isset($meanSetNight)){
				$monthCountN1 = array();
				$monthCountN2 = array();
				$monthCountN3 = array();
				$monthCountN4 = array();
				$monthCountN5 = array();
				$monthCountN6 = array();
				$monthCountN7 = array();
				$monthCountN8 = array();
				$monthCountN9 = array();
				$monthCountN10 = array();
				
				foreach($meanSetNight as $node=>$datas){
					$countNightMonthA = 0 ;
					$countNightMonthB = 0;
					if(isset($datas)){
						$nightMonthA = array();
						$nightMonthB = array();
						foreach($datas as $data ){
							if(isset($data)){
								if(($data->nodeId >= $minA)&&($data->nodeId <= $maxA)){
									$nightMonthA[] = array(
										'id' => $data->nodeId // A
									) ;
								}
								else if(($data->nodeId >= $minB)&&($data->nodeId <= $maxB)){
									$nightMonthB[] = array(
										'id' => $data->nodeId // B
									) ;
								}	
							}else{
								$nightMonthA[]=0;
								$nightMonthB[]=0;
							}
						}
					}else{
						$nightMonthA[]=0;
						$nightMonthB[]=0;
					}
				
					if(count($nightMonthA)!=0)	
						$countNightMonthA = array_count_values(array_column($nightMonthA,'id'));
				
					if(count($nightMonthB)!=0)
						$countNightMonthB = array_count_values(array_column($nightMonthB,'id'));
					

					if(isset($countNightMonthA['1']))
						$monthCountN1[] = $countNightMonthA['1'];
					else
						$monthCountN1[] = 0 ;		
					
					if(isset($countNightMonthA['2']))
						$monthCountN2[] = $countNightMonthA['2'];
					else	
						$monthCountN2[] = 0 ; 
		
					if(isset($countNightMonthA['3']))
						$monthCountN3[] = $countNightMonthA['3'];
					else	
						$monthCountN3[] = 0 ; 
		
					if(isset($countNightMonthA['4']))
						$monthCountN4[] = $countNightMonthA['4'];
					else	
						$monthCountN4[] = 0 ; 
		
					if(isset($countNightMonthA['5']))
						$monthCountN5[] = $countNightMonthA['5'];
					else	
						$monthCountN5[] = 0 ; 

					if(isset($countNightMonthA['6']))
						$monthCountN6[] = $countNightMonthA['6'];
					else	
						$monthCountN6[] = 0;

					if(isset($countNightMonthB['7']))
						$monthCountN7[] = $countNightMonthB['7'];
					else	
						$monthCountN7[] = 0;

					if(isset($countNightMonthB['8']))
						$monthCountN8[] = $countNightMonthB['8'];
					else	
						$monthCountN8[] = 0;

					if(isset($countNightMonthB['9']))
						$monthCountN9[] = $countNightMonthB['9'];
					else	
						$monthCountN9[] = 0;

					if(isset($countNightMonthB['10']))
						$monthCountN10[] = $countNightMonthB['10'];
					else	
						$monthCountN10[] = 0;
						
				}
				$maxN1 = max($monthCountN1);
				$maxN2 = max($monthCountN2);
				$maxN3 = max($monthCountN3);
				$maxN4 = max($monthCountN4);
				$maxN5 = max($monthCountN5);
				$maxN6 = max($monthCountN6);
				$maxN7 = max($monthCountN7);
				$maxN8 = max($monthCountN8);
				$maxN9 = max($monthCountN9);
				$maxN10 = max($monthCountN10);

				$minN1 = min($monthCountN1);
				$minN2 = min($monthCountN2);
				$minN3 = min($monthCountN3);
				$minN4 = min($monthCountN4);
				$minN5 = min($monthCountN5);
				$minN6 = min($monthCountN6);
				$minN7 = min($monthCountN7);
				$minN8 = min($monthCountN8);
				$minN9 = min($monthCountN9);
				$minN10 = min($monthCountN10);

				$meanN1 = round(((array_sum($monthCountN1))/30),3);				
				$meanN2 = round(((array_sum($monthCountN2))/30),3);				
				$meanN3 = round(((array_sum($monthCountN3))/30),3);				
				$meanN4 = round(((array_sum($monthCountN4))/30),3);				
				$meanN5 = round(((array_sum($monthCountN5))/30),3);			
				$meanN6 = round(((array_sum($monthCountN6))/30),3);				
				$meanN7 = round(((array_sum($monthCountN7))/30),3);				
				$meanN8 = round(((array_sum($monthCountN8))/30),3);			
				$meanN9 = round(((array_sum($monthCountN9))/30),3);		
				$meanN10 = round(((array_sum($monthCountN10))/30),3);	

			}

			$maxD = array(
				$maxD1,
				$maxD2,
				$maxD3,
				$maxD4,
				$maxD5,
				$maxD6,
				$maxD7,
				$maxD8,
				$maxD9,
				$maxD10,
			);

			$minD = array(
				$minD1,
				$minD2,
				$minD3,
				$minD4,
				$minD5,
				$minD6,
				$minD7,
				$minD8,
				$minD9,
				$minD10,
			);

			$meanD = array(
				$meanD1,
				$meanD2,
				$meanD3,
				$meanD4,
				$meanD5,
				$meanD6,
				$meanD7,
				$meanD8,
				$meanD9,
				$meanD10,
			);

			$maxN = array(
				$maxN1,
				$maxN2,
				$maxN3,
				$maxN4,
				$maxN5,
				$maxN6,
				$maxN7,
				$maxN8,
				$maxN9,
				$maxN10,
			);

			$minN = array(
				$minN1,
				$minN2,
				$minN3,
				$minN4,
				$minN5,
				$minN6,
				$minN7,
				$minN8,
				$minN9,
				$minN10,
			);

			$meanN = array(
				$meanN1,
				$meanN2,
				$meanN3,
				$meanN4,
				$meanN5,
				$meanN6,
				$meanN7,
				$meanN8,
				$meanN9,
				$meanN10,
			);

			// -----------------SD-----------------//

			
			if(isset($sdSetDay)){
				$count = count($sdSetDay)-1;
				$variance = 0.0;
				foreach($monthCountD1 as $d1){
					$deviation = ((double)$d1)-$meanD1;
					$variance += $deviation * $deviation;
				}
				$sdD1 = sqrt($variance/$count);

				$variance = 0.0;
				foreach($monthCountD2 as $d2){
					$deviation = ((double)$d2)-$meanD2;
					$variance += $deviation * $deviation;
				}
				$sdD2 = sqrt($variance/$count);

				$variance = 0.0;
				foreach($monthCountD3 as $d3){
					$deviation = ((double)$d3)-$meanD3;
					$variance += $deviation * $deviation;
				}
				$sdD3 = sqrt($variance/$count);

				$variance = 0.0;
				foreach($monthCountD4 as $d4){
					$deviation = ((double)$d4)-$meanD4;
					$variance += $deviation * $deviation;
				}
				$sdD4 = sqrt($variance/$count);

				$variance = 0.0;
				foreach($monthCountD5 as $d5){
					$deviation = ((double)$d5)-$meanD5;
					$variance += $deviation * $deviation;
				}
				$sdD5 = sqrt($variance/$count);

				$variance = 0.0;
				foreach($monthCountD1 as $d6){
					$deviation = ((double)$d6)-$meanD6;
					$variance += $deviation * $deviation;
				}
				$sdD6 = sqrt($variance/$count);

				$variance = 0.0;
				foreach($monthCountD7 as $d7){
					$deviation = ((double)$d7)-$meanD7;
					$variance += $deviation * $deviation;
				}
				$sdD7 = sqrt($variance/$count);

				$variance = 0.0;
				foreach($monthCountD8 as $d8){
					$deviation = ((double)$d8)-$meanD8;
					$variance += $deviation * $deviation;
				}
				$sdD8 = sqrt($variance/$count);

				$variance = 0.0;
				foreach($monthCountD9 as $d9){
					$deviation = ((double)$d9)-$meanD9;
					$variance += $deviation * $deviation;
				}
				$sdD9 = sqrt($variance/$count);

				$variance = 0.0;
				foreach($monthCountD10 as $d10){
					$deviation = ((double)$d10)-$meanD10;
					$variance += $deviation * $deviation;
				}
				$sdD10 = sqrt($variance/$count);

			}
			if(isset($sdSetNight)){
				$count = count($sdSetNight)-1;
				$variance = 0.0;
				foreach($monthCountN1 as $n1){
					$deviation = ((double)$n1)-$meanN1;
					$variance += $deviation * $deviation;
				}
				$sdN1 = sqrt($variance/$count);

				$variance = 0.0;
				foreach($monthCountN2 as $n2){
					$neviation = ((double)$n2)-$meanN2;
					$variance += $deviation * $deviation;
				}
				$sdN2 = sqrt($variance/$count);

				$variance = 0.0;
				foreach($monthCountN3 as $n3){
					$deviation = ((double)$n3)-$meanN3;
					$variance += $deviation * $deviation;
				}
				$sdN3 = sqrt($variance/$count);

				$variance = 0.0;
				foreach($monthCountN4 as $n4){
					$deviation = ((double)$n4)-$meanN4;
					$variance += $deviation * $deviation;
				}
				$sdN4 = sqrt($variance/$count);

				$variance = 0.0;
				foreach($monthCountN5 as $n5){
					$deviation = ((double)$n5)-$meanN5;
					$variance += $deviation * $deviation;
				}
				$sdN5 = sqrt($variance/$count);

				$variance = 0.0;
				foreach($monthCountN1 as $n6){
					$deviation = ((double)$n6)-$meanN6;
					$variance += $deviation * $deviation;
				}
				$sdN6 = sqrt($variance/$count);

				$variance = 0.0;
				foreach($monthCountN7 as $n7){
					$deviation = ((double)$n7)-$meanN7;
					$variance += $deviation * $deviation;
				}
				$sdN7 = sqrt($variance/$count);

				$variance = 0.0;
				foreach($monthCountN8 as $n8){
					$deviation = ((double)$n8)-$meanN8;
					$variance += $deviation * $deviation;
				}
				$sdN8 = sqrt($variance/$count);

				$variance = 0.0;
				foreach($monthCountN9 as $n9){
					$deviation = ((double)$n9)-$meanN9;
					$variance += $deviation * $deviation;
				}
				$sdN9 = sqrt($variance/$count);

				$variance = 0.0;
				foreach($monthCountN10 as $n10){
					$deviation = ((double)$n10)-$meanN10;
					$variance += $deviation * $deviation;
				}
				$sdN10 = sqrt($variance/$count);

			}
			
			$sdD = array(
				$sdD1,
				$sdD2,
				$sdD3,
				$sdD4,
				$sdD5,
				$sdD6,
				$sdD7,
				$sdD8,
				$sdD9,
				$sdD10
			);

			$sdN = array(
				$sdN1,
				$sdN2,
				$sdN3,
				$sdN4,
				$sdN5,
				$sdN6,
				$sdN7,
				$sdN8,
				$sdN9,
				$sdN10
			);


			$this->load->view('_daynight',
				array(
					"logDayA" => $dayNodeA,
					"logNightA" => $nightNodeA,
					"logDayB" => $dayNodeB,
					"logNightB" => $nightNodeB,
					"dateReceive" => $dateReceive,
					"cageReceive" => $cageReceive,
					"meanD" => $meanD,
					"meanN" => $meanN,
					"maxD" => $maxD , 
					"maxN" => $maxN,
					"minD" => $minD,
					"minN" => $minN,
					"sdD" => $sdD,
					"sdN" => $sdN
				)
			);
		
	}

}
