<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('layouts/head', array('title' => "Visual Map"));
$this->load->view('layouts/body_layout_1');
$this->load->view('layouts/header');
$this->load->view('layouts/menu');
?>

	<!-- content -->
	<div class="col-lg-10">
		<div class="row">
			<!-- Map -->
			<div class="col-lg-7">
				<div class="row">
					<!-- map side -->
					<div class="col-lg-12">
						<div class="row">
							<!--Map and slider-->
							<div class="col-lg-12">
								<!--Map-->
								<h1 style="text-align: center;"> Map</h1>
							</div>
							<div class="col-lg-12 container">
								<!--Slider-->
								<input id="ex13" />
							</div>
						</div>
					</div>
					<div class="col-lg-12 ">
						<!--Status Details-->
						<div class="row">
							<!-- Each status detail -->
							<div class="col-lg-4">
								<h1>green</h1>
							</div>
							<div class="col-lg-4">
								<h1>red</h1>
							</div>
							<div class="col-lg-4">
								<h1>blue</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="row">
					<!-- option side -->
					<div class="col-lg-12">
						<!--Date Time-->
						<h1> date time</h1>
					</div>
					<div class="col-lg-12">
                    <div class="row">
						<div class="col-lg-12 ">
							<!--select cage-->
							<div class="row">
								<div class="col-lg-6">
									<h1>cageA</h1>
								</div>
								<div class="col-lg-6">
									<h1>cageB</h1>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<!--Description-->
							<h1>description</h1>
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

