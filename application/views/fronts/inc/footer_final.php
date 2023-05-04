<section class="sec_footer">
                <div class="container_header">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>
                                <span class="text-muted">NEED HELP? </span>
                                 <span class="text-info"><i class="fas fa-envelope-open-text"></i>Email</span>
                            </h5>
                            <img src="<?= base_url('assets/img/baner/footerlogo.png'); ?>" alt="logo" class="img-responsive mt-5">
                            <button onclick="unsubs_paypal()" class="btn btn-dark btn-rounded btn-sm mt-5">Cancel Membership</button>
                            <div class="mt-5">
                                <span class="text-primary tx-18">
                                    Copyright &copy;<br>
                                    Designed by Byteducate
                                </span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4">
                                    <h6 class="text-primary">LINKS</h6>
                                    <ul class="f_link">
                                        <li><a href="">About Us</a></li>
                                        <li><a href="">FAQ</a></li>
                                        <li><a href="">Terms & Conditions</a></li>
                                        <li><a href="">Refunds</a></li>
                                        
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <h6 class="text-primary">EDUCATION</h6>
                                    <ul class="f_link">
                                        <li><a href="">Market Understanding</a></li>
                                        <li><a href="">Community Support</a></li>
                                        <li><a href="">Breakdown Videos</a></li>
                                        <li><a href="">Become A Member</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <h6 class="text-primary">CONTACT US</h6>
                                    <ul class="f_link">
                                        <li><a href="">info@byteducate.com</a></li>
                                        <li><a href="">Contact Form</a></li>
                                        
                                    </ul>
                                </div>
                                <div class="col-md-12 mt-5">
                                    <p class="text-muted">
                                        You understand and acknowledge that there is a very high degree of risk involved in trading securities and, in particular, in trading forex, futures and options. Please ensure that you fully understand the risks involved. The site is providing educational content which will provide you with an indepth knowledge of the market. This site is in no way providing any investment, financial, tax, or legal advisory and do not purport to provide personalized investment, financial, tax, or legal advice in any form. None of the provided information does recommend the purchase of particular securities, nor does the provider promise or guarantee any particular results. The provider assumes no responsibility or liability for your trading and investment results, and you agree to hold the provider harmless for any such results or losses. It is up to you as a trader to make your own judgement using your own analysis.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="btm_footer text-center">
                
            </div>
<?php include("unsubs_modal.php"); ?>
<div class="flashMsg">
    <?php if($msg = $this->session->flashdata("succMsg")): ?>
        <div class="succMsg"><?= $msg; ?></div>
    <?php endif; ?>
    <?php if($msg = $this->session->flashdata("errMsg")): ?>
        <div class="errMsg"><?= $msg; ?></div>
    <?php endif; ?>
</div>