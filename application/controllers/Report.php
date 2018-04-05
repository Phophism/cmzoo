<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function index(){
		$this->load->helper('array');
		$this->load->model('animal_log_model');
		$datepicker = $this->input->post('datepicker');
		var_dump($datepicker);
		if($datepicker==null){
			$this->load->view('_dailyreport');
		}else{
			$datepicker = date("Y-m-d",strtotime($datepicker));
			$day = $this->animal_log_model->get_data_by_date($datepicker);
			
			if(isset($day)){
				$duration = array("01:00:00","02:00:00","03:00:00","04:00:00","05:00:00","06:00:00","07:00:00","08:00:00","09:00:00","10:00:00","11:00:00","12:00:00","13:00:00","14:00:00","15:00:00","16:00:00","17:00:00","18:00:00","19:00:00","20:00:00","21:00:00","22:00:00","23:00:00","23:59:00");
				$periodCount = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
				$nodeCount = array(0,0,0,0,0,0,0,0,0,0);
				$nodeDuration = array();
		
				foreach($day as $whole){ 
					$countDur = 0;	
					$whole->startTime = date("H:i:s",strtotime($whole->startTime));
					
					
					// if($whole->startTime == date("H:i:s",strtotime("00:00:00"))){
					// 	$periodCount[0] += 1;
					// 	$nodeCount[($whole->nodeId)-1] +=1; 
					// 	$nodeDuration[($whole->nodeId)-1]['nodeDur'][] =$duration[0];
					// 	var_dump("A");
					// }
					// else 
					if($whole->startTime < date("H:i:s",strtotime($duration[0]))){
						$periodCount[0] += 1;
						$nodeCount[($whole->nodeId)-1] +=1; 
						$nodeDuration[($whole->nodeId)-1]['nodeDur'][] =$duration[0];
						var_dump("B");
					}
					
					
					while($countDur<23){
						if($whole->startTime < date("H:i:s",strtotime($duration[$countDur+1])) && $whole->startTime >= date("H:i:s",strtotime($duration[$countDur]))){
							$periodCount[$countDur+1]++;
							$nodeCount[($whole->nodeId)-1]++;
							$nodeDuration[($whole->nodeId)-1]['nodeDur'][] = $duration[$countDur+1]; 
						}
						$countDur++;
					
					}
				}
				
	
	
				// ****** amount ******
				$amountAll = count($day);
				$amountCageA = 
					$nodeCount[0]+
					$nodeCount[1]+
					$nodeCount[2]+
					$nodeCount[3]+
					$nodeCount[4]+
					$nodeCount[5]
				;
				$amountCageB = 
					$nodeCount[6]+
					$nodeCount[7]+
					$nodeCount[8]+
					$nodeCount[9]
				;
				$amountNode = $nodeCount;
echo "<pre>";
				//var_dump($whole->startTime < date("H:i:s",strtotime($duration[0])));
echo "</pre>";
			// -----------------Percentage----------------- //
			
				if(count($day)!= 0 ){
					// ******** Percentage Cage A/B ******** //
					$percentageA = round((($amountCageA*100)/$amountAll),2)." %";
					$percentageB = round((($amountCageB*100)/$amountAll),2)." %";
					// ดัก divide by 0 ด้วย

					// ******** Percentage Node ********** //
					$percentageNode = array();
					$countPercenNode = 0 ;
					while($countPercenNode<10){
						$percentageNode[] = round((($nodeCount[$countPercenNode]*100)/$amountAll),2)." %";
						$countPercenNode++;
					}
				}else{
					$percentageA = Null ;
					$percentageB = Null	;
					$percentageNode = Null ;
				}

			// ------------------Mean------------------//

				if(count($day)!=0){
					// ****** Mean whole ******
					$meanWhole = round((count($day)/24),2);
					// ****** Mean Cage ********

					$i=0;
					$meanCageA = 0;
					$meanCageB = 0;
					
					while($i<6){
						$meanCageA += $nodeCount[$i];
						$i++;
					}
					if($meanCageA == 0 )
						$meanCageA = round(($meanCageA/24),3) ; // total in "A" divide by 24 hr -> get mean , decimal = 3 
					
					while($i<10){
						$meanCageB += $nodeCount[$i];
						$i++;
					}
					if($meanCageB == 0 )
						$meanCageB = round(($meanCageB/24),3) ; // total in "A" divide by 24 hr -> get mean , decimal = 3 

					// ***** mean sensor(node) ******
					
					$meanNode = array(
						$nodeCount[0]/24,
						$nodeCount[1]/24,
						$nodeCount[2]/24,
						$nodeCount[3]/24,
						$nodeCount[4]/24,
						$nodeCount[5]/24,
						$nodeCount[6]/24,
						$nodeCount[7]/24,
						$nodeCount[8]/24,
						$nodeCount[9]/24
					);

					$j = 0 ;
					while($j < 10){
						if($meanNode[$j] != 0)
							$meanNode[$j] = round(($meanNode[$j]/24),3) ;
						else
							$meanNode[$j] = "N/A"; 
						$j++ ;	
					}
				}else{
					$meanWhole = 0;
					$meanCageA = 0; 
					$meanCageB = 0;
					$meanNode = 0;
				}



				// -------------------period---------------- //

				// ****Most Active Period - System**** //
				$mostActivePeriod = $duration[array_search(max($periodCount),$periodCount)];
				$mostActivePeriod = date("H:i",strtotime($mostActivePeriod)-3600)." - ".date("H:i",strtotime($mostActivePeriod));

				$mostActivePeriodPerNode = array();
				$activePeriodCount = 0;
				while($activePeriodCount<10){
					if(isset($nodeDuration[$activePeriodCount])){
						$mostActivePeriodPerNode[] = array_count_values($nodeDuration[$activePeriodCount]['nodeDur']);
						foreach($mostActivePeriodPerNode as $periodPernode){
							$periodPernode = (int)$periodPernode;
						}
					}else
						$mostActivePeriodPerNode[] = null;	
					$activePeriodCount++;
				}

				// ระบบจะแยกเวลาออกเป็นจำนวนๆ 
				// เหลือหาจำนวนที่มากที่สุด
				// ใช้ var_dump($mostActivePeriodPerNode); ดู

				// **** Most Active Peroid separated by sensors **** //
				$setMost = 0;
				$mostPeriodNode = array(); 
				while($setMost<10){
					if(isset($mostActivePeriodPerNode[$setMost])){
						$mostPeriodNode[] = 
							array_search(
								max($mostActivePeriodPerNode[$setMost]),
								$mostActivePeriodPerNode[$setMost]
							
							);
					}else
						$mostPeriodNode[$setMost] = null;
					$setMost++;
				}

				// **** Most Active Peroid in Cage A **** //
				$mostPeriodFromA = array();
				$countPeriodA = 0;
				while($countPeriodA < 6){
					$mostPeriodFromA[] = $mostPeriodNode[$countPeriodA];
					$countPeriodA++;
				}
				$mostPeriodA =	$mostPeriodNode[
											array_search(
												max($mostPeriodFromA),$mostPeriodFromA
											)
										]
									;								
				if($mostPeriodA == $duration[23])
				$mostPeriodA = date("H:i",strtotime($mostPeriodA)-3599). " - " . date("H:i",strtotime($mostPeriodA)); // Most A
				else
					$mostPeriodA = date("H:i",strtotime($mostPeriodA)-3600). " - " . date("H:i",strtotime($mostPeriodA)); // Most A
				

				// **** Most Active Peroid in Cage B **** //	
				$mostPeriodFromB = array();
				$countPeriodB = 6;
				while($countPeriodB < 10){
					$mostPeriodFromB[] = $mostPeriodNode[$countPeriodB];
					$countPeriodB++;
				}
				$mostPeriodB =	$mostPeriodNode[
											array_search(
												max($mostPeriodFromB),$mostPeriodFromB
											)
										]
									;								
				$mostPeriodB = date("H:i",strtotime($mostPeriodB)-3600). " - " . date("H:i",strtotime($mostPeriodB)); // Most B
				


			// --------------------node-------------------- //

				$mostActiveNode = array_search(max($nodeCount),$nodeCount)+1;
				$mostActiveNodeA = array_search(
					max(
						$nodeCount[0],
						$nodeCount[1],
						$nodeCount[2],
						$nodeCount[3],
						$nodeCount[4],
						$nodeCount[5]
					)
					,$nodeCount
				)+1;
				$mostActiveNodeB =  array_search(
					max(
						$nodeCount[6],
						$nodeCount[7],
						$nodeCount[8],
						$nodeCount[9]
					)
					,$nodeCount
				)+1+6;
				// + 1 for plus 1 element (element 0 = node 1)
				// + 6 for plus 6 sensors. So, it will start at sensor 7
				
				// 
				//
				// เหลือ specify ค่าสูงสุดที่ซ้ำกัน
				//
				//


				// Data Set
			
				$dataSetMean = array(
					'meanWhole' => $meanWhole,
					'meanA' => $meanCageA,
					'meanB' => $meanCageB,
					'meanNode' => $meanNode
				);

				$dataSetPeriod = array(
					'mostPeriod' => $mostActivePeriod,
					'mostPeriodA' => $mostPeriodA,
					'mostPeriodB' => $mostPeriodB,
					'mostPeriodNode' => $mostPeriodNode
				);

				$dataSetMostNode = array(
					'mostNode' => $mostActiveNode,
					'mostNodeA' => $mostActiveNodeA,
					'mostNodeB' => $mostActiveNodeB
				);

				$dataSetPercentage = array(
					'percentageA' => $percentageA,
					'percentageB' => $percentageB,
					'percentageNode' => $percentageNode
				);

				$dataSetAmount = array(
					'amountAll' => $amountAll,
					'amountA' => $amountCageA,
					'amountB' => $amountCageB,
					'amountNode' => $amountNode
				);

		

				// เหลือ most Node A / B
			
			$this->load->view('_dailyreport',
							array(
								"logs" => $day,
								"means" => $dataSetMean,
								"periods" => $dataSetPeriod,
								"mostNodes" => $dataSetMostNode,
								"percentages" => $dataSetPercentage,
								"amounts" => $dataSetAmount
								
							)
						);
			
			}else
				echo "no data";
			
			
		}
	}


}

