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
    <link rel="stylesheet" href="<?= base_url('assets/css/vid.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
                    <div class="col-md-6 mt-3">
                        <?php include("inc/player.php"); ?>
                        <h2 class="mt-2"><?= $main_vid['video_title']; ?></h2>
                        <p><?= html_entity_decode($main_vid['vid_descr']); ?></p>
                    </div>
                    <div class="col-md-3 mt-3">
                        <div class="rel_videos">
                            <?php if(!empty($rel_videos)): ?>
                                <h4>Related Videos</h4>
                                <?php foreach($rel_videos as $rvid): ?>
                                    <?php if($rvid['id'] == $main_vid['id'])
                                    {
                                        $disb = "vid_disabled";
                                        $link = "javascript:void(0)";
                                    }
                                    else
                                    {
                                        $disb = "";
                                        $link = base_url('my-account/premium-videos/play/'.urlencode($rvid['vid_slug']));
                                    }
                                    ?>
                                    <div class="col-md-12 mt-2 <?= $disb; ?>">
                                        <a href="<?= $link; ?>">
                                            <div class="vid_box_sm">
                                                <img src="<?= base_url('uploads/vid_thumb/'.$rvid['thumbnail']); ?>">
                                                <span class="play_btn"><i class="fas fa-play"></i> </span>
                                                <span class="vid_ttl"><?= $rvid['video_title']; ?></span>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <h5 class="mt-3 mb-3">All Videos from <?= $pln['plan_title']; ?></h5>
                            <?php if(!empty($all_videos)): ?>
                                <?php foreach($all_videos as $avs): ?>
                                    <?php if($avs['id'] == $main_vid['id'])
                                    {
                                        $disb = "vid_disabled";
                                        $link = "javascript:void(0)";
                                    }
                                    else
                                    {
                                        $disb = "";
                                        $link = base_url('my-account/premium-videos/play/'.urlencode($avs['vid_slug']));
                                    }
                                    ?>
                                    <div class="col-md-12 mt-2 <?= $disb; ?>">
                                        <a href="<?= $link; ?>">
                                            <div class="vid_box_sm">
                                                <img src="<?= base_url('uploads/vid_thumb/'.$avs['thumbnail']); ?>">
                                                <span class="play_btn"><i class="fas fa-play"></i> </span>
                                                <span class="vid_ttl"><?= $avs['video_title']; ?></span>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <?php include("inc/footer_final.php"); ?>
        <?php include("inc/js.php"); ?>
        <script src="<?= base_url('assets/js/vid.js'); ?>"></script>
        
    </div>

</body>
</html>