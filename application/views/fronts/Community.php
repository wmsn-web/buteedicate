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
        <?php include("inc/header.php"); ?>
        <div class="why-gamma-prep-wrapper bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="prof">
                                    <div class="row alligns-items-center">
                                        <div class="col-md-12">
                                            <h1><?= $prods['prod_name']; ?></h1>
                                        </div>
                                    </div>
                                    
                                </div>
                                <p class="mt-5"><?= html_entity_decode($prods['descr']); ?> </p>
                                <b>Contents</b>
                                <ul class="profile_links mt-5">
                                    <li>
                                        <a href="<?= base_url('my-account/my-courses'); ?>">My Courses</a>
                                    </li>
                                    <?php if(!empty($ebooks)): ?>
                                        <li><a href="<?= base_url('my-account/ebooks/'.urlencode(base64_encode($prods['prod_slug']))); ?>">Ebooks</a></li>
                                    <?php endif; ?>
                                    <?php if(!empty($discord_links)): ?>
                                        <li><a href="<?= base_url('my-account/community/'.urlencode(base64_encode($prods['prod_slug']))); ?>">Community Access</a></li>
                                    <?php endif; ?>
                                    <?php if(!empty($prods['online_links'])): ?>
                                        <li><a target="_blank" href="<?= $prods['online_links']; ?>">Online Meeting Link</a></li>
                                    <?php endif; ?>
                                    <?php if(!empty($prods['saminar_day'])): ?>
                                        <li><a target="_blank" href="<?= $prods['saminar_link']; ?>">12 Seminar Link</a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <h4>Community Access</h4>
                        <div class="card mt-3">
                            <div class="card-body">
                                <?php if(!empty($discord_links)): ?>
                                    <?php if($discord_links['status']==0): ?>
                                        <h6 class="text-danger"><em>Pending review</em></h6>
                                        <form>
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label>Discord Account Name/username</label>
                                                    <input type="text" name="ac_name" class="form-control" readonly value="<?= $discord_links['ac_name']; ?>">
                                                </div>
                                            </div>
                                        </form>
                                    <?php else: ?>
                                        <a target="_blank" href="<?= $discord_links['url_link']; ?>"><?= $discord_links['url_link']; ?></a>
                                    <?php endif; ?>
                                <?php else: ?>
                                        <h6 class="text-danger"><em>Add your Discord Account</em></h6>
                                        <form action="<?= base_url('my-account/Community/save_discord'); ?>" method="post">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label>Discord Account Name/username</label>
                                                    <input type="text" name="ac_name" class="form-control" required>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <input type="hidden" name="user_id" value="<?= $usr['id']; ?>">
                                                    <button class="btn btn-primary btn-sm">Get Invite link</button>
                                                </div>
                                            </div>
                                        </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <?php include("inc/footer.php"); ?>
        <?php include("inc/js.php"); ?>
        <script type="text/javascript">
            function get_books(language,prod_id)
            {
                $.post("<?= base_url('AjaxController/get_book_by_languages'); ?>",{
                    language: language,
                    prod_id: prod_id
                },function(resp){
                    $("#book").html(resp);
                })
            }
        </script>
    </div>

</body>
</html>