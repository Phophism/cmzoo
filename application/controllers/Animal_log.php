<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Animal_log extends CI_Controller {

	// เปลี่ยน url ของ method Httpget() ใน sensor จาก httpget?...  เป็น add?...

	public function add(){
		$nodeId = $this->input->get('nodeId'); // receive nodeId from url parameter
		$lightIntensity = $this->input->get('lightIntensity'); // receive lightIntensity from url parameter
		$temperatureC = $this->input->get('temperatureC'); // receive temperatureC from url parameter
		$temperatureF = $this->input->get('temperatureF'); // receive temperatureF from url parameter
		$humidity = $this->input->get('humidity'); // receive humidity from url parameter
		$duration = $this->input->get('duration'); // receive duration from url parameter
		$this->load->model('animal_log_model');
		$this->animal_log_model->add($nodeId,$lightIntensity,$temperatureC,$temperatureF,$humidity,$duration);
	}

	public function
	

}

