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
							<h4 class="content-title mb-0 my-auto">All Products</h4>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered" id="example2">
										<thead>
											<tr>
												<th>SL</th>
												<th>Product Details</th>
											</tr>
										</thead>
										<tbody>
											<?php if(!empty($all_products)): ?>
												<?php $s=1; foreach($all_products as $alp): $sl=$s++; ?>
													<tr>
														<td><?= $sl; ?></td>
														<td>
															<h5><?= $alp['prod_name']; ?></h5>
															<p class="show_short">
																<?= html_entity_decode($alp['descr']); ?>
															</p>
															<span>$<?= $alp['price']; ?> / <?= $alp['duration']; ?>Days</span><br>
															<a href="<?= base_url('auth/admin/View_Products/edit/'.$alp['id']); ?>">
																<button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
															</a>
															<a href="<?= base_url('auth/admin/View_Products/product_features/'.$alp['id']); ?>">
																<button class="btn btn-primary btn-sm"><i class="fas fa-cube"></i> Features</button>
															</a>
															<a href="<?= base_url('auth/admin/Add_contents/index/'.$alp['id']); ?>">
																<button class="btn btn-info btn-sm"><i class="fas fa-plus"></i> Add Contents</button>
															</a>
															<button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
														</td>
													</tr>
												<?php endforeach; ?>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Container closed -->
		</div>
		<?php include("inc/footer.php"); ?>
		<?php include("inc/table_js.php"); ?>
	</body>
</html>