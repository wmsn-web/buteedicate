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
                        <h4>Premium Videos</h4>
                        <div class="card mt-3">
                            <div class="card-body">
                                <?php if(!empty($vid_folders)): ?>
                                    <div class="row">
                                        <?php foreach ($vid_folders as $vidos): ?>
                                            <?php $nums = $this->AdminPanelModel->get_all_planvideo_by_type($vidos['video_type'],$pln['id']); ?>
                                            <div class="col-md-3 text-center cp" onclick="show_videos('<?= $vidos['video_type']; ?>','<?= $pln['id']; ?>')">
                                                <img src="<?= base_url('assets/images/folder.png'); ?>" style="width: 95px;"><br>
                                                <?= ucfirst($vidos['video_type']); ?> Videos (<?= count($nums); ?>)
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div style="display:none;" id="cr_vids">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row" id="cVids">
                                        <div class="col-md-12">
                                            <h5>Daily Videos</h5>
                                        </div>
                                        <div class="col-md-3 mt-2">
                                            <div class="vid_box_sm">
                                                <img src="<?= base_url('assets/img/def.png'); ?>">
                                                <span class="play_btn"><i class="fas fa-play"></i> </span>
                                                <span class="vid_ttl">Video Title here Video Title here Video Title here</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <?php include("inc/footer_final.php"); ?>
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

            function show_videos(video_type,plan_id)
            {
                $.post("<?= base_url('AjaxController/get_folder_plan_videos'); ?>",{
                    video_type: video_type,
                    plan_id: plan_id
                },function(resp){
                    $("#cVids").html(resp);
                    $("#cr_vids").show();
                })
            }
        </script>
    </div>

</body>
</html>