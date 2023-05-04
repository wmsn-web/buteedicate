<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php include("inc/dash_layout.php"); ?>
		<script type="text/javascript" src="<?= base_url('admin_assets/ckeditor/ckeditor.js'); ?>"></script>
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
							<h4 class="content-title mb-0 my-auto">Privacy</h4>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->

				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<form action="<?= base_url('auth/admin/Privacy_Policy/updatePolicy'); ?>" method="post">

									<div class="form-group">
										<textarea name="policy" id="editor1" required="required"><?= $policy['policy_details']; ?></textarea>
									</div>
									<div class="form-group">
										<button class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
									</div>
								</form>
								
							</div>
						</div>
					</div>
				</div>
				
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<?php if($feed = $this->session->flashdata("Feed")): ?>
			<div class="flashd"><?= $feed; ?></div>
		<?php endif; ?>
		<?php include("inc/footer.php"); ?>
		<?php include("inc/dash_js.php"); ?>
		<script type="text/javascript">
			CKEDITOR.replace( 'editor1',{height: 400} );
		</script>
	</body>
</html>