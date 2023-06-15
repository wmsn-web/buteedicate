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
							<h4 class="content-title mb-0 my-auto">Change Password</h4>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
				<div class="row justify-content-center">
					<div class="col-md-4">
						<div class="card">
							<div class="card-header">
								<h4>Change Password</h4>
							</div>
							<div class="card-body">
								<form id="upForm" action="<?= base_url('auth/admin/ChangePassword/updatePass'); ?>" method="post" data-parsley-validate novalidate>
									<div class="form-group">
										<label>New Password</label>
										<input type="Password" id="pass" name="" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Confirm Password</label>
										<input type="Password" id="conpas" name="password" class="form-control" required>
									</div>
									<div class="form-group">
										<span id="erMsg"></span><br>
										<button type="button" onclick="chpass()" class="btn btn-primary">Update Password</button>
									</div>
								</form>
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
			function chpass()
			{
				var pass = $("#pass").val();
				var conpas = $("#conpas").val();
				if(pass == conpas)
				{
					$("#erMsg").html("");
					$("#upForm").submit();
				}
				else
				{
					$("#erMsg").html("<b style='color: #f00'>Password does not match!</b>");
					return false;
				}
				
			}
		</script>
	</body>
</html>