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
							<h4 class="content-title mb-0 my-auto">Dashboard </h4>
							<span class="mt-1 tx-13 ml-2 mb-0"> / <a href="<?= base_url('auth/admin/View_Products'); ?>" class="text-white">View Products</a></span>
							<span class="mt-1 tx-13 ml-2 mb-0"> / Product Features</span>
							<span class="mt-1 tx-13 ml-2 mb-0"> / <?= $alp['prod_name']; ?></span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
				<div class="row justify-content-center">
					<div class="col-md-10">
						<div class="card">
							<div class="card-body">
								<h3>All Features</h3>
								<div class="row">
									<?php if(!empty($fetrs)): ?>
										<?php foreach($fetrs as $fet): ?>
											<div class="col-md-4 mt-1">
												<div class="pd_fets">
													<?= $fet['name']; ?>
													<span class="float-right">
														<a href="<?= base_url('auth/admin/Add_Products/del_features/'.$fet['id']); ?>" class="text-danger">
															<i class="fas fa-times"></i>
														</a>
													</span>
												</div>
											</div>
										<?php endforeach; ?>
									<?php endif; ?>
								</div>
								<form action="<?= base_url('auth/admin/Add_Products/add_fetures'); ?>" method="post">
									<div class="row mt-4">
										<div class="form-group col-md-6">
											<input type="text" name="name" class="form-control" placeholder="Add Features" required>
										</div>
										<div class="form-group col-md-2">
											<input type="hidden" name="prod_id" value="<?= $alp['id']; ?>">
											<button class="btn btn-primary btn-block">Add Features</button>
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
	</body>
</html>