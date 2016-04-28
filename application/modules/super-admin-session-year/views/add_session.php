<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title><?php if(isset($title)){ echo $title; }else{ echo "School Management System Super Admin Panel"; } ?></title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/css/style-metro.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/css/themes/brown.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?php echo base_url(); ?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES --> 
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/select2/select2_metro.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />

	<!-- END PAGE LEVEL SCRIPTS -->
	<link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->
	<?php $this->load->view('include/header.php'); ?>
	<?php $this->load->view('include/sideber.php'); ?>
		<!-- BEGIN PAGE -->  
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="portlet-config" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>portlet Settings</h3>
				</div>
				<div class="modal-body">
					<p>Here will be a configuration form</p>
				</div>
			</div>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->   
				<div class="row-fluid">
					<div class="span12">
						<h3 class="page-title">
							Session of class
							<small>Add session for the class</small>
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="index.html">Home</a>
								<span class="icon-angle-right"></span>
							</li>
							<li>
								<a href="#">Session</a>
								<span class="icon-angle-right"></span>
							</li>
							<li><a href="">Add Session</a></li>
						</ul>
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<div class="tabbable tabbable-custom boxless">
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1">
									<div class="portlet box blue">
										<div class="portlet-title">
											<div class="caption"><i class="icon-reorder"></i>Add Session</div>
											<div class="tools">
												<a href="javascript:;" class="collapse"></a>
												<a href="#portlet-config" data-toggle="modal" class="config"></a>
												<a href="javascript:;" class="reload"></a>
												<a href="javascript:;" class="remove"></a>
											</div>
										</div>
										<div class="portlet-body form">
                      <div class="alert alert-success" style = "display: none;">
                        <strong>Success!</strong> Indicates a successful or positive action.
                      </div>
                      <div class="alert alert-warning" style = "display: none;">
                        <strong>Warning!</strong> Indicates a warning that might need attention.
                      </div>
                      <?php
                          if(!empty($error)){
                              ?>
                              <div class="alert alert-warning">
                                <strong>Warning!</strong> <?= $error; ?>
                              </div>
                              <?php
                          }
                      ?>
											<!-- BEGIN FORM-->
											<?= form_open_multipart( '', array('class' => 'horizontal-form') ); ?>
                          <h3 class="form-section">Add Yearly Session</h3>
                          
                          <?php
                              $month = array( 
                                          '01' => 'January',
                                          '02' => 'February',
                                          '03' => 'March',
                                          '04' => 'April',
                                          '05' => 'May',
                                          '06' => 'June',
                                          '07' => 'July',
                                          '08' => 'August',
                                          '09' => 'September',
                                          '10' => 'October',
                                          '11' => 'November',
                                          '12' => 'December' 
                                        );

                              $recent_year = date('Y', time());
                              for( $i=($recent_year-5); $i<=($recent_year+5); $i++ ){
                                  $year[$i] = $i;
                              }
                          ?>
                          <div class="row-fluid">
                              <h3 class="form-section">From Month</h3>
                              <div class="span6 ">
                                  <div class="control-group">
                                      <?= form_label('Month', 'from_month', array( 'class' => 'control-label' )); ?>
                                      <div class="controls">
                                          <?= form_dropdown('from_month', $month, 1, array( 'id' => 'from_month', 'class' => 'm-wrap span12' )); ?>
                                      </div>
                                  </div>
                              </div>
                              <div class="span6 ">
                                  <div class="control-group">
                                      <?= form_label('Year', 'from_year', array( 'class' => 'control-label' )); ?>
                                      <div class="controls">
                                          <?= form_dropdown('from_year', $year, 1, array( 'id' => 'from_year', 'class' => 'm-wrap span12' )); ?>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row-fluid">
                              <h3 class="form-section">To Month</h3>
                              <div class="span6 ">
                                  <div class="control-group">
                                      <?= form_label('Month', 'to_month', array( 'class' => 'control-label' )); ?>
                                      <div class="controls">
                                          <?= form_dropdown('to_month', $month, 1, array( 'id' => 'to_month', 'class' => 'm-wrap span12' )); ?>
                                      </div>
                                  </div>
                              </div>
                              <div class="span6 ">
                                  <div class="control-group">
                                      <?= form_label('Year', 'to_year', array( 'class' => 'control-label' )); ?>
                                      <div class="controls">
                                          <?= form_dropdown('to_year', $year, 1, array( 'id' => 'to_year', 'class' => 'm-wrap span12', 'onchange' => "return onchangeSessionNameSet();" )); ?>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row-fluid">
                              <div class="span6 ">
                                  <div class="control-group">
                                      <?= form_label('Session Name', 'name', array( 'class' => 'control-label' )); ?>
                                      <div class="controls">
                                          <?php
                                              $attributes = array(
                                                          'name'        => 'name',
                                                          'class' => 'm-wrap span12',
                                                          'id' => 'name',
                                                        );
                                              echo form_input($attributes);
                                          ?>
                                          <?= form_error( 'name', '<span class = "req">', '</span>'); ?>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row-fluid">
                              <div class="span6 ">
                                  <div class="control-group">
                                      <?= form_label('Session Description', 'description', array( 'class' => 'control-label' )); ?>
                                      <div class="controls">
                                          <?php
                                              $attributes = array(
                                                          'name'        => 'description',
                                                          'class' => 'm-wrap span12',
                                                          'id' => 'description',
                                                        );
                                              echo form_textarea($attributes);
                                          ?>
                                          <?= form_error( 'description', '<span class = "req">', '</span>'); ?>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row-fluid">
                              <div class="span6 ">
                                  <div class="control-group">
                                      <?= form_label('Status', 'status', array( 'class' => 'control-label' )); ?>
                                      <div class="controls">
                                          <?php
                                              $options = array(
                                                  '1'  => 'Active',
                                                  '0'    => 'Inactive',
                                              );
                                              echo form_dropdown('status', $options, 1, array( 'class' => 'm-wrap span12' ));
                                          ?>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="form-actions">
                              <button type="submit" class="btn blue"><i class="icon-ok"></i> Add</button>
                              <button type="button" class="btn">Cancel</button>
                          </div>
                      <?= form_close(); ?>
											<!-- END FORM--> 
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END PAGE CONTENT-->         
			</div>
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE -->  
	</div>
	<!-- END CONTAINER -->
    <?php $this->load->view('include/footer.php'); ?>
	
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->   <script src="<?php echo base_url(); ?>assets/plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      
	<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
	<!--[if lt IE 9]>
	<script src="<?php echo base_url(); ?>assets/plugins/excanvas.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/respond.min.js"></script>  
	<![endif]-->   
	<script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
	<script src="<?php echo base_url(); ?>assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/ckeditor/ckeditor.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/custom/js/main.js"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url(); ?>assets/scripts/app.js"></script>
	<script src="<?php echo base_url(); ?>assets/scripts/form-samples.js"></script>   
	<!-- END PAGE LEVEL SCRIPTS -->
  <script type = "text/javascript">
      function onchangeSessionNameSet(){
          var from_month = $("#from_month").val();
          var from_year = $("#from_year").val();
          var to_month = $("#to_month").val();
          var to_year = $("#to_year").val();

          var session_name = from_month+'/'+from_year+' - '+to_month+'/'+to_year;
          $("#name").val(session_name);
      }
  </script>
	<script>
		jQuery(document).ready(function() {    
		   // initiate layout and plugins
		   App.init();
		   FormSamples.init();
		});
	</script>
	<!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>