<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Account | BYTEDUCATE</title>
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
                                <h4>My Profile</h4>
                                <form action="<?= base_url('my-account/Home/save_profile'); ?>" method="post">
                                    <div class="row mt-3">
                                        <div class="form-group col-md-12">
                                            <input type="text" name="name" class="form-control" placeholder="Full Name" value="<?= $usr['name']; ?>">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <select name="isd" class="form-control">
                                                <?php if(!empty($isds)): ?>
                                                    <?php foreach($isds as $isd): ?>
                                                        <?php if($isd['phone_code'] == $usr['isd']){
                                                            $chkd = "selected";
                                                        }else{$chkd = "";} ?>
                                                        <option <?= $chkd; ?> class="<?= $isd['phone_code']; ?>"><?= $isd['phone_code']; ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" name="phone" class="form-control" placeholder="Mobile Number" value="<?= $usr['phone']; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="email" class="form-control" placeholder="Email Address" readonly  value="<?= $usr['email']; ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" name="address" class="form-control" placeholder="Address"  value="<?= $usr['address']; ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" name="city" class="form-control" placeholder="City" value="<?= $usr['city']; ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="text" name="country" class="form-control" placeholder="Country" value="<?= $usr['country']; ?>">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="hidden" name="id" value="<?= $usr['id']; ?>">
                                            <button class="btn btn-primary">Save Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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