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
							<span class="mt-1 tx-13 ml-2 mb-0"> / Edit</span>
							<span class="mt-1 tx-13 ml-2 mb-0"> / <?= $alp['prod_name']; ?></span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
				<div class="row justify-content-center">
					<div class="col-md-10">
						<div class="card">
							<div class="card-body">
								<form action="<?= base_url('auth/admin/Add_Products/update_prod'); ?>" method="post" data-parsley-validate novalidate>
									<div class="row">
										<div class="form-group col-md-12">
											<label>Product Name</label>
											<input type="text" name="prod_name" class="form-control" required value="<?= $alp['prod_name']; ?>">
										</div>
										<div class="form-group col-md-6">
											<label>Price</label>
											<input type="text" name="price" class="form-control" required value="<?= $alp['price']; ?>">
										</div>
										
										<div class="form-group col-md-12">
											<label>Description</label>
											<textarea name="descr" rows="6" class="form-control"><?= $alp['descr']; ?></textarea>
										</div>
										<div class="form-group col-md-12">
											<input type="hidden" name="id" value="<?= $alp['id']; ?>">
											<button class="btn btn-primary">Update Product</button>
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