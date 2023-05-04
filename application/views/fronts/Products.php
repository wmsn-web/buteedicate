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
            </div>
        </div>
        

        <?php include("inc/footer_final.php"); ?>
        <?php include("inc/js.php"); ?>
    </div>

</body>
</html>