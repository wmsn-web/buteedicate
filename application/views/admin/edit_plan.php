<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php include("inc/dash_layout.php"); ?>
		<title> Admin Panel</title>
	</head>
	<body class="main-body app sidebar-mini dark-theme">
		<div id="global-loader" class="light-loader">
			<img src="<?= base_url(); ?>admin_assets/img/loaders/loader.svg" class="loader-img" alt="Loader">
		</div>
		<?php include("inc/sidemenu.php"); ?>
		<div class="main-content app-content">
			<?php include("inc/header.php"); ?>
			<div class="container-fluid"> 

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Dashboard </h4>
							<span class="mt-1 tx-13 ml-2 mb-0"> / <a href="<?= base_url('auth/admin/View_plans'); ?>" class="text-white">View Plans</a></span>
							<span class="mt-1 tx-13 ml-2 mb-0"> / edit</span>
							<span class="mt-1 tx-13 ml-2 mb-0"> / <?= $pln['plan_title']; ?></span>
						</div>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<form action="<?= base_url('auth/admin/Add_plan/update_plan'); ?>" method="post" data-parsley-validate novalidate>
									<div class="row">
										<div class="form-group col-md-4">
											<label>Plan Title</label>
											<input type="text" name="plan_title" class="form-control" required value="<?= $pln['plan_title']; ?>">
										</div>
										<div class="form-group col-md-4">
											<label>Interval</label>
											<select onchange="get_duration(this.value)" id="intvl" name="intervals" class="form-control" required>
												<?php if($pln['intervals'] == "D")
												{
													$sl1 = "selected"; $sl2 = ""; $sl3 = ""; $sl4 = "";
												}
												elseif($pln['intervals'] == "W")
												{
													$sl1 = ""; $sl2 = "selected"; $sl3 = ""; $sl4 = "";
												}
												elseif($pln['intervals'] == "M")
												{
													$sl1 = ""; $sl2 = ""; $sl3 = "selected"; $sl4 = "";
												}
												elseif($pln['intervals'] == "Y")
												{
													$sl1 = ""; $sl2 = ""; $sl3 = ""; $sl4 = "selected";
												}
												else
												{
													$sl1 = ""; $sl2 = ""; $sl3 = ""; $sl4 = "";
												}
												?>
												<option value="">Select</option>
												<option <?= $sl1; ?> value="D">Day</option>
												<option <?= $sl2; ?> value="W">Week</option>
												<option <?= $sl3; ?> value="M">Month</option>
												<option <?= $sl4; ?> value="Y">Year</option>
											</select>
										</div>
										<div class="form-group col-md-4">
											<label>Duration</label>
											<select id="dur" name="duration" class="form-control" required></select>
										</div>
										<div class="form-group col-md-4">
											<label>Price</label>
											<input type="text" name="price" class="form-control" required value="<?= $pln['price']; ?>">
										</div>
										<div class="col-md-12">
											<h5>Features Included</h5>
												<?php if(empty($all_fetures)): ?>
													<div class="row">
														<div class="form-group col-md-4">
															<input type="text" name="plan_features[]" class="form-control" required>
														</div>
													</div>
												<?php else: ?>
													<?php foreach($all_fetures as $fetr): ?>
														<div class="btn btn-outline-info">
															<?= $fetr['features']; ?>
															<div onclick="del_features('<?= $fetr['id']; ?>')" class="text-danger text-right cp">
																<i class="fas fa-times"></i>
															</div>
														</div>
													<?php endforeach; ?>
												<?php endif; ?>
											
											<div id="fetr" class="row mt-3"></div>
											<button type="button" onclick="add_features()" class="btn btn-info btn-sm">Add More</button>
										</div>
										<div class="col-md-12 mt-5">
											<h5>Product Included</h5>
											<div class="row">
												<?php if(!empty($all_products)): ?>
													<?php foreach($all_products as $alp): ?>
														<?php $chkEx = $this->AdminPanelModel->check_prod_plan_exists($alp['id'],$pln['id']); ?>
														<?php if($chkEx > 0){$chkd = "checked";}else{$chkd = "";} ?>
														<div class="form-group col-md-3">
															<label class="ckbox">
																<input type="checkbox" <?= $chkd; ?> name="prod_id[]" value="<?= $alp['id']; ?>">
																<span><?= $alp['prod_name']; ?></span>
															</label>
														</div>
													<?php endforeach; ?>
												<?php endif; ?>
											</div>
										</div>
										<input type="hidden" id="int_dur" value="<?= $pln['duration']; ?>">
										<div class="form-group col-md-12">
											<input type="hidden" name="id" value="<?= $pln['id']; ?>">
											<button class="btn btn-primary">Save Plan</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Container closed -->
		</div>
		<?php include("inc/footer.php"); ?>
		<?php include("inc/dash_js.php"); ?>
		<script type="text/javascript">
			function add_features()
			{
				var content = $("#fetr");
				var fields = '<div class="form-group col-md-4"><span class="float-right cp"><i class="fas fa-times text-danger"></i></span><input type="text" name="plan_features[]" class="form-control" required></div>';
				var x = 1;
				var max = 10;
				if(x < max)
				{
					x++;
					content.append(fields);
				}
			}
			$("#fetr").on('click', '.cp', function(e){
		        e.preventDefault();
		        $(this).parent('div').remove(); //Remove field html
		        x--; //Decrement field counter
		    });

		    function get_duration(intrvl)
		    {
		    	if(intrvl.length > 0)
		    	{
		    		$.post("<?= base_url('AjaxController/get_durations'); ?>",{
		    			intrvl: intrvl,
		    			duration:''
		    		},function(resp){
		    			$("#dur").html(resp)
		    		})
		    	}
		    }

		    $(document).ready(function(){
		    	var intrvl = $("#intvl").val();
		    	var duration = $("#int_dur").val();
		    	if(intrvl.length > 0)
		    	{
		    		$.post("<?= base_url('AjaxController/get_durations'); ?>",{
		    			intrvl: intrvl,
		    			duration: duration
		    		},function(resp){
		    			$("#dur").html(resp)
		    		})
		    	}
		    });

		    function del_features(id)
		    {
		    	var res = confirm("Are you sure to delete this Feature ?");
		    	if(res == true)
		    	{
		    		location.href = "<?= base_url('auth/admin/Add_plan/delete_features/'); ?>"+id;
		    	}
		    }
		</script>
	</body>
</html>