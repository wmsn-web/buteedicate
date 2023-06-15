		
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll ">
			<div class="main-sidebar-header">
				<a class=" desktop-logo logo-light" href="<?= base_url(); ?>/admin/"><img src="<?= base_url(); ?>assets/images/logo.png" class="main-logo" alt="logo"></a>
				<a class="desktop-logo logo-dark" href="<?= base_url(); ?>/admin/"><img src="<?= base_url(); ?>assets/images/logo.png" class="main-logo dark-theme" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-light" href="<?= base_url(); ?>/admin/"><img src="<?= base_url(); ?>assets/images/logo.png" class="logo-icon" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-dark" href="<?= base_url(); ?>/admin/"><img src="<?= base_url(); ?>assets/images/logo.png" class="logo-icon dark-theme" alt="logo"></a>
			</div>
			<div class="main-sidebar-body circle-animation "> 

				<ul class="side-menu circle">
					<li><h3 class="">Dashboard</h3></li>
					<li class="slide">
						<a class="side-menu__item" href="<?= base_url(); ?>/admin/"><i class="side-menu__icon ti-desktop"></i><span class="side-menu__label">Dashboard</span></a>
					</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-layer-group menu-icon"></i><span class="side-menu__label">Products</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="<?= base_url('auth/admin/Add_Products'); ?>">Add Products</a></li>
							<li><a class="slide-item" href="<?= base_url('auth/admin/View_Products'); ?>">View Products</a></li>
							
						</ul>
					</li>

					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-cube menu-icon"></i><span class="side-menu__label">Membership Plans</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="<?= base_url('auth/admin/Add_plan'); ?>">Add Plan</a></li>
							<li><a class="slide-item" href="<?= base_url('auth/admin/View_plans'); ?>">View Plans</a></li>
							
						</ul>
					</li>
					
					

					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fas fa-users menu-icon"></i><span class="side-menu__label">Users Manage</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="<?= base_url('auth/admin/View_users'); ?>">View Users</a></li>
							
						</ul>
					</li>
					<li class="slide">
						<a class="side-menu__item" href="<?= base_url('auth/admin/Subscribers'); ?>"><i class="side-menu__icon fas fa-flag"></i><span class="side-menu__label">Subscribers</span></a>
					</li>
					<li><h3>Account</h3></li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-trending-up menu-icon"></i><span class="side-menu__label">Sale</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="<?= base_url('auth/admin/All_transactions'); ?>">All Transactions</a></li>
						</ul>
					</li>

					<li><h3>Requests</h3></li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-trending-up menu-icon"></i><span class="side-menu__label">Requests</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="<?= base_url('auth/admin/Meeting_requests'); ?>">Meeting Requests</a></li>
							<li><a class="slide-item" href="<?= base_url('auth/admin/Discord_requests'); ?>">Discord Requests</a></li>
							<li><a class="slide-item" href="<?= base_url('auth/admin/Unsubscribe_requests'); ?>">Unsubscribe Requests</a></li>
						</ul>
						
					</li>
					
					
					<li><h3>Settings</h3></li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide"  href="javascript:void(0)"><i class="side-menu__icon fas fa-globe menu-icon"></i><span class="side-menu__label">Site Settings</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							
							<li><a class="slide-item" href="<?= base_url('auth/admin/About_Us'); ?>">About Us</a></li>
							<li><a class="slide-item" href="<?= base_url('auth/admin/Terms_Condition'); ?>">Terms & Conditions</a></li>
							<li><a class="slide-item" href="<?= base_url('auth/admin/Privacy_Policy'); ?>">Privacy Policy</a></li>
							
							
						</ul>
					</li>
					
					<li class="slide">
						<a class="side-menu__item"  href="<?= base_url('auth/admin/ChangePassword'); ?>"><i class="side-menu__icon ti-key menu-icon"></i><span class="side-menu__label">Change Password</span></a>
					</li>
					
				
			
					<?= br(5); ?>
					
				</ul>
			</div>
		</aside>