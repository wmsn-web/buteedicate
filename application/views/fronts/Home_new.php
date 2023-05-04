<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <title>BYTEDUCATE</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="canonical" href="">
    <?php include("inc/layout.php"); ?>
    
</head>
<body>
    <div class="main-wrapper">
        <!-- Header -->
        <?php include("inc/header.php"); ?>
        <section class="home_top" data-aos="fade-up">
            <div class="container_65">
                <div class="row alligns-items-center">
                    <div class="col-md-5">
                        <img src="<?= base_url('assets/img/home_pic/home1.png'); ?>" class="img-responsive">
                    </div>
                    <div class="col-md-7">
                        <div class="home_text mt-5 bg_light_gray">
                            <h3>Revamped Online Course</h3>
                            <p>The first part to your journey is our online course, which is over a 100+ hours of content that covers all the basic to advanced resources you need to fully understand trading.</p>
                            <p>The first part to your journey is our online course, which is over a 100+ hours of content that covers all the basic to advanced resources you need to fully understand trading. The first part to your journey is our online course, which is over a 100+ hours of content that covers all the basic to advanced resources you need to fully understand trading.</p>
                            <a href="" class="read_more">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="home_text mt-5 bg_light_gray">
                            <h3>Write Next heading here </h3>
                            <p>The first part to your journey is our online course, which is over a 100+ hours of content that covers all the basic to advanced resources you need to fully understand trading.</p>
                            <p>The first part to your journey is our online course, which is over a 100+ hours of content that covers all the basic to advanced resources you need to fully understand trading. The first part to your journey is our online course, which is over a 100+ hours of content that covers all the basic to advanced resources you need to fully understand trading.</p>
                            <a href="" class="read_more">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img src="<?= base_url('assets/img/home_pic/home2.png'); ?>" class="img-responsive">
                    </div>
                </div>
            </div>
        </section>
        <section class="home_about" data-aos="fade-up">
            <div class="container_65">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row justify-content-center">
                            <div class="col-md-10 text-center">
                                <h3 class="home_about_heading">
                                    Why We Are Different
                                </h3>
                                <p class="about_p">Our Vision is not only to provide a safe and reliable way to trade the markets, but also incentivize our clients with outstanding education and risk management techniques</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="newsletter" data-aos="fade-up">
            <div class="container_65">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Take a step forward, open an account with us</h3>
                        <button class="btn btn-prime mt-3">Open an account</button>
                        <h3 class="mt-5">Want to stay updated?</h3>
                        <h2 class="text_light mt-2">Sign up to our newsletter to keep in touch with us!</h2>
                        <form action="<?= base_url('Home/subscribe_email'); ?>" method="post">
                            <div class="row mt-3">
                                <div class="form-group col-md-3">
                                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" name="email" class="form-control" placeholder="Email Address" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <button class="btn btn-prime">Subscribe</button>
                                </div>
                                <div class="form-group col-md-12">
                                     <label>
                                        <input type="checkbox" name="accept_trms" class="f_ckbox" required>
                                        I consent to receiving emails from Byteducate. You can unsubscribe at any time by clicking the link in the footer of our emails. We use Trading marketing platform. By clicking below to subscribe, you acknowledge that you will get our daily Newsletter.
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <?php include("inc/footer_new.php"); ?>
    </div>
    <?php include("inc/js.php"); ?>
  </body>
</html>