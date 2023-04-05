<?php $uri = $this->uri->segment(1); ?>
<?php  ?>
<div class="header-wrapper">
            <div class="container">
                <nav class="navbar navbar-expand-lg gamma-header">
                    <a href="<?= base_url(); ?>" class="navbar-brand custom-logo">
                        <img src="<?= base_url(); ?>assets/img/logo2.png" alt="Logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
              
                    <div class="collapse navbar-collapse custom-nav" id="navbarSupportedContent">
                        <div class="login-wrapper">
                            <?php if($this->session->userdata("userId")): ?>
                                <div class="login-button">
                                    <a href="<?= base_url('my-account'); ?>" class="">My Account</a>
                                </div>
                                <a class="logout" href="<?= base_url('Logout'); ?>">
                                    <i class="fas fa-power-off fa-2x"></i>
                                </a>
                            <?php else: ?>
                                <div class="login-button">
                                    <a href="<?= base_url('Login'); ?>" class="">Login</a>
                                </div>
                                <div class="login-button">
                                    <a href="<?= base_url('Register'); ?>" class="">Sign Up</a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <ul class="navbar-nav">
                            <li class="nav-item <?php if($uri == ''){ echo 'active'; } ?>">
                                <a class="nav-link" href="<?= base_url(); ?>">Home</a>
                            </li>
                            <li class="nav-item <?php if($uri == 'About-Us'){ echo 'active'; } ?>">
                                <a class="nav-link" href="<?= base_url('About-Us'); ?>">About Us</a>
                            </li>
                            <li class="nav-item <?php if($uri == 'Products'){ echo 'active'; } ?>">
                                <a class="nav-link" href="<?= base_url('Products'); ?>">Products</a>
                            </li>
                            <li class="nav-item <?php if($uri == 'Hire'){ echo 'active'; } ?>">
                                <a class="nav-link" onclick="showHire()" href="<?= base_url('membership-plans'); ?>">Membership-Plans</a>
                            </li>
                            
                            <li class="nav-item <?php if($uri == 'Contact-Us'){ echo 'active'; } ?>">
                                <a class="nav-link" href="<?= base_url('Contact-Us'); ?>">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>