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
							<h4 class="content-title mb-0 my-auto">All Users</h4>
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
												<th>User Details</th>
												<th>Address</th>
											</tr>
										</thead>
										<tbody>
											<?php if(!empty($all_users)): ?>
												<?php $s=1; foreach($all_users as $usr): $sl=$s++; ?>
												<?php $chk_subs = $this->AdminPanelModel->check_user_subscr($usr['id']); ?>
													<tr>
														<td><?= $sl; ?></td>
														<td>
															<?= $usr['name']; ?><?= nbs(3); ?>
															<?php if($chk_subs > 0): ?>
																<i class="fas fa-check-circle text-success" title="Member subscription"></i>
															<?php endif; ?>
															<br>
															<?= $usr['email']; ?><br>
															<?= $usr['isd']; ?> <?= $usr['phone']; ?><br>
															<a title="Edit user information" onclick="up_user('<?= $usr['id']; ?>')" href="javascript:void(0)">
																<button class="btn btn-warning btn-sm">
																	<i class="fas fa-edit"></i>
																</button>
															</a>
															<a title="Delete User" onclick="del_user('<?= $usr['id']; ?>')" href="javascript:void(0)">
																<button class="btn btn-danger btn-sm">
																	<i class="fas fa-trash"></i>
																</button>
															</a>
															<a title="Update Password" onclick="key_user('<?= $usr['id']; ?>')" href="javascript:void(0)">
																<button class="btn btn-info btn-sm">
																	<i class="fas fa-key"></i>
																</button>
															</a>
														</td>
														<td>
															<?= $usr['address']; ?><br>
															<?= $usr['city']; ?><br>
															<?= $usr['country']; ?><br>
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
			function up_user(id)
			{
				$.post("<?= base_url('auth/admin/AjaxController/up_users'); ?>",{
					id: id
				},function(resp){
					$("#profUser").html(resp);
					$("#edtUserForm").modal('show');
				})
				
			}
			function key_user(id)
			{
				$.post("<?= base_url('auth/admin/AjaxController/key_user'); ?>",{
					id: id
				},function(resp){
					$("#profUser").html(resp);
					$("#edtUserForm").modal('show');
				})
			}
			function savePass()
			{
				var pass = $("#pass").val();
				var conpass = $("#conpass").val();
				if(pass == conpass)
				{
					$("#passform").submit();
				}
				else
				{
					$("#pasMsg").html("<b style='color:#f00'>Password does not match!</b>");
					return false;
				}
				
			}
			function del_user(id)
			{
				var res = confirm("Are you sure to delete this user. All data of this user will be deleted. Please click OK to peoceed.");
				if(res == true)
				{
					location.href = "<?= base_url('auth/admin/View_users/del_user/'); ?>"+id;
				}
			}
		</script>
	</body>
</html>