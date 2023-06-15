<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Products | BYTEDUCATE</title>
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
                    <h3>Products</h3>
                </div>
                <div class="gamma-block-wrap">
                    <div class="row">
                        <?php if(!empty($all_products)): ?>
                            <?php foreach($all_products as $alp): ?>
                                <?php $fetrs = $this->SiteModel->get_prod_features($alp['id']); ?>
                                <div class="col-md-3 mt-3">
                                    <a class="blank_link" href="<?= base_url('Products/details/'.$alp['prod_slug']); ?>">
                                        <div class="prod_box">
                                            <div class="prod_img">
                                                <h5><?= $alp['prod_name']; ?></h5>
                                            </div>
                                            <div class="prod_title">
                                                <h4>&#8364;<?= $alp['price']; ?></h4>
                                            </div>
                                            <div class="prod_body ht-250">
                                                <p><?= html_entity_decode($alp['descr']); ?></p><br>
                                                <b>Features</b>
                                                <ul class="prod_fetr">
                                                    <?php if(!empty($fetrs)): ?>
                                                        <?php foreach($fetrs as $fet): ?>
                                                            <li><?= $fet['name']; ?></li>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="common-title mt-5">
                    <h3>Membership Plans</h3>
                </div>
                <div class="gamma-block-wrap">
                    <div class="row">
                        <?php if(!empty($all_plans)): ?>
                            <?php foreach($all_plans as $pln): ?>
                                <?php $features = $this->AdminPanelModel->get_plan_features($pln['id']);
                                    $prd = $this->AdminPanelModel->get_plan_products($pln['id']); ?>
                                <div class="col-md-3 mt-3">
                                    <div class="prod_box_subs">
                                        <div class="prod_img">
                                            <h5><?= $pln['plan_title']; ?></h5>
                                        </div>
                                        <div class="prod_title">
                                            <h4>&#8364;<?= $pln['price']; ?>/ <?= full_durations($pln['intervals'],$pln['duration']); ?></h4>
                                        </div>
                                        <div class="prod_body ht-450">
                                            <b>Features Included</b><br>
                                            <?php if(!empty($features)): ?>
                                                    <?php foreach($features as $fet): ?>
                                                        <span class="badge badge-warning"><?= $fet['features']; ?></span>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                                <br>
                                            <b class="mt-2">Course Included</b>
                                            <ul class="prod_fetr mb-3">
                                                <?php if(!empty($prd)): ?>
                                                    <?php foreach($prd as $pr): ?>
                                                        <?php $prods = $this->AdminPanelModel->get_product_by_id($pr['prod_id']); ?>
                                                        <li><b><?= $prods['prod_name']; ?></b></li>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </ul>
                                            <div class="btm">
                                                <?php if($this->session->userdata("userId")): ?>
                                                <?php $chkPlan = $this->SiteModel->is_plan_active($this->session->userdata("userId"),$pln['id']); ?>
                                                <?php $subcr = $this->SiteModel->is_user_usbscr($this->session->userdata("userId")); ?>
                                                <?php if($chkPlan > 0): ?>
                                                    <div class="container-fluid">
                                                        <label class="ckbox">
                                                            <input type="checkbox" name="tc" id="pl__<?= $pln['id']; ?>">
                                                            <span>I acknowledge and accept the <a target="_blank" href="<?= base_url('terms-and-conditions'); ?>">terms & conditions</a> - <a href="<?= base_url('privacy-policy'); ?>" target="_blank">data policy</a>. I accept that for digital products the right to refund is partially or fully waived.</span>
                                                        </label>
                                                    </div>
                                                    <div class="text-center mt-2">
                                                        <button onclick="undubscribes('<?= $subcr['paypal_subscr_id']; ?>','<?= $pln['id']; ?>')" class="btn btn-warning">Unsubscribe</button>
                                                    </div>
                                                <?php else: ?>
                                                    <?php if(!empty($subcr)): ?>
                                                        <div class="container-fluid">
                                                            <label class="ckbox">
                                                                <input type="checkbox" id="pl__<?= $pln['id']; ?>" name="tc">
                                                                <span>I acknowledge and accept the <a target="_blank" href="<?= base_url('terms-and-conditions'); ?>">terms & conditions</a> - <a href="<?= base_url('privacy-policy'); ?>" target="_blank">data policy</a>. I accept that for digital products the right to refund is partially or fully waived.</span>
                                                            </label><br><br>
                                                        </div>
                                                        <div class="text-center">
                                                            <button onclick="upgradeSubs('<?= $pln['id']; ?>','<?= $subcr['paypal_subscr_id']; ?>')" class="btn btn-primary">Subscribe Now</button>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="container-fluid">
                                                            <label class="ckbox">
                                                                <input type="checkbox" name="tc" id="pl__<?= $pln['id']; ?>">
                                                                <span>I acknowledge and accept the <a target="_blank" href="<?= base_url('terms-and-conditions'); ?>">terms & conditions</a> - <a href="<?= base_url('privacy-policy'); ?>" target="_blank">data policy</a>. I accept that for digital products the right to refund is partially or fully waived.</span>
                                                            </label><br><br>
                                                        </div>
                                                        <div class="text-center">
                                                            <button onclick="subscribes('<?= $pln['id']; ?>','<?= $pln['plan_slug']; ?>')" class="btn btn-primary">Subscribe Now</button>
                                                            <a href="<?= base_url('membership-plans/subscribe/'.$pln['plan_slug']); ?>">
                                                                
                                                            </a>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                    
                                                <?php else: ?>
                                                    <div class="container-fluid">
                                                        <label class="ckbox">
                                                            <input type="checkbox" name="tc" id="pl__<?= $pln['id']; ?>">
                                                            <span>I acknowledge and accept the <a target="_blank" href="<?= base_url('terms-and-conditions'); ?>">terms & conditions</a> - <a href="<?= base_url('privacy-policy'); ?>" target="_blank">data policy</a>. I accept that for digital products the right to refund is partially or fully waived.</span>
                                                        </label>
                                                    </div>
                                                    <div class="text-center">
                                                        <a href="javascript:void(0)" onclick="showLogin()">
                                                            <button class="btn btn-primary">Subscribe Now</button>
                                                        </a>
                                                    </div>
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
        
</div>
        <?php include("inc/footer_final.php"); ?>
        <?php include("inc/userModal.php"); ?>
        <?php include("inc/js.php"); ?>
    <script type="text/javascript">
        <?php if($erms = $this->session->flashdata("showModl")): ?>
            $(document).ready(function(){
                $("#logMsg").html("<?= $erms; ?>");
                $("#LoginModal").modal('show');
            });
        <?php endif; ?>
        function showLogin()
        {
            $("#LoginModal").modal('show');
        }
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
        function undubscribes(subscr_id,plan_id)
        {
            if($("#pl__"+plan_id).is(':checked'))
            {
                var res = confirm("Are you sure to  unsubscription plan? Existing plan will be deactivated. Please click OK to peoceed or Cancel");
                if(res == true)
                {
                    location.href = "<?= base_url('Unsubscription/index/'); ?>"+subscr_id;
                }
            }
            else
            {
                alert("Please accept Terms & Conditions");
            }
        }
    </script>

</body>
</html>