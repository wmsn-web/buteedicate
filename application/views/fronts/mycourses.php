<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Courses | BYTEDUCATE</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="canonical" href="">
	<?php include("inc/layout.php"); ?>
</head>
<body>
	<div class="main-wrapper">

        <!-- Header -->
        <?php include("inc/header_final.php"); ?> 
        <div class="why-gamma-prep-wrapper bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="prof">
                                    <div class="row alligns-items-center">
                                        <div class="col-md-3">
                                            <span class="prof_text"><?= substr($usr['name'], 0,1); ?></span>
                                        </div>
                                        <div class="col-md-9">
                                            <span class="prof_name"><?= $usr['name']; ?></span><br>
                                            <span class="prof_name"><?= $usr['email']; ?></span><br>
                                        </div>
                                    </div>
                                    
                                </div>
                                <ul class="profile_links mt-5">
                                    <li><a href="<?= base_url('my-account'); ?>">My Account</a></li>
                                    <li><a href="<?= base_url('my-account/my-courses'); ?>">My Courses</a></li>
                                    <li><a href="<?= base_url('my-account/my-subscription'); ?>">My Subscription</a></li>
                                    <?php if($chk_vid > 0): ?>
                                        <li><a href="<?= base_url('my-account/premium-videos'); ?>">Premium Videos</a></li>
                                    <?php endif; ?>
                                    <li><a href="<?= base_url('transactions'); ?>">Transactions</a></li>
                                    <li><a href="<?= base_url('Change_password'); ?>">Change Password</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <h4>My Courses</h4>
                        <div class="row mt-3">
                            <?php if(!empty($courses)): ?>
                                <?php foreach($courses as $crs): ?>
                                    <?php $alp = $this->SiteModel->get_product_by_id($crs['prod_id']); ?>
                                    <div class="col-md-4">
                                        <a class="nav-link text-dark" href="<?= base_url('my-account/course/details/'.urlencode(base64_encode($alp['prod_slug']))); ?>">
                                            <div class="card cors_block">
                                                <div class="card-body">
                                                    <h5><?= $alp['prod_name']; ?> <i class="fas fa-arrow-right"></i></h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <?php include("inc/footer_final.php"); ?>
        <?php include("inc/js.php"); ?>
        
    </div>

</body>
</html>