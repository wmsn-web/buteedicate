<div class="main-footer ht-40">
	<div class="container-fluid pd-t-0-f ht-100p">
		<span>Copyright © 2020 <a href="#">Byeducate</a>. Developed by <a target="_blank" href="https://whatznot.com">Whatznot Technology</a> All rights reserved.</span><!-- Developer Mr. Sanjay Natta-->
	</div>
</div>
<?php if($feed = $this->session->flashdata("Feed")): ?>
	<div class="flashd flashd-succ">
		<i class="fas fa-check"></i> <?= $feed; ?>
	</div>
<?php endif; ?>
<?php if($err = $this->session->flashdata("err")): ?>
	<div class="flashd flashd-dan">
		<i class="fas fa-check"></i> <?= $err; ?>
	</div>
<?php endif; ?>