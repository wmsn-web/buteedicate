<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Membership Plans | BYTEDUCATE</title>
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
                <div class="common-title">
                    <h3>Membership Plans</h3>
                </div>
                <div class="gamma-block-wrap">
                    <div class="row">
                        <?php if(!empty($all_plans)): ?>
                            <?php foreach($all_plans as $pln): ?>
                                <?php $features = $this->AdminPanelModel->get_plan_features($pln['id']);
                                    $prd = $this->AdminPanelModel->get_plan_products($pln['id']); ?>
                                <div class="col-md-3 mt-3">
                                    <div class="prod_box">
                                        <div class="prod_img">
                                            <h5><?= $pln['plan_title']; ?></h5>
                                        </div>
                                        <div class="prod_title">
                                            <h4>&#8364;<?= $pln['price']; ?>/ <?= full_durations($pln['intervals'],$pln['duration']); ?></h4>
                                        </div>
                                        <div class="prod_body ht-250">
                                            <b>Features Included</b><br>
                                            <?php if(!empty($features)): ?>
                                                    <?php foreach($features as $fet): ?>
                                                        <span class="badge badge-warning"><?= $fet['features']; ?></span>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                                <br>
                                            <b class="mt-2">Course Included</b>
                                            <ul class="prod_fetr">
                                                <?php if(!empty($prd)): ?>
                                                    <?php foreach($prd as $pr): ?>
                                                        <?php $prods = $this->AdminPanelModel->get_product_by_id($pr['prod_id']); ?>
                                                        <li><b><?= $prods['prod_name']; ?></b></li>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </ul>
                                            <div class="text-center btm">
                                                <?php if($this->session->userdata("userId")): ?>
                                                <?php $chkPlan = $this->SiteModel->is_plan_active($this->session->userdata("userId"),$pln['id']); ?>
                                                <?php $subcr = $this->SiteModel->is_user_usbscr($this->session->userdata("userId")); ?>
                                                <?php if($chkPlan > 0): ?>
                                                    <button onclick="undubscribes('<?= $subcr['paypal_subscr_id']; ?>')" class="btn btn-warning">Unsubscribe</button>
                                                <?php else: ?>
                                                    <?php if(!empty($subcr)): ?>
                                                        <label class="ckbox">
                                                            <input type="checkbox" id="pl__<?= $pln['id']; ?>" name="tc" checked>
                                                            <span>  I accept all <a target="_blank" href="<?= base_url('terms-and-conditions'); ?>">terms & conditions</a> (gtc) - <a href="<?= base_url('privacy-policy'); ?>" target="_blank">data policy</span></a>
                                                        </label><br><br>
                                                        <button onclick="upgradeSubs('<?= $pln['id']; ?>','<?= $subcr['paypal_subscr_id']; ?>')" class="btn btn-primary">Subscribe Now</button>
                                                    <?php else: ?>
                                                        <label class="ckbox">
                                                            <input type="checkbox" name="tc" checked id="pl__<?= $pln['id']; ?>">
                                                            <span>  I accept all <a target="_blank" href="<?= base_url('terms-and-conditions'); ?>">terms & conditions</a> (gtc) - <a href="<?= base_url('privacy-policy'); ?>" target="_blank">data policy</span></a>
                                                        </label><br><br>
                                                        <button onclick="subscribes('<?= $pln['id']; ?>','<?= $pln['plan_slug']; ?>')" class="btn btn-primary">Subscribe Now</button>
                                                        <a href="<?= base_url('membership-plans/subscribe/'.$pln['plan_slug']); ?>">
                                                            
                                                        </a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                    
                                                <?php else: ?>
                                                    <label class="ckbox">
                                                        <input type="checkbox" checked  required>
                                                        <span>  I accept all <a target="_blank" href="<?= base_url('terms-and-conditions'); ?>">terms & conditions</a> (gtc) - <a href="<?= base_url('privacy-policy'); ?>" target="_blank">data policy</a></span>
                                                    </label>
                                                    <a href="<?= base_url('Login'); ?>">
                                                        <button class="btn btn-primary">Subscribe Now</button>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        

        <?php include("inc/footer_final.php"); ?>
    </div>
        <?php include("inc/js.php"); ?>
    <script type="text/javascript">
        function upgradeSubs(plan_id,subscr_id)
        {
            if($("#pl__"+plan_id).is(':checked'))
            {
                var res = confirm("Are you sure to change subscription plan? Existing plan will be deactivated. Please click OK to peoceed or Cancel");
                if(res == true)
                {
                    location.href = "<?= base_url('Upgrade_subscription/index/'); ?>"+plan_id+"/"+subscr_id;
                }
            }
            else
            {
                alert("Please accept Terms & Conditions");
            }
        }
        function subscribes(plan_id,plan_slug)
        {
            if($("#pl__"+plan_id).is(':checked'))
            {
                location.href = "<?= base_url('membership-plans/subscribe/'); ?>"+plan_slug;
            }
            else
            {
                alert("Please accept Terms & Conditions");
            }
        }
        function undubscribes(subscr_id)
        {
            var res = confirm("Are you sure to  unsubscription plan? Existing plan will be deactivated. Please click OK to peoceed or Cancel");
            if(res == true)
            {
                location.href = "<?= base_url('Unsubscription/index/'); ?>"+subscr_id;
            }
        }
    </script>

</body>
</html>