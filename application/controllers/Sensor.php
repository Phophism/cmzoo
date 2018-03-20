<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sensor extends CI_Controller {

	public function index()
	{
		$this->load->model('sensor_model');
		
		$this->load->view('_sensorstatus',
			array(
				"sensors" => $this->sensor_model->get()
			)
		);

		/*
		$data['nickname']->nickname = 'Phoom';
		$this->load->view('welcome_message',$data);
		*/
	}
  
	// เปลี่ยน url จาก /httpupdate?... ใน sensor เป็น /update?...

	public function update(){
		$nodeId = $this->input->get('nodeId'); // receive nodeId from url parameter
		$status = $this->input->get('status'); // receive status from url parameter
		$this->load->model('sensor_model');
		$this->sensor_model->update($nodeId,$status);
	}

}

