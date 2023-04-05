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
							<h4 class="content-title mb-0 my-auto">Add Membership Plans</h4>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<form action="<?= base_url('auth/admin/Add_plan/save_plan'); ?>" method="post" data-parsley-validate novalidate>
									<div class="row">
										<div class="form-group col-md-4">
											<label>Plan Title</label>
											<input type="text" name="plan_title" class="form-control" required>
										</div>
										<div class="form-group col-md-4">
											<label>Interval</label>
											<select onchange="get_duration(this.value)" name="intervals" class="form-control" required>
												<option value="">Select</option>
												<option value="D">Day</option>
												<option value="W">Week</option>
												<option value="M">Month</option>
												<option value="Y">Year</option>
											</select>
										</div>
										<div class="form-group col-md-4">
											<label>Duration</label>
											<select id="dur" name="duration" class="form-control" required></select>
										</div>
										<div class="form-group col-md-4">
											<label>Price</label>
											<input type="text" name="price" class="form-control" required>
										</div>
										<div class="col-md-12">
											<h5>Features Included</h5>
											<div class="row">
												<div class="form-group col-md-4">
													<input type="text" name="plan_features[]" class="form-control" required>
												</div>
											</div>
											<div id="fetr" class="row"></div>
											<button type="button" onclick="add_features()" class="btn btn-info btn-sm">Add More</button>
										</div>
										<div class="col-md-12 mt-5">
											<h5>Product Included</h5>
											<div class="row">
												<?php if(!empty($all_products)): ?>
													<?php foreach($all_products as $alp): ?>
														<div class="form-group col-md-3">
															<label class="ckbox">
																<input type="checkbox" name="prod_id[]" value="<?= $alp['id']; ?>">
																<span><?= $alp['prod_name']; ?></span>
															</label>
														</div>
													<?php endforeach; ?>
												<?php endif; ?>
											</div>
										</div>
										<div class="form-group col-md-12">
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
		    			intrvl: intrvl
		    		},function(resp){
		    			$("#dur").html(resp)
		    		})
		    	}
		    }
		</script>
	</body>
</html>