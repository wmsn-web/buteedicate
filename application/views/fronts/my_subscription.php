<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Subscription | BYTEDUCATE</title>
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
                        <div class="card">
                            <div class="card-body">
                                <h4>My Subscription</h4>
                                <div class="mt-2">
                                    <h5><i class="fas fa-check-circle text-success"></i> <?= $mplan['plan_title']; ?></h5>
                                    <button onclick="undubscribes('<?= $subs['paypal_subscr_id']; ?>')" class="btn btn-outline-danger btn-sm">Uncscribe</button>
                                </div>
                                <?php $gtprods = $this->SiteModel->get_my_plan_product($mplan['id'],$this->session->userdata("userId")); ?>
                                <?php if(!empty($gtprods)): ?>
                                    <h4 class="mt-3">Claim Subscription courses</h4>
                                    <div class="row mt-2">
                                        <?php foreach($gtprods as $gtprod): ?>
                                            <?php $prod = $this->SiteModel->get_product_by_id($gtprod); ?>
                                            <div class="col-md-3">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <h6><?= $prod['prod_name']; ?></h6>
                                                        <a href="<?= base_url('Claim_course/index/'.$prod['id']); ?>">
                                                            <button class="btn btn-primary btn-sm mt-4">Claim Now</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <?php include("inc/footer_final.php"); ?>
        <?php include("inc/js.php"); ?>
        <script type="text/javascript">
            function undubscribes(subscr_id)
            {
                var res = confirm("Are you sure to  unsubscription plan? Existing plan will be deactivated. Please click OK to peoceed or Cancel");
                if(res == true)
                {
                    location.href = "<?= base_url('Unsubscription/index/'); ?>"+subscr_id;
                }
            }
        </script>
    </div>

</body>
</html>