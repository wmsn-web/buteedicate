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
							<span class="mt-1 tx-13 ml-2 mb-0"> / Videos</span>
							<span class="mt-1 tx-13 ml-2 mb-0"> / <?= $alp['prod_name']; ?></span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
				<div class="row">
					<div class="col-md-12">
						<h3><?= $alp['prod_name']; ?></h3>
					</div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Videos</h4>
								<button onclick="ad_videos('<?= $alp['id']; ?>')" class="btn btn-primary">Add Video Link</button>
							</div>
							<div class="card-body">
								<?php if(!empty($vid_folders)): ?>
									<div class="row">
										<?php foreach ($vid_folders as $vids): ?>
											<?php $nums = $this->AdminPanelModel->get_all_video_by_type($vids['video_type'],$alp['id']); ?>
											<div class="col-md-3 text-center">
												<a class="text-white" href="<?= base_url('auth/admin/Add_contents/prod_videos/'.$vids['video_type'].'/'.$alp['id']); ?>">
													<img src="<?= base_url('assets/images/folder.png'); ?>" style="width: 95px;"><br>
													<?= ucfirst($vids['video_type']); ?> Videos (<?= count($nums); ?>)
												</a>
											</div>
										<?php endforeach ?>
									</div>
								<?php endif; ?>
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
			function ad_videos(id)
			{
				$("#ProdIds").val(id);
				$("#AddVideo").modal('show')
			}
		</script>
		
	</body>
</html>