<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Payment Process | Gammaprep.com</title>
    <meta name="description" content="Login to gammaprep.com">
    <meta name="keywords" content="gammaprep login">
    <link rel="canonical" href="https://www.gammaprep.com/Login">
	<?php include("inc/layout.php"); ?>
</head>
<body>
	<div class="main-wrapper">
        <div class="container">
            <div style="margin:15%; text-align:center">
                <h2>Payment Process...</h2>
                <h5>Do not refresh page or close page while processing.</h5>
                <img src="<?= base_url('assets/loder.gif'); ?>" style="width: 80px;">
            </div>
        </div>
       
        <?php include("inc/js.php"); ?>
        <script type="text/javascript">
            const myTimeout = setTimeout(loadUrl, 15000);
            function loadUrl()
            {
                location.href = "<?= base_url('Membership_plans/payment_ipn'); ?>";
            }
        </script>
    </div>

</body>
</html>