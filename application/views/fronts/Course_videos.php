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
                                        <div class="col-md-12">
                                            <h1><?= $prods['prod_name']; ?></h1>
                                        </div>
                                    </div>
                                    
                                </div>
                                <p class="mt-5"><?= html_entity_decode($prods['descr']); ?> </p>
                                <ul class="profile_links mt-5">
                                    <li><b>Contents</b></li>
                                    <?php if(!empty($ebooks)): ?>
                                        <li><a href="<?= base_url('my-account/ebooks/'.urlencode(base64_encode($prods['prod_slug']))); ?>">Ebooks</a></li>
                                    <?php endif; ?>
                                    <?php if($prods['community_access']==1): ?>
                                        <li><a href="<?= base_url('my-account/community/'.urlencode(base64_encode($prods['prod_slug']))); ?>">Community Access</a></li>
                                    <?php endif; ?>
                                    <?php if(!empty($prods['saminar_day'])): ?>
                                        <li><a href="<?= base_url('my-account/seminars/'.urlencode(base64_encode($prods['prod_slug']))); ?>">12 Seminar link</a></li>
                                    <?php endif; ?>
                                    <?php if($vids > 0): ?>
                                        <li><a href="<?= base_url('my-account/course-videos/'.urlencode(base64_encode($prods['prod_slug']))); ?>">Course Videos</a></li>
                                    <?php endif; ?>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <h4>Course Videos</h4>
                        <div class="card mt-3">
                            <div class="card-body">
                                <?php if(!empty($vid_folders)): ?>
                                    <div class="row">
                                        <?php foreach ($vid_folders as $vidos): ?>
                                            <?php $nums = $this->AdminPanelModel->get_all_video_by_type($vidos['video_type'],$prods['id']); ?>
                                            <div class="col-md-3 text-center cp" onclick="show_videos('<?= $vidos['video_type']; ?>','<?= $prods['id']; ?>')">
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

            function show_videos(video_type,prod_id)
            {
                $.post("<?= base_url('AjaxController/get_folder_videos'); ?>",{
                    video_type: video_type,
                    prod_id: prod_id
                },function(resp){
                    $("#cVids").html(resp);
                    $("#cr_vids").show();
                })
            }
        </script>
    </div>

</body>
</html>