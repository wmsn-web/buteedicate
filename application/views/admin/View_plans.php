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
							<h4 class="content-title mb-0 my-auto">All Membership Plans</h4>
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
												<th>Plan Details</th>
											</tr>
										</thead>
										<tbody>
											<?php if(!empty($all_plans)): ?>
												<?php $s=1; foreach($all_plans as $pln): $sl=$s++; ?>
												<?php 
													$features = $this->AdminPanelModel->get_plan_features($pln['id']);
													$prd = $this->AdminPanelModel->get_plan_products($pln['id']);
												?>
													<tr>
														<td><?= $sl; ?></td>
														<td>
															<h5 class="text-info">
																<?= $pln['plan_title']; ?>
															</h5>
															<h6>&#8364; <?= $pln['price']; ?> / <?= full_durations($pln['intervals'],$pln['duration']); ?></h6>
															<?php if(!empty($features)): ?>
																<?php foreach($features as $fetr): ?>
																	<span class="badge badge-warning">
																		<?= $fetr['features']; ?>
																	</span>
																<?php endforeach; ?>
															<?php endif; ?>
															<br>
															<div class="d-flex mt-3">
																<?php if(!empty($prd)): ?>
																	<?php foreach($prd as $pr): ?>
																		<?php $prods = $this->AdminPanelModel->get_product_by_id($pr['prod_id']); ?>
																		<label class="ckbox">
																			<input type="checkbox" name="asda" checked disabled>
																			<span><?= $prods['prod_name']; ?></span>
																		</label><?= nbs(3); ?>
																	<?php endforeach; ?>
																<?php endif; ?>
															</div>
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