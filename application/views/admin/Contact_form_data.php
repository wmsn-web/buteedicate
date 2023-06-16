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
							<h4 class="content-title mb-0 my-auto">Contact Form Data</h4>
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
												<th>Name</th>
												<th>Email</th>
												<th>Phone</th>
												<th>Message</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php if(!empty($form_data)): ?>
												<?php $s=1; foreach($form_data as $req): $sl=$s++; ?>
												<?php $dt = date_create($req['dates']); ?>
													<tr>
														<td><?= $sl; ?></td>
														<td><?= date_format($dt,'d M Y h:i A'); ?></td>
														<td><?= $req['name']; ?></td>
														<td><?= $req['email']; ?></td>
														<td><?= $req['phone']; ?></td>
														<td><?= $req['message']; ?></td>
														<td>
															<button onclick="cont_delete('<?= $req['id']; ?>')" class="btn btn-danger btn-sm">Delete</button>
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
			
			function cont_delete(id)
			{
				var res = confirm("Are you sure to delete this Data?");
				if(res == true)
				{
					location.href = "<?= base_url('auth/admin/Contact_form_data/cont_delete/'); ?>"+id;
				}
			}
		</script>
	</body>
</html>