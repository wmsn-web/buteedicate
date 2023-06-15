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
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h2><?= $alp['prod_name']; ?></h2>
                        <p><?= html_entity_decode($alp['descr']); ?> </p><br>
                        <h5>&#8364;<?= $alp['price']; ?></h5>
                        <b>Features</b>
                        <ul class="prod_fetr">
                            <?php if(!empty($fetrs)): ?>
                                <?php foreach($fetrs as $fet): ?>
                                    <li><?= $fet['name']; ?></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                        <div class="text-left mt-5">
                            <?php if(!$this->session->userdata("userId")): ?>
                                <label class="ckbox">
                                    <input type="checkbox"  required>
                                    <span>I acknowledge and accept the <a target="_blank" href="<?= base_url('terms-and-conditions'); ?>">terms & conditions</a> - <a href="<?= base_url('privacy-policy'); ?>" target="_blank">data policy</a>. I accept that for digital products the right to refund is partially or fully waived.</span>
                                </label><br>
                                <a href="javascript:void(0)" onclick="showLogin()">
                                    <button class="btn btn-primary">Buy Now</button>
                                </a>
                            <?php else: ?>
                                <?php $checkProd = $this->SiteModel->check_my_course_exists($this->session->userdata("userId"),$alp['id']); ?>
                                <?php if($checkProd > 0): ?>
                                    <a href="<?= base_url('my-account/course/details/'.urlencode(base64_encode($alp['prod_slug']))); ?>">
                                        <button class="btn btn-primary">Open</button>
                                    </a>
                                <?php else: ?>
                                    <label class="ckbox">
                                        <input type="checkbox" name="tc" id="ap__<?= $alp['id']; ?>">
                                        <span>I acknowledge and accept the <a target="_blank" href="<?= base_url('terms-and-conditions'); ?>">terms & conditions</a> - <a href="<?= base_url('privacy-policy'); ?>" target="_blank">data policy</a>. I accept that for digital products the right to refund is partially or fully waived.</span>
                                    </label><br><br>
                                    <button onclick="buyprod('<?= $alp['id']; ?>','<?= $alp['prod_slug']; ?>')" class="btn btn-primary">Buy Now</button>
                                    <a href="<?= base_url('Products/buynow/'.$alp['prod_slug']); ?>">
                                        
                                    </a>
                                <?php endif; ?>
                                    
                            <?php endif; ?>
                        </div>
                        


                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <h4>Send us your enquiry</h4>
                                <form>
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Course</label>
                                        <input type="text" name="course" class="form-control" readonly value="<?= $alp['prod_name']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea class="form-control" rows="5"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block">Send message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <?php include("inc/footer_final.php"); ?>
    </div>
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
        function buyprod(id,slug)
        {
            if($("#ap__"+id).is(':checked'))
            {
                location.href = "<?= base_url('Products/buynow/'); ?>"+slug;
            }
            else
            {
                alert("Please accept Terms & Conditions");
            }
        }
        
    </script>

</body>
</html>