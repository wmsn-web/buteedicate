<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php include("inc/form_layout.php"); ?>
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
							<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Dashboard </h4>
							<span class="mt-1 tx-13 ml-2 mb-0"> / <a href="<?= base_url('auth/admin/View_Products'); ?>" class="text-white">View Products</a></span>
							<span class="mt-1 tx-13 ml-2 mb-0"> / Add Contents</span>
							<span class="mt-1 tx-13 ml-2 mb-0"> / <?= $alp['prod_name']; ?></span>
						</div>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<a class="text-warning" href="<?= base_url('auth/admin/Add_contents/ebooks/'.$alp['id']); ?>">
									<i class="fas fa-folder"></i> eBook
								</a>
								<?= nbs(2); ?>
								<a class="text-warning" href="<?= base_url('auth/admin/Add_contents/videos/'.$alp['id']); ?>">
									<i class="fas fa-folder"></i> Videos
								</a>
								
								<?= nbs(2); ?>
								<a class="text-warning" href="<?= base_url('auth/admin/Add_contents/online_meet_link/'.$alp['id']); ?>">
									<i class="fas fa-folder"></i> Online Meeting link
								</a>
								<?= nbs(2); ?>
								<a class="text-warning" href="<?= base_url('auth/admin/Add_contents/seminar_meet_link/'.$alp['id']); ?>">
									<i class="fas fa-folder"></i> 12 Seminar link
								</a>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-3">
										<a href="<?= base_url('auth/admin/Add_contents/ebooks/'.$alp['id']); ?>">
											<div class="card bg-primary card-img-holder text-white">
												<div class="card-body">
													<img src="<?= base_url(); ?>admin_assets/img/svgicons/circle.svg" class="card-img-absolute" alt="circle-image">
													<h4 class="font-weight-normal  mb-3">eBook
														<i class="fas fa-file-pdf  tx-30 float-right"></i>
													</h4>
													<h2 class="mb-0"><?= count($ebooks); ?></h2>
												</div>
											</div>
										</a>
									</div>
									<div class="col-md-3">
										<a href="<?= base_url('auth/admin/Add_contents/videos/'.$alp['id']); ?>">
											<div class="card bg-primary card-img-holder text-white">
												<div class="card-body">
													<img src="<?= base_url(); ?>admin_assets/img/svgicons/circle.svg" class="card-img-absolute" alt="circle-image">
													<h4 class="font-weight-normal  mb-3">Videos
														<i class="fas fa-video  tx-30 float-right"></i>
													</h4>
													<h2 class="mb-0"><?= count($vids); ?></h2>
												</div>
											</div>
										</a>
									</div>
									<div class="col-md-3">
										<div class="card bg-primary card-img-holder text-white">
											<div class="card-body">
												<img src="<?= base_url(); ?>admin_assets/img/svgicons/circle.svg" class="card-img-absolute" alt="circle-image">
												<h4 class="font-weight-normal  mb-3">Community Access
													<i class="fas fa-link  tx-30 float-right"></i>
												</h4>
												<?php if($alp['community_access'] == 1): ?>
													<div onclick="comaccess('<?= $alp['id']; ?>')" class="main-toggle main-toggle-success on">
														<span></span>
													</div>
												<?php else: ?>
													<div onclick="comaccess('<?= $alp['id']; ?>')" class="main-toggle main-toggle-success">
														<span></span>
													</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<a href="<?= base_url('auth/admin/Add_contents/online_meet_link/'.$alp['id']); ?>">
											<div class="card bg-primary card-img-holder text-white">
												<div class="card-body">
													<img src="<?= base_url(); ?>admin_assets/img/svgicons/circle.svg" class="card-img-absolute" alt="circle-image">
													<h4 class="font-weight-normal  mb-3">Online Meeting link
														<i class="fas fa-hands-helping  tx-30 float-right"></i>
													</h4>
													<h2 class="mb-0">
														<?php if(!empty($alp['online_links'])): ?>
															<span class="badge badge-success">Active</span>
														<?php else: ?>
															<span class="badge badge-danger">Not Added</span>
														<?php endif; ?>
													</h2>
												</div>
											</div>
										</a>
									</div>
									<div class="col-md-3">
										<a href="<?= base_url('auth/admin/Add_contents/seminar_meet_link/'.$alp['id']); ?>">
											<div class="card bg-primary card-img-holder text-white">
												<div class="card-body">
													<img src="<?= base_url(); ?>admin_assets/img/svgicons/circle.svg" class="card-img-absolute" alt="circle-image">
													<h4 class="font-weight-normal  mb-3">12 Seminar link
														<i class="fas fa-calendar-alt  tx-30 float-right"></i>
													</h4>
													<h2 class="mb-0">
														<?php if($alp['saminar_day'] > 0): ?>
															<span class="badge badge-success">Active</span>
														<?php else: ?>
															<span class="badge badge-danger">Not Added</span>
														<?php endif; ?>
													</h2>
												</div>
											</div>
										</a>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Container closed -->
		</div>
		<?php include("inc/footer.php"); ?>
		<?php include("inc/form_js.php"); ?>
		<script type="text/javascript">
			function comaccess(id)
			{
				$.post("<?= base_url('auth/admin/AjaxController/update_community_access'); ?>",{
					id: id
				},function(resp){

				})
			}
		</script>
	</body>
</html>