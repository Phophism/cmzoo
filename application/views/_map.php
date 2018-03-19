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
			<div class="col-lg-8">
				<div class="card text-white bg-secondary mb-3"  style="max-width: ">
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
									<!-- <input id="ex13" /> -->
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
			</div>

			<div class="col-lg-4">
				<div class="card text-white bg-secondary mb-3">
					<div class="row">
						<!-- option side -->
						<div class="col-lg-12">
							<!--Date Time-->
							<input type="date" class="input-sm float-left"  name ="datepicker" id="date"/>
							
						</div>
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-12 ">
									<!--select cage-->
									<div class="row">
										<div class="col-lg-6">
											<button type="button" class="btn btn-outline-success float-right">A</button>
										</div>
										<div class="col-lg-6">
											<button type="button" class="btn btn-outline-info">B</button>
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<!--Description-->
									<div class="card border-dark mb-3">
										<div class="card-header" style="color:black;">Description</div>
										<div class="card-body">
										
										</div>
									</div>
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
?>

