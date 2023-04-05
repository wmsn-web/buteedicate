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
							<h4 class="content-title mb-0 my-auto">Meeting Requests</h4>
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
												<th>Date & Time</th>
												<th>Appointment for</th>
												<th>Link</th>
												<th>User</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php if(!empty($meet_req)): ?>
												<?php $s=1; foreach($meet_req as $mr): $sl=$s++; ?>
												<?php 
													$dt = date_create($mr['dates'].' '.$mr['times']);
													$usr = $this->AdminPanelModel->get_user_by_id($mr['user_id']);
												?>
													<tr>
														<td><?= $sl; ?></td>
														<td><?= date_format($dt,'d F Y h:i A'); ?></td>
														<td><?= $mr['appoint_for']; ?></td>
														<td>
															<?php if(!empty($mr['link_url'])): ?>
																<a href="<?= $mr['link_url']; ?>" target="_blank">
																	<?= $mr['link_url']; ?>
																</a>
															<?php else: ?>
																<span class="text-danger">
																	<em>Link not set!</em>
																</span>
															<?php endif; ?>
														</td>
														<td>
															<?= $usr['name']; ?><br>
															<?= $usr['email']; ?>
														</td>
														<td>
															<?php if($mr['status']==1): ?>
																<button class="btn btn-success btn-sm">Approved</button>
															<?php else: ?>
																<button onclick="approve_link('<?= $mr['id']; ?>')" class="btn btn-info btn-sm">Approve</button>
															<?php endif; ?>
															<button onclick="delete_links('<?= $mr['id']; ?>')" class="btn btn-danger btn-sm">Delete</button>
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
			function approve_link(id)
			{
				$.post("<?= base_url('auth/admin/AjaxController/get_meet_rq'); ?>",{
					id: id
				},function(resp){
					$("#mtLinkForm").html(resp);
					$("#meetModal").modal('show');
				})
			}
			function delete_links(id)
			{
				var res = confirm("Are you sure to delete this request?");
				if(res == true)
				{
					location.href = "<?= base_url('auth/admin/Meeting_requests/delete_request/'); ?>"+id;
				}
			}
		</script>
	</body>
</html>