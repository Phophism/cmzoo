<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daynight extends CI_Controller {

	public function index(){
		date_default_timezone_set("Asia/Bangkok"); 
		
		$this->load->model('animal_log_model');
		$dateReceive = $this->input->post('datepicker');
		$cageReceive = $this->input->post('cageselect');

		if($dateReceive==null && $cageReceive==null){
			$dateReceive = date("Y-m-d");
			$cageReceive = "on";
		}else{
			if($dateReceive > date("Y-m-d")){
				$dateReceive = date("Y-m-d") ;
			}else{
				$dateReceive = date("Y-m-d",strtotime($dateReceive));
			}
		}	

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
		// Day A/B
		if(isset($day)){
			$dayNodeA = $this->dayIdA($day,$minA,$maxA);
			$dayNodeB = $this->dayIdB($day,$minB,$maxB);
		}else{
			$dayNodeA = array();
			$dayNodeB = array();
		}

		// Night A/B
		if(isset($night)){
			$nightNodeA = $this->nightIdA($night,$minA,$maxA);
			$nightNodeB = $this->nightIdB($night,$minB,$maxB);
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
						foreach($datas as $data){
							if(isset($data)){
								if(($data->nodeId >= $minA)&&($data->nodeId <= $maxA)){
									$dayMonthA[]= $this->activityMonth($data);
								}
								else if(($data->nodeId >= $minB)&&($data->nodeId <= $maxB)){
									$dayMonthB[]= $this->activityMonth($data);
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
						$countDayMonthA = array_count_values($dayMonthA);
					if(count($dayMonthB)!=0)
						$countDayMonthB = array_count_values($dayMonthB);
					

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

				$meanD1 = $this->mean($monthCountD1)	;
				$meanD2 = $this->mean($monthCountD2)	;		
				$meanD3 = $this->mean($monthCountD3)	;	
				$meanD4 = $this->mean($monthCountD4)	;	
				$meanD5 = $this->mean($monthCountD5)	;		
				$meanD6 = $this->mean($monthCountD6)	;					
				$meanD7 = $this->mean($monthCountD7)	;					
				$meanD8 = $this->mean($monthCountD8)	;					
				$meanD9 = $this->mean($monthCountD9)	;		
				$meanD10 = $this->mean($monthCountD10)	;			
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
									$nightMonthA[]= $this->activityMonth($data);
								}
								else if(($data->nodeId >= $minB)&&($data->nodeId <= $maxB)){
									$nightMonthB[]= $this->activityMonth($data);
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
						$countNightMonthA = array_count_values($nightMonthA);
				
					if(count($nightMonthB)!=0)
						$countNightMonthB = array_count_values($nightMonthB);
				

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

				$meanN1 = $this->mean($monthCountN1)	;		
				$meanN2 = $this->mean($monthCountN2)	;				
				$meanN3 = $this->mean($monthCountN3)	;				
				$meanN4 = $this->mean($monthCountN4)	;
				$meanN5 = $this->mean($monthCountN5)	;
				$meanN6 = $this->mean($monthCountN6)	;			
				$meanN7 = $this->mean($monthCountN7)	;		
				$meanN8 = $this->mean($monthCountN8)	;
				$meanN9 = $this->mean($monthCountN9)	;
				$meanN10 = $this->mean($monthCountN10)	;
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
				$sdD1 = $this->sd($sdSetDay,$meanD1,$monthCountD1) ;
				$sdD2 = $this->sd($sdSetDay,$meanD2,$monthCountD2) ;
				$sdD3 = $this->sd($sdSetDay,$meanD3,$monthCountD3) ;
				$sdD4 = $this->sd($sdSetDay,$meanD4,$monthCountD4) ;
				$sdD5 = $this->sd($sdSetDay,$meanD5,$monthCountD5) ;
				$sdD6 = $this->sd($sdSetDay,$meanD6,$monthCountD6) ;
				$sdD7 = $this->sd($sdSetDay,$meanD7,$monthCountD7) ;
				$sdD8 = $this->sd($sdSetDay,$meanD8,$monthCountD8) ;
				$sdD9 = $this->sd($sdSetDay,$meanD9,$monthCountD9) ;
				$sdD10 = $this->sd($sdSetDay,$meanD10,$monthCountD10) ;
			}

			if(isset($sdSetNight)){
				$sdN1 = $this->sd($sdSetNight,$meanN1,$monthCountN1) ;
				$sdN2 = $this->sd($sdSetNight,$meanN2,$monthCountN2) ;
				$sdN3 = $this->sd($sdSetNight,$meanN3,$monthCountN3) ;
				$sdN4 = $this->sd($sdSetNight,$meanN4,$monthCountN4) ;
				$sdN5 = $this->sd($sdSetNight,$meanN5,$monthCountN5) ;
				$sdN6 = $this->sd($sdSetNight,$meanN6,$monthCountN6) ;
				$sdN7 = $this->sd($sdSetNight,$meanN7,$monthCountN7) ;
				$sdN8 = $this->sd($sdSetNight,$meanN8,$monthCountN8) ;
				$sdN9 = $this->sd($sdSetNight,$meanN9,$monthCountN9) ;
				$sdN10 = $this->sd($sdSetNight,$meanN10,$monthCountN10) ;

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


	public function dayIdA($day,$min,$max){
		$dayNodeA = array();
		foreach($day as $node){
			if(($node->nodeId >= $min)&&($node->nodeId <= $max)){
				$dayNodeA[] = array(
					'id' => $node->nodeId // A
				);
			}
		}
		return $dayNodeA ;
	}

	public function dayIdB($day,$min,$max){
		$dayNodeB = array();
		foreach($day as $node){
			if(($node->nodeId >= $min)&&($node->nodeId <= $max)){
				$dayNodeB[] = array(
					'id' => $node->nodeId // B
				) ;
			}	
		}
		return $dayNodeB ;
	}
	
	public function nightIdA($night,$min,$max){
		$nightNodeA = array();
		foreach($night as $node){
			if(($node->nodeId >= $min)&&($node->nodeId <= $max)){
				$nightNodeA[] = array(
					'id' => $node->nodeId //A
				) ;
			}
		}
		return $nightNodeA ;
	}

	public function nightIdB($night,$min,$max){
		$nightNodeB = array();
		foreach($night as $node){
			if(($node->nodeId >= $min)&&($node->nodeId <= $max)){
				$nightNodeB[] = array(
					'id' => $node->nodeId //B
				) ;
			}	
		}
		return $nightNodeB ;
	} 
	
	
	public function activityMonth($dayData){
		$dayMonthA = array(
			'id' => $dayData->nodeId // A
		) ;
		return $dayMonthA['id'] ;
	}

	public function mean($monthCount){
		$mean = round(((array_sum($monthCount))/30),3);	
		return $mean ;
	}

	public function sd($sdSetDay,$mean,$monthCount){
		$count = count($sdSetDay)-1;
		$variance = 0.0;
		foreach($monthCount as $d){
			$deviation = ((double)$d)-$mean;
			$variance += $deviation * $deviation;
		}
		$sd = sqrt($variance/$count);

		return $sd ;
	}

}
