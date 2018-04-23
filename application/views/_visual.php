<?php
defined('BASEPATH') OR exit('No direct script access allowed');
		$this->load->view('layouts/head', array('title' => "Visulaization"));
		$this->load->view('layouts/body_layout_1');
		$this->load->view('layouts/menu');
?>

	<!--details-->
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<form id="dateForm" method="POST" action="<?php echo base_url();?>visual">
						<div class="col-lg-12">
							<div class="widget">
									<div class="widget-content">
										<div class="col-lg-9">
											<input type="checkbox" id="checkbox" name="cageselect" data-toggle="toggle" style="min-height:32px;" data-onstyle="success"
											data-offstyle="info" data-on="Zone A" data-off="Zone B" onchange="change();" <?php if(!isset($cageReceive)) echo
											" " ; else echo " checked"; ?> />
										</div>
										<div class="col-lg-3">
											<?php
                                        if(isset($dateReceive))
                                            echo "<input type=\"date\" id=\"date\" name =\"datepicker\" class=\"form-control pull-right\" onkeydown=\"return false\" onchange=\"change();\" value=\"".$dateReceive."\"  max=\"".date('Y-m-d')."\" />" ;
                                        else
                                            echo "<input type=\"date\" id=\"date\" name =\"datepicker\" class=\"form-control pull-right\" onkeydown=\"return false\" onchange=\"change();\" value=\"".date('Y-m-d')."\"  max=\"".date('Y-m-d')."\" />" ;				
                                    ?>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12 ">
											<hr>
											<div class="widget-content">
											<div class="btn-group btn-group-toggle" data-toggle="buttons">
												<label class="btn btn-primary <?php if($period == 1) echo " active ";?>">
													<input type="radio" name="options" id="option1" autocomplete="off" value="1" onchange="change();" <?php if($period==1 ) echo
													" checked ";?> > Day
												</label>
												<label class="btn btn-primary <?php if($period == 2) echo " active ";?>">
													<input type="radio" name="options" id="option2" autocomplete="off" value="2" onchange="change();" <?php if($period==2 ) echo
													" checked ";?> > Week
												</label>
												<label class="btn btn-primary <?php if($period == 3) echo " active ";?>">
													<input type="radio" name="options" id="option3" autocomplete="off" value="3" onchange="change();" <?php if($period==3 ) echo
													" checked ";?> > Month
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
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php 
    $this->load->view('layouts/body_layout_2');
    $this->load->view('scripts/visual_script');
    $this->load->view('scripts/visual_chart');
    $this->load->view('layouts/body_layout_3');
?>
