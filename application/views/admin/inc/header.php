
<!-- main-header -->
			<div class="main-header sticky side-header nav nav-item">
				<div class="container-fluid">
					<div class="main-header-left ">
						<div class="app-sidebar__toggle mobile-toggle" data-toggle="sidebar">
							<a class="open-toggle" href="#"><i class="header-icons" data-eva="menu-outline"></i></a>
							<a class="close-toggle" href="#"><i class="header-icons" data-eva="close-outline"></i></a>
						</div>
						<div class="main-header-center ml-3 d-sm-none d-md-none d-lg-block">
							
						</div>
					</div>
					<div class="main-header-center">
						<div class="responsive-logo">
							<a href="<?= base_url('admin_panel/Home/'); ?>"><img src="<?= base_url(); ?>assets/images/logo.png" class="mobile-logo" alt="logo"></a>
						</div>
						
					</div>
					<div class="main-header-right">
						<div class="nav nav-item  navbar-nav-right ml-auto">
							
							<div class="nav-item full-screen fullscreen-button">
								<a class="new nav-link full-screen-link" href="#"><i class="ti-fullscreen"></i></span></a>
							</div>
							<div class="dropdown  nav-item main-header-message ">
								
								
							</div>
							<div class="dropdown nav-item main-header-notification">
								
								
							</div>
							<button class="navbar-toggler navresponsive-toggler d-sm-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
								aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon fe fe-more-vertical "></span>
							</button>
							<div class="dropdown main-profile-menu nav nav-item nav-link">
								<a class="profile-user" href=""><img alt="" src="<?= base_url(); ?>admin_assets/img/faces/5.jpg"></a>
								<div class="dropdown-menu dropdown-menu-arrow animated fadeInUp">
									<div class="main-header-profile header-img">
										<div class="main-img-user"><img alt="" src="<?= base_url(); ?>admin_assets/img/faces/5.jpg"></div>
										<h6>Admin</h6><span>Mindtrilogy</span>
									</div>
									
									<a class="dropdown-item" href="<?= base_url('auth/admin/AdminHome/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
								</div>
							</div>
							<div class="dropdown main-header-message right-toggle">
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /main-header -->


			<!-- mobile-header -->
			<div class="responsive main-header">
				<div class="mb-1 navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark d-sm-none ">
					<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
						<div class="d-flex order-lg-2 ml-auto">
							<form class="navbar-form nav-item my-auto d-lg-none" role="search">
								<div class="input-group nav-item my-auto">
									<input type="text" class="form-control" placeholder="Search">
									<span class="input-group-btn">
										<button type="reset" class="btn btn-default">
											<i class="ti-close"></i>
										</button>
										
									</span>
								</div>
							</form>
							<div class="d-md-flex">
								<div class="nav-item full-screen fullscreen-button">
									
								</div>
							</div>
							<div class="dropdown  nav-item main-header-message header-contact">
								
								
							</div>
							<div class="dropdown nav-item main-header-notification">
								
								
							</div>
							<div class="dropdown main-profile-menu nav nav-item nav-link">
								<a class="profile-user" href=""><img alt="" src="<?= base_url(); ?>admin_assets/img/faces/5.jpg"></a>
								<div class="dropdown-menu dropdown-menu-arrow animated fadeInUp">
									<div class="main-header-profile header-img">
										<div class="main-img-user"><img alt="" src="<?= base_url(); ?>admin_assets/img/faces/5.jpg"></div>
										<h6>Admin</h6><span>Mindtrilogy</span>
									</div>
									
									<a class="dropdown-item" href="<?= base_url('auth/admin/AdminHome/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<!-- mobile-header -->