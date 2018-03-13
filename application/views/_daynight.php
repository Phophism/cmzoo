<?php
defined('BASEPATH') OR exit('No direct script access allowed');
		$this->load->view('layouts/head', array('title' => "Report"));
		$this->load->view('layouts/body_layout_1');
		$this->load->view('layouts/header');
		$this->load->view('layouts/menu');
?>

    <div class="col-lg-10 ">
        
        <div class="row">
        <!--Group 1-->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-danger pull-left">Toggle</button>
                    <input type="date" class="input-sm pull-right" />
                </div>
            </div>
        </div>
        <hr />

        <!--Group 2-->
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <h1 style="text-align:center;">A</h1>
                    <hr />
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <h1 style="text-align:center;">A</h1>
                        </div>
                        <div class="col-lg-6">
                            <h1 style="text-align:center;">A</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>

<?php 
	$this->load->view('layouts/body_layout_2');
?>	