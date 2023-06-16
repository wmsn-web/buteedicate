<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <title>Contact Us</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="canonical" href="">
    <?php include("inc/layout.php"); ?>
    
</head>
<body>
    <div class="main-wrapper">
        <!-- Header -->
        <?php include("inc/header_final.php"); ?> 
        <section class="home_about">
            <div class="container_65">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row justify-content-center">
                            <div class="col-md-10 text-center">
                                <h3 class="home_about_heading">
                                    Contact Us
                                </h3>
                                <p class="about_p">Our Vision is not only to provide a safe and reliable way to trade the markets, but also incentivize our clients with outstanding education and risk management techniques</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about_about">
            <div class="container_65">
                <div class="row">
                    <div class="col-md-6 mt-5 text_about">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Our official contact details</h4>
                                <b class="tx-20"><?= $contacts['comp_name']; ?></b>
                                <p><?= $contacts['comp_addr']; ?>, <?= $contacts['city']; ?><br><?= $contacts['state']; ?>-<?= $contacts['pin']; ?> <br><?= $contacts['country']; ?><br>
                                    <?= $contacts['phone_1']; ?>
                                    <?php if(!empty($contacts['phone_2'])): ?>
                                        <br><?= $contacts['phone_2']; ?>
                                    <?php endif; ?>
                                    <br><br>
                                    <?= $contacts['email_1']; ?>
                                    <?php if(!empty($contacts['email_2'])): ?>
                                        <br><?= $contacts['email_2']; ?>
                                    <?php endif; ?>
                                </p>
                            </div>
                           
                        </div>
                                
                    </div>
                    <div class="col-md-6 new_card">
                        <div class="card">
                            <div class="card-body">
                                <h4>Please share us your opinion</h4>
                                <form action="<?= base_url('Contacts/send_message'); ?>" method="post">
                                    <div class="container">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Full Name</label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Phone</label>
                                                <input type="text" name="phone" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Subject</label>
                                                <input type="text" name="subject" class="form-control" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <textarea class="form-control" rows="5" required name="message" placeholder="Write here your message"></textarea>
                                            </div>
                                            <div class="form-group col-md-12 text-center">
                                                <button class="btn btn-primary"><i class="fas fa-paper-plane"></i> Send Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
            
        <section class="newsletter">
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
        <?php include("inc/footer_final.php"); ?>
    </div>
    <?php include("inc/js.php"); ?>
  </body>
</html>