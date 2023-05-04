<div class="footer_wrapper" data-aos="fade-up">
	<div class="container_footer">
		<div class="row mt-5">
			<div class="col-md-3">
				<img src="<?= base_url('assets/img/bk_logo.png'); ?>" class="img-responsive"><br>
				<button onclick="unsubs_paypal()" class="btn btn-outline-dark mt-2">Unsubscribe Paypal</button>
				<button  onclick="unsubs_email()" class="btn btn-outline-dark mt-2">Unsubscribe Newsletter</button>
			</div>
			<div class="col-md-3">
				<h5>Links</h5>
				<ul class="footer_links">
					<li><a href="">About Us</a></li>
					<li><a href="">FAQ</a></li>
					<li><a href="">Terms & Conditions</a></li>
					<li><a href="">Privacy Policy</a></li>
				</ul>
			</div>
			<div class="col-md-3">
				<h5>Education</h5>
				<ul class="footer_links">
					<li><a href="">Market Understanding</a></li>
					<li><a href="">Community Support</a></li>
					<li><a href="">Breakdown Videos</a></li>
					<li><a href="">Become a Member</a></li>
				</ul>
			</div>
			<div class="col-md-3">
				<h5>Contact</h5>
				<ul class="footer_links">
					<li><a href="">info@byteducate.com</a></li>
					<li><a href="">+91 7063 245 845</a></li>
				</ul>
			</div>
		</div>
		<div class="disclaimer mt-4">
			<span class="title">Disclaimer</span>
			<p class="mt-4">
				Trading Forex carries a high level of risk. Please ensure you fully understand the risks involved, and seek independent advice if necessary. Dominion Markets LLC does not accept applications from residents of the U.S., Canada, United Kingdom and the Islamic Republic of Iran.
			</p>
			<p>
				The information on this site is not directed at residents in any country or jurisdiction where such distribution or use would be contrary to local law or regulation. Risk Warning: Trading Derivatives carries a high level of risk to your capital and you should only trade with money you can afford to lose. A Product Disclosure Statement (PDS) can be obtained either from this website or on request from our offices and should be considered before entering into a transaction with us.
			</p>
			<p>
				PRO accounts offer spreads from 0.0 pips with a commission charge of USD $3.50 per 100K traded based on the USD notional value. Standard accounts offer spreads from 1 pip with no additional commission charges. The information on this site is not directed at residents in any country or jurisdiction where such distribution or use would be contrary to local law or regulation.
			</p>
		</div>
		<hr>
		<div class="row justify-content-center">
			<div class="col-md-3 text-center">
				<ul class="socia_links">
					<li>
                        <a href=""><i class="fab fa-facebook-square"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="fab fa-linkedin"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="fab fa-youtube-square"></i></a>
                    </li>
				</ul>
			</div>
		</div>
		<div class="copyright text-center">
			Byteducate ©2023 All rights reserved | Developed By Whatznot Technology
		</div>
	</div>
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