<?php
defined('BASEPATH') OR exit('No direct script access allowed');
		$this->load->view('layouts/head', array('title' => "Report"));
		$this->load->view('layouts/body_layout_1');
		$this->load->view('layouts/header');
		$this->load->view('layouts/menu');
?>

    <div class="col-lg-10 row">

        <!-- selector -->
        <div class="col-lg-12 row" style=" height: 80px">
            <!-- cage A / b  -->
            <div class="col-lg-6">
                <a>A/B</a>
            </div>
            <!-- datepicker -->
            <div class="col-lg-6" style="text-align:right;" >
                <a>A/B</a>
            </div>        
        </div>

        <!-- detail part -->
        <div class="col-lg-12 row" >
            <!-- sun and moon pic -->
            <div class="col-lg-12" style="text-align:center;">
                <a>Pic</a>
            </div>
            <!-- deatails -->
            <div class="col-lg-12 row" > 
                <!-- day -->
                <div class="col-lg-6 row">
                <a>day</a>
                </div>
                <!-- night -->
                <div class="col-lg-6 row" style="border-style:solid;">
                <a>night</a>
                </div>
            </div>
        </div>
        
    </div>

<?php 
	$this->load->view('layouts/body_layout_2');
?>	