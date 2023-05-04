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
                        <h4>Ebooks</h4>
                        <?php if(!empty($book_language)): ?>
                            <?php foreach($book_language as $bl): ?>
                                <button onclick="get_books('<?= $bl['language']; ?>','<?= $prods['id']; ?>')" class="btn btn-outline-dark btn-sm mt-3"><?= $bl['language']; ?></button>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <div id="book" class="row mt-3">
                            <?php if(!empty($ebooks)): ?>
                                <?php foreach($ebooks as $ebook): ?>
                                    <div class="col-md-4">
                                        <a target="_blank" href="<?= base_url('my-account/ebooks/download/'.urlencode(base64_encode($ebook['ebook_file']))); ?>" class="nav-link text-dark">
                                            <div class="card">
                                                <div class="card-body">
                                                    <span class="circlex">
                                                        <i class="fas fa-file-pdf fa-2x text-danger"></i>
                                                    </span> <span class="badge badge-success"><?= $ebook['language']; ?></span><br>
                                                    <span class="tx-16"><b><?= $ebook['book_title']; ?></b></span>
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
        </script>
    </div>

</body>
</html>