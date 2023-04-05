<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php include("inc/table_layout.php"); ?>
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
							<h4 class="content-title mb-0 my-auto">Dashboard </h4>
							<span class="mt-1 tx-13 ml-2 mb-0"> / <a href="<?= base_url('auth/admin/View_Products'); ?>" class="text-white">View Products</a></span>
							<span class="mt-1 tx-13 ml-2 mb-0"> / <a href="<?= base_url('auth/admin/Add_contents/index/'.$alp['id']); ?>" class="text-white">Add Contents</a></span>
							<span class="mt-1 tx-13 ml-2 mb-0"> / Add Online Link</span>
							<span class="mt-1 tx-13 ml-2 mb-0"> / <?= $alp['prod_name']; ?></span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
				<div class="row">
					<div class="col-md-12">
						<h3><?= $alp['prod_name']; ?></h3>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-4">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Activate Online meeting</h4>
							</div>
							<div class="card-body">
								<form action="<?= base_url('auth/admin/Add_contents/upload_online_link'); ?>" method="post" enctype="multipart/form-data" data-parsley-validate novalidate>
									<div class="form-group">
										<label>Select an option</label>
										<select name="url_link" class="form-control">
											<?php if(!empty($alp['online_links'])): $sl1 = "selected"; $sl2 ="";else: $sl1 = ""; $sl2 = "selected"; endif; ?>
											<option <?= $sl1; ?> value="yes">Yes</option>
											<option <?= $sl2; ?> value="">No</option>
										</select>
									</div>
									
									<div class="form-group">
										<input type="hidden" name="id" value="<?= $alp['id']; ?>">
										<button class="btn btn-primary btn-block">Upload Link</button>
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
		<?php include("inc/modals.php"); ?>
		<?php include("inc/table_js.php"); ?>
		
	</body>
</html>