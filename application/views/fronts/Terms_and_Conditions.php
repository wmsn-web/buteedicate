<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Terms & Conditions | BYTEDUCATE</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="canonical" href="">
	<?php include("inc/layout.php"); ?>
</head>
<body>
	<div class="main-wrapper">

        <!-- Header -->
        <?php include("inc/header_final.php"); ?> 
        <section class="home_about">
            <div class="container_65">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row justify-content-center">
                            <div class="col-md-10 text-center">
                                <h3 class="home_about_heading">
                                    Terms & Conditions
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="why-gamma-prep-wrapper bg-white">
            <div class="container_65">
                <div class="gamma-block-wrap">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page_text">
                                <?= html_entity_decode($terms['trems_details']); ?>
                            </div>
                        </div>
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