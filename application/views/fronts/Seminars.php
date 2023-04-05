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
                                    <?php if(!empty($ebooks)): ?>
                                        <li><a href="<?= base_url('my-account'); ?>">Ebooks</a></li>
                                    <?php endif; ?>
                                    <?php if(!empty($discord_links)): ?>
                                        <li><a href="<?= base_url('my-account/my-courses'); ?>">Community Access</a></li>
                                    <?php endif; ?>
                                    <?php if(!empty($prods['online_links'])): ?>
                                        <li><a href="">Online Meeting Link</a></li>
                                    <?php endif; ?>
                                    <?php if(!empty($prods['saminar_day'])): ?>
                                        <li><a href="">12 Seminar Link</a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <h4>Seminars</h4>
                        <h6>Monthly Seminars</h6>
                        <div class="row mt-5">
                            <?php $orddate = date_create($mcorse['ord_date']);
                                $mn = (int)date_format($orddate,'m')+1;
                                if($mn > 12)
                                {
                                    $m = 1;
                                    $y = (int)date_format($orddate,'Y')+1;
                                }
                                else
                                {
                                    $m = $mn;
                                    $y = date_format($orddate,'Y');
                                }
                                $d = date_format($orddate,'d');
                                
                                $ord_date = $y.'-'.$m.'-'.$d;
                                $tlv_months = tlv_months($ord_date);
                                if($prods['saminar_day'] == 1)
                                {
                                    $sfx = "<sup>st</sup>";
                                }
                                elseif($prods['saminar_day'] == 2)
                                {
                                    $sfx = "<sup>nd</sup>";
                                }
                                elseif($prods['saminar_day'] == 3)
                                {
                                    $sfx = "<sup>rd</sup>";
                                }
                                else
                                {
                                    $sfx = "<sup>th</sup>";
                                }
                                if(!empty($tlv_months)):
                                    foreach($tlv_months as $tm):
                                        $tms = date_create($tm);
                                        $td = date_create(date('Y-m-d'));
                                        $today = strtotime(date('Y-m-d'));
                                        $seminar = date_format($tms,'Y-m-').$prods['saminar_day'];
                                        $seninartime = strtotime($seminar);
                                        if($today > $seninartime)
                                        {
                                            $disb = "disabled";
                                        }
                                        else
                                        {
                                            $disb = "";
                                        }
                                    ?>
                                        <div class="col-md-3">
                                            <button onclick="window.open('<?= $prods['saminar_link']; ?>')" class="btn btn-outline-dark btn-block mt-2" <?= $disb; ?>>
                                                <?= $prods['saminar_day'].$sfx.' '.date_format($tms,'F-Y'); ?>
                                            </button>
                                        </div>
                                    <?php endforeach;
                                endif;
                                //print_r($y)
                             ?>
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