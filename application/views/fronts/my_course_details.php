<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $prods['prod_name']; ?> | BYTEDUCATE</title>
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
                                <b>Features</b>
                                <ul class="prod_fetr">
                                    <?php if(!empty($fetrs)): ?>
                                        <?php foreach($fetrs as $fet): ?>
                                            <li><?= $fet['name']; ?></li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul> 
                                <ul class="profile_links mt-5">
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
                        <h4>Contents</h4>
                        <div class="row mt-3">
                            <?php if(!empty($ebooks)): ?>
                                <div class="col-md-4">
                                    <a class="nav-link text-white" href="<?= base_url('my-account/ebooks/'.urlencode(base64_encode($prods['prod_slug']))); ?>">
                                        <div class="card bg-primary card-img-holder text-white">
                                            <div class="card-body">
                                                <img src="<?= base_url(); ?>admin_assets/img/svgicons/circle.svg" class="card-img-absolute" alt="circle-image">
                                                <h4 class="font-weight-normal  mb-3">eBook
                                                    <i class="fas fa-file-pdf  tx-30 float-right"></i>
                                                </h4>
                                                <h2 class="mb-0"><?= count($ebooks); ?></h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if($prods['community_access']==1): ?>
                                <div class="col-md-4">
                                    <a class="nav-link text-white" href="<?= base_url('my-account/community/'.urlencode(base64_encode($prods['prod_slug']))); ?>">
                                        <div class="card bg-warning card-img-holder text-white">
                                            <div class="card-body">
                                                <img src="<?= base_url(); ?>admin_assets/img/svgicons/circle.svg" class="card-img-absolute" alt="circle-image">
                                                <h4 class="font-weight-normal  mb-3">Community Access
                                                    <i class="fas fa-link  tx-30 float-right"></i>
                                                </h4>
                                                <h2 class="mb-0"></h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <?php if(!empty($prods['saminar_day'])): ?>
                                <div class="col-md-4">
                                    <a class="nav-link text-white" href="<?= base_url('my-account/seminars/'.urlencode(base64_encode($prods['prod_slug']))); ?>">
                                        <div class="card bg-dark card-img-holder text-white">
                                            <div class="card-body">
                                                <img src="<?= base_url(); ?>admin_assets/img/svgicons/circle.svg" class="card-img-absolute" alt="circle-image">
                                                <h4 class="font-weight-normal  mb-3">12 Seminar link
                                                    <i class="fas fa-calendar-alt  tx-30 float-right"></i>
                                                </h4>
                                                <h2 class="mb-0">
                                                    <?php if(!empty($prods['saminar_day'])): ?>
                                                        <span class="badge badge-success">Active</span>
                                                    <?php else: ?>
                                                        <span class="badge badge-danger">Not Added</span>
                                                    <?php endif; ?>
                                                </h2>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if(!empty($prods['online_links'])): ?>
                                <?php $chk_link = $this->SiteModel->check_meetlink_approval($user_id); ?>
                                <?php if(!empty($chk_link)): ?>
                                    <?php $dt = date_create($chk_link['dates'].' '.$chk_link['times'].':00'); ?>
                                    <?php if($chk_link['status']==1):
                                        $lnk = $chk_link['link_url'];
                                        $sts = '<span class="badge badge-success">Active</span>';
                                    else:
                                        $lnk = "javascript:void(0)";
                                        $sts = '<span class="badge badge-danger">Pending Approval</span>';
                                    endif; ?> 
                                    <div class="col-md-4">
                                        <a target="_blank" class="nav-link text-white" href="<?= $lnk; ?>">
                                            <div class="card bg-info card-img-holder text-white">
                                                <div class="card-body">
                                                    <img src="<?= base_url(); ?>admin_assets/img/svgicons/circle.svg" class="card-img-absolute" alt="circle-image">
                                                    <h4 class="font-weight-normal  mb-3">Online Meeting link
                                                        <i class="fas fa-hands-helping  tx-30 float-right"></i>
                                                    </h4>
                                                    <span>
                                                        <?= date_format($dt,'d F Y h:i A'); ?>
                                                    </span>
                                                    <?= $sts; ?>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php else: ?>
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5>Get online appointment</h5>
                                                <hr>
                                                <form action="<?= base_url('my-account/course/submit_appoint'); ?>" method="post">
                                                    <div class="row">
                                                        <div class="form-group col-md-3">
                                                            <label>Select Date</label>
                                                            <input type="date" name="dates" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Select Time</label>
                                                            <input type="time" name="times" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Appointment for (10-60minutes)</label>
                                                            <input type="text" name="appoint_for" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <input type="hidden" name="user_id" value="<?= $user_id; ?>">
                                                            <button class="btn btn-primary btn-block mt-3">Apply</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <?php include("inc/footer_final.php"); ?>
        <?php include("inc/js.php"); ?>
        
    </div>

</body>
</html>