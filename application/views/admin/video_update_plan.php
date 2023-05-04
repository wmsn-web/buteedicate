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
							<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Dashboard </h4>
							<span class="mt-1 tx-13 ml-2 mb-0"> / <a href="<?= base_url('auth/admin/View_plans'); ?>" class="text-white">View Plans</a></span>
							<span class="mt-1 tx-13 ml-2 mb-0"> / edit</span>
							<span class="mt-1 tx-13 ml-2 mb-0"> / <?= $pln['plan_title']; ?></span>
						</div>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
				<div class="row">
					<div class="col-md-12">
						<h3><?= $pln['plan_title']; ?></h3>
					</div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Videos</h4>
								<button onclick="ad_videos('<?= $pln['id']; ?>')" class="btn btn-primary">Add Video Link</button>
							</div>
							<div class="card-body">
								<?php if(!empty($vid_folders)): ?>
									<div class="row">
										<?php foreach ($vid_folders as $vids): ?>
											<?php $nums = $this->AdminPanelModel->get_all_planvideo_by_type($vids['video_type'],$pln['id']); ?>
											<div class="col-md-3 text-center" onclick="show_videos('<?= $pln['id']; ?>','<?= $vids['video_type']; ?>')">
												<img src="<?= base_url('assets/images/folder.png'); ?>" style="width: 95px;"><br>
												<?= ucfirst($vids['video_type']); ?> Videos (<?= count($nums); ?>)
											</div>
										<?php endforeach ?>
									</div>
								<?php endif; ?>
								<div id="plVids" style="display:none">
									<hr>
									<div class="row" id="viDs"></div>
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
			function ad_videos(id)
			{
				$("#PlanId").val(id);
				$("#AddVideoPlan").modal('show')
			}

			function show_videos(plan_id,video_type)
			{
				$.post("<?= base_url('auth/admin/AjaxController/get_plan_videos'); ?>",{
					plan_id: plan_id,
					video_type: video_type
				},function(resp){
					$("#viDs").html(resp);
					$("#plVids").show();
				})
			}
			function edt_video(id)
			{
				$.post("<?= base_url('auth/admin/AjaxController/edt_videos'); ?>",{
					id: id
				},function(resp){
					$("#edtVidFrm").html(resp);
					$("#EdtVidModal").modal('show');
				})
			}

			function del_video(id)
			{
				var res = confirm("Are you sure to delete this video?");
				if(res == true)
				{
					location.href = "<?= base_url('auth/admin/Add_contents/del_vids/'); ?>"+id;
				}
			}
		</script>
		
	</body>
</html>