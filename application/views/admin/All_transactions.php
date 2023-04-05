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
							<h4 class="content-title mb-0 my-auto">All Transactions</h4>
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
												<th>Date</th>
												<th>Payer Email</th>
												<th>Amount</th>
												<th>Payment Details</th>
											</tr>
										</thead>
										<tbody>
											<?php if(!empty($transactions)): ?>
												<?php $s=1; foreach($transactions as $trns): $sl = $s++; ?>
												<?php $dt = date_create($trns['ord_date']); ?>
												<?php if($trns['product_id'] == 0)
                                                {
                                                    $pln = $this->SiteModel->get_plan_by_id($trns['plan_id']);
                                                    $types = "Subscription";
                                                    $prod = $pln['plan_title'];
                                                    $subs = $this->AdminPanelModel->get_subscriptions($trns['user_id'],$trns['plan_id']);
                                                    
                                                    if(empty($subs))
                                                    {
                                                    	$subsid = "Cancelled";
                                                    }
                                                    else
                                                    {
                                                    	$subsid = $subs['paypal_subscr_id'];
                                                    }
                                                }
                                                else
                                                {
                                                    $prod = $this->SiteModel->get_product_by_id($trns['product_id']);
                                                    $types = "Product";
                                                    $prod = $prod['prod_name'];
                                                    $subsid = "";
                                                }
                                                ?>
													<tr>
														<td><?= $sl; ?></td>
														<td><?= date_format($dt,'d F Y'); ?></td>
														<td><?= $trns['payer_email']; ?></td>
														<td>
															<?= $trns['payment_gross']; ?><?= $trns['currency_code']; ?>
														</td>
														<td>
															<?= $prod; ?><br>
															<span class="text-info">
																<?= $types; ?>
															</span><br>
															<span class="text-warning"><?= $subsid; ?></span>
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