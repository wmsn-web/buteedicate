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
							<h4 class="content-title mb-0 my-auto">Dashboard </h4>
							<span class="mt-1 tx-13 ml-2 mb-0"> / <a href="<?= base_url('auth/admin/View_Products'); ?>" class="text-white">View Products</a></span>
							<span class="mt-1 tx-13 ml-2 mb-0"> / <a href="<?= base_url('auth/admin/Add_contents/index/'.$alp['id']); ?>" class="text-white">Add Contents</a></span>
							<span class="mt-1 tx-13 ml-2 mb-0"> / Add Commmunity Link</span>
							<span class="mt-1 tx-13 ml-2 mb-0"> / <?= $alp['prod_name']; ?></span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
				<div class="row">
					<div class="col-md-12">
						<h3><?= $alp['prod_name']; ?></h3>
					</div>
					<div class="col-md-4">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Add Commmunity Link</h4>
							</div>
							<div class="card-body">
								<form action="<?= base_url('auth/admin/Add_contents/upload_com_link'); ?>" method="post" enctype="multipart/form-data" data-parsley-validate novalidate>
									<div class="form-group">
										<label>Title</label>
										<input type="text" name="title" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Link</label>
										<input type="url" name="url_link" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Status</label>
										<select name="status" class="form-control" required>
											<option value="1">Active</option>
											<option value="0">Deactive</option>
										</select>
									</div>
									
									<div class="form-group">
										<input type="hidden" name="prod_id" value="<?= $alp['id']; ?>">
										<button class="btn btn-primary btn-block">Upload Link</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">All Links</h4>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered" id="example2">
										<thead>
											<tr>
												<th>SL</th>
												<th>Title</th>
												<th>Link</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php if(!empty($discord_links)): ?>
												<?php $s=1; foreach($discord_links as $dsk): $sl=$s++; ?>
													<tr>
														<td><?= $sl; ?></td>
														<td><?= $dsk['title']; ?></td>
														<td><?= $dsk['url_link']; ?></td>
														<td>
															<?php if($dsk['status'] == 1): ?>
																<span class="badge badge-success">Active</span>
															<?php else: ?>
																<span class="badge badge-danger">Deactive</span>
															<?php endif; ?>
														</td>
														<td>
															<a onclick="edt_links('<?= $dsk['id']; ?>')" href="javascript:void(0)" class="text-warning">
																<i class="fas fa-edit"></i> Edit
															</a>
															<?= nbs(3); ?>
															<a onclick="del_links('<?= $dsk['id']; ?>')" href="javascript:void(0)" class="text-danger">
																<i class="fas fa-trash"></i> Delete
															</a>
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
			function del_links(id)
			{
				var res = confirm("Are you sure to delete this Link?");
				if(res == true)
				{
					location.href="<?= base_url('auth/admin/Add_contents/del_disk_link/'); ?>"+id;
				}
			}

			function edt_links(id)
			{
				$.post("<?= base_url('auth/admin/AjaxController/edit_discord_link'); ?>",{
					id: id
				},function(resp){
					if(resp == "no")
					{
						$("#EdtDskLnk").modal('hide');
					}
					else
					{
						$("#edtFormDsk").html(resp);
						$("#EdtDskLnk").modal('show');
					}
				})
			}
		</script>
	</body>
</html>