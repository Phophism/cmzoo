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
                                 <form id="dateForm" method="POST" action="<?php echo base_url();?>visual">
                                    <input type="checkbox" id="checkbox" name="cageselect" data-toggle="toggle" style="min-height:32px;" data-onstyle="success" data-offstyle="info" onchange="change();" 
                                    <?php
                                        if(!isset($cageReceive))
                                            echo " " ;
                                        else
                                            echo " checked";	
                                    ?>
                                    />
                                    <?php
                                        if(isset($dateReceive))
                                            echo "<input type=\"date\" id=\"date\" name =\"datepicker\" class=\"input-sm float-right\" onkeydown=\"return false\" onchange=\"change();\" value=\"".$dateReceive."\"  max=\"".date('Y-m-d')."\" />" ;
                                        else
                                            echo "<input type=\"date\" id=\"date\" name =\"datepicker\" class=\"input-sm float-right\" onkeydown=\"return false\" onchange=\"change();\" value=\"".date('Y-m-d')."\"  max=\"".date('Y-m-d')."\" />" ;				
                                    ?>			
                                </form>
                            </div>
                            <div class = "class-body">
                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-primary">
                                                <input type="radio" name="options" id="option1" autocomplete="off" checked=""> days
                                            </label>
                                            <label class="btn btn-primary">
                                                <input type="radio" name="options" id="option2" autocomplete="off"> weeks
                                            </label>
                                            <label class="btn btn-primary active">
                                                <input type="radio" name="options" id="option3" autocomplete="off"> month
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <canvas id="visualize-chart" width="800" height="340"></canvas>
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
	$this->load->view('scripts/visual_chart');
?>