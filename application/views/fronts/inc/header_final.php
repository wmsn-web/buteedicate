<?php $uri = $this->uri->segment(1); ?> 
<?php  ?>
<div class="header-wrapper">
            <div class="container_header">
                <nav class="navbar navbar-expand-lg gamma-header">
                    <a href="<?= base_url(); ?>" class="navbar-brand custom-logo">
                        <img src="<?= base_url(); ?>assets/img/baner/navbarlogo1.png" alt="Logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
              
                    <div class="collapse navbar-collapse custom-nav" id="navbarSupportedContent">
                        
                        <ul class="navbar-nav">
                            <?php if($this->session->userdata("userId")): ?>
                                <li class="nav-item dropdown <?php if($uri == ''){ echo ''; } ?>">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">My Account</a>
                                    <ul class="dropdown-menu">
                                    <li><a href="<?= base_url('my-account'); ?>">Profile Setting</a></li>
                                    <li><a href="<?= base_url('my-account/my-courses'); ?>">My Courses</a></li>
                                    <li><a href="<?= base_url('my-account/my-subscription'); ?>">My Subscription</a></li>
                                    <li><a href="<?= base_url('my-account/premium-videos'); ?>">Premium Videos</a></li>
                                    <li><a href="<?= base_url('transactions'); ?>">Transactions</a></li>
                                    <li><a href="<?= base_url('Change_password'); ?>">Change Password</a></li>
                                    <li><a class="text-danger" href="<?= base_url('Logout'); ?>"><i class="fas fa-power-off"></i> Logout</a></li>
                                    
                                </ul>
                                </li>
                            <?php else: ?>
                                <li class="nav-item <?php if($uri == 'Login'){ echo ''; } ?>">
                                    <a class="nav-link" href="<?= base_url('Login'); ?>">Join</a>
                                </li>
                            <?php endif; ?>
                                
                            <li class="nav-item <?php if($uri == ''){ echo ''; } ?>">
                                <a class="nav-link" href="#">Education</a>
                                
                            </li>
                            <li class="nav-item <?php if($uri == 'Products'){ echo 'active'; } ?>">
                                <a class="nav-link" href="<?= base_url('Products'); ?>">Products</a>
                            </li>
                            <li class="nav-item <?php if($uri == 'Hire'){ echo 'active'; } ?>">
                                <a class="nav-link" onclick="showHire()" href="<?= base_url('membership-plans'); ?>">Membership-Plans</a>
                            </li>
                            <li class="nav-item <?php if($uri == ''){ echo ''; } ?>">
                                <a class="nav-link" href="<?= base_url(); ?>">Testimonial</a>
                            </li>
                            <li class="nav-item <?php if($uri == 'About-Us'){ echo 'active'; } ?>">
                                <a class="nav-link" href="<?= base_url('About-Us'); ?>">About Us</a>
                            </li>
                            
                            <li class="nav-item <?php if($uri == 'Contact-Us'){ echo 'active'; } ?>">
                                <a class="nav-link" href="<?= base_url('Contact-Us'); ?>">Contact Us</a>
                            </li>
                            <li class="socials">
                                <a href="https://www.instagram.com/oharedean/">
                                    <img src="<?= base_url('assets/img/baner/header_instagramicon.png'); ?>">
                                </a>
                                <a href="https://www.facebook.com/byteducate/">
                                    <img src="<?= base_url('assets/img/baner/header_facebookicon.png'); ?>">
                                </a>
                                <a href="https://www.youtube.com/@byteducate">
                                    <img src="<?= base_url('assets/img/baner/header_youtubeicon.png'); ?>">
                                </a>
                            </li>
                        </ul>

                    </div>
                </nav>
            </div>
        </div>