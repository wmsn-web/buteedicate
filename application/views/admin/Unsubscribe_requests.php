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
							<h4 class="content-title mb-0 my-auto">All Unsubscribe Requests</h4>
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
												<th>Email</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php if(!empty($requests)): ?>
												<?php $s=1; foreach($requests as $req): $sl=$s++; ?>
												<?php $dt = date_create($req['dates']); ?>
													<tr>
														<td><?= $sl; ?></td>
														<td><?= date_format($dt,'d M Y h:i A'); ?></td>
														<td>
															<p><?= $req['email']; ?></p>
															<?php if($req['same_email'] == 1): ?>
																<span class="text-success">
																	<i class="fas fa-check-circle"></i> 
																	Using same email in Paypal
																</span>
															<?php else: ?>
																<span class="text-danger">
																	<i class="fas fa-exclamation-triangle"></i>
																	 Different email in Paypal
																</span>
															<?php endif; ?>
														</td>
														<td>
															<?php if($req['status'] == 1): ?>
																<button disabled class="btn btn-success btn-sm">Unsubscribed</button>
															<?php else: ?>
																<button onclick="accept_request('<?= $req['id']; ?>')" class="btn btn-warning btn-sm">Accept</button>
															<?php endif; ?>
															<button onclick="req_delete('<?= $req['id']; ?>')" class="btn btn-danger btn-sm">Delete</button>
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
		<script type="text/javascript">
			function accept_request(id)
			{
				var res = confirm("Are you sure to Mark as Unsubscribed?");
				if(res == true)
				{
					location.href = "<?= base_url('auth/admin/Unsubscribe_requests/mark_unsubs/'); ?>"+id;
				}
			}
			function req_delete(id)
			{
				var res = confirm("Are you sure to delete this request?");
				if(res == true)
				{
					location.href = "<?= base_url('auth/admin/Unsubscribe_requests/req_delete/'); ?>"+id;
				}
			}
		</script>
	</body>
</html>