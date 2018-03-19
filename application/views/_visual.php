<?php
defined('BASEPATH') OR exit('No direct script access allowed');
		$this->load->view('layouts/head', array('title' => "Visulaization"));
		$this->load->view('layouts/body_layout_1');
		$this->load->view('layouts/header');
		$this->load->view('layouts/menu');
?>

	<!--details-->
	<div class="col-lg-10 ">
        <div class = "row">
            <div class="col-lg-12">
                 <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <input type="checkbox" checked data-toggle="toggle" data-style="ios">
                                <input type="date" class="input-sm float-right"  />
                            </div>
                            <div class = "class-body">
                                <div class="col-lg-12">
                                    <h1>cage selecter</h1>
                                </div>
                                <div class="col-lg-12">
                                    <h1>graph</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
	</div>

<?php 
	$this->load->view('layouts/body_layout_2');
	$this->load->view('scripts/visual_chart');
?>