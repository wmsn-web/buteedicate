<?php error_reporting(0); ini_set('display_errors', 0); ?>
<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<?php include("inc/dash_layout.php"); ?>
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
							<h4 class="content-title mb-0 my-auto">Company Contacts</h4>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
				<div class="row justify-content-center">
					<div class="col-md-8">
						<div class="card">
							<div class="card-body">
								<form action="<?= base_url('auth/admin/Company_contacts/save_contacts'); ?>" method="post">
									<div class="row">
										<div class="form-group col-md-12">
											<label>Conpany Name</label>
											<input type="text" name="comp_name" class="form-control" required value="<?= $contacts['comp_name']; ?>">
										</div>
										<div class="form-group col-md-12">
											<label>Conpany Address</label>
											<input type="text" name="comp_addr" class="form-control" required value="<?= $contacts['comp_addr']; ?>">
										</div>
										<div class="form-group col-md-6">
											<label>City</label>
											<input type="text" name="city" class="form-control" required value="<?= $contacts['city']; ?>">
										</div>
										<div class="form-group col-md-6">
											<label>State/Province</label>
											<input type="text" name="state" class="form-control" required value="<?= $contacts['state']; ?>">
										</div>
										<div class="form-group col-md-6">
											<label>Country</label>
											<input type="text" name="country" class="form-control" required value="<?= $contacts['country']; ?>">
										</div>
										<div class="form-group col-md-6">
											<label>PIN/ZIP</label>
											<input type="text" name="pin" class="form-control" required value="<?= $contacts['pin']; ?>">
										</div>
										<div class="form-group col-md-6">
											<label>Phone 1</label>
											<input type="text" name="phone_1" class="form-control" required value="<?= $contacts['email_1']; ?>">
										</div>
										<div class="form-group col-md-6">
											<label>Phone 2</label>
											<input type="text" name="phone_2" class="form-control"  value="<?= $contacts['phone_2']; ?>">
										</div>
										<div class="form-group col-md-6">
											<label>Email 1</label>
											<input type="text" name="email_1" class="form-control" required value="<?= $contacts['email_1']; ?>">
										</div>
										<div class="form-group col-md-6">
											<label>Email 2</label>
											<input type="text" name="email_2" class="form-control" value="<?= $contacts['email_2']; ?>">
										</div>
										<div class="form-group col-md-12">
											<label>MAP</label>
											<textarea id="map" name="map" class="form-control" rows="3"><?= $contacts['map']; ?></textarea>
										</div>
										<div id="gmap" class="form-group col-md-12"></div>
										<div class="form-group col-md-12">
											<button class="btn btn-primary">Save Contacts</button>
										</div>
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
		<?php include("inc/dash_js.php"); ?>
		<script type="text/javascript">
			$(document).ready(function(){
				var mapstring = $("#map").val();
				if(mapstring.length > 0)
				{
					$("#gmap").html(mapstring);
				}
			});
		</script>
	</body>
</html>