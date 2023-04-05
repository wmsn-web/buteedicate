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
							<h4 class="content-title mb-0 my-auto">Discord Requests</h4>
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
												<th>User</th>
												<th>Discord A/c Name</th>
												<th>Invite Link</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php if(!empty($discord_links)): ?>
												<?php $s=1; foreach($discord_links as $dlnk): $sl=$s++; ?>
													<?php $usr = $this->AdminPanelModel->get_user_by_id($dlnk['user_id']); ?>
													<tr>
														<td><?= $sl; ?></td>
														<td>
															<?= $usr['name']; ?><br>
															<?= $usr['email']; ?>
														</td>
														<td>
															<span class="text-warning"><?= $dlnk['ac_name']; ?></span>
														</td>
														<td>
															<?php if(empty($dlnk['url_link'])): ?>
																<span class="text-danger"><em>Link Not Set!</em></span>
															<?php else: ?>
																<a target="_blank" href="<?= $dlnk['url_link']; ?>"><?= $dlnk['url_link']; ?></a>
															<?php endif; ?>
														</td>
														<td>
															<?php if($dlnk['status']==0): ?>
																<button onclick="discrd_invt('<?= $dlnk['id']; ?>')" class="btn btn-info btn-sm">Invite</button>
															<?php else: ?>
																<button class="btn btn-success btn-sm">Invited</button>
															<?php endif; ?>
															<button class="btn btn-danger btn-sm">Delete</button>
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
		<?php include("inc/modals.php"); ?>
		<?php include("inc/table_js.php"); ?>
		<script type="text/javascript">
			function discrd_invt(id)
			{
				$.post("<?= base_url('auth/admin/AjaxController/update_discord_link'); ?>",{
					id: id
				},function(resp){
					$("#dscrLnkFrm").html(resp);
					$("#dscrModal").modal('show');
				})
			}
		</script>
	</body>
</html>