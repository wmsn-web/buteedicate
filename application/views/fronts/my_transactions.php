<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Transactions | BYTEDUCATE</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="canonical" href="">
	<?php include("inc/layout.php"); ?>
</head>
<body>
	<div class="main-wrapper">

        <!-- Header -->
        <?php include("inc/header.php"); ?>
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
                                    <li><a href="<?= base_url('transactions'); ?>">Transactions</a></li>
                                    <li><a href="<?= base_url('Change_password'); ?>">Change Password</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <h4>Transactions</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Date</th>
                                                <th>TXNID</th>
                                                <th>Product/Subscription</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(!empty($transactions)): ?>
                                                <?php $s=1; foreach($transactions as $trns): $sl=$s++; ?>
                                                <?php $dt = date_create($trns['ord_date']); ?>
                                                <?php if($trns['product_id'] == 0)
                                                {
                                                    $pln = $this->SiteModel->get_plan_by_id($trns['plan_id']);
                                                    $types = "Subscription";
                                                    $prod = $pln['plan_title'];
                                                }
                                                else
                                                {
                                                    $prod = $this->SiteModel->get_product_by_id($trns['product_id']);
                                                    $types = "Product";
                                                    $prod = $prod['prod_name'];
                                                }
                                                ?>
                                                    <tr>
                                                        <td><?= $sl; ?></td>
                                                        <td><?= date_format($dt,'d F Y'); ?></td>
                                                        <td><?= $trns['txn_id']; ?></td>
                                                        <td>
                                                            <?= $prod; ?><br>
                                                            <small class="text-info"><?= $types; ?></small>
                                                        </td>
                                                        <td><?= $trns['payment_gross']; ?><?= $trns['currency_code']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <?php include("inc/footer.php"); ?>
        <?php include("inc/js.php"); ?>
        
    </div>

</body>
</html>