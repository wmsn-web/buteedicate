<div class="flashMsg">
            <?php if($msg = $this->session->flashdata("succMsg")): ?>
                <div class="succMsg"><?= $msg; ?></div>
            <?php endif; ?>
            <?php if($msg = $this->session->flashdata("errMsg")): ?>
                <div class="errMsg"><?= $msg; ?></div>
            <?php endif; ?>
        </div>
<div class="footer-wrapper" data-aos="fade-up">
            <div class="container">
                <div class="footer-block">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="footer-title">
                                <h4>contact us</h4>
                            </div>
                            <div class="footer-contact">
                                <ul>
                                    <li>
                                        <div class="contact-icon">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <a href="tel: +918003498887">+ 91 1234 567 890</a>
                                    </li>
                                    <li>
                                        <div class="contact-icon">
                                            <i class="fas fa-envelope-open-text"></i>
                                        </div>
                                        <a href="mailto:info@byteducate.com">info@byteducate.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="footer-title">
                                <h4>Quick links</h4>
                            </div>
                            <div class="footer-links">
                                <ul>
                                    <li>
                                        <a href="<?= base_url('About-Us'); ?>">About Us</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('Contact-Us'); ?>">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('Testimonials'); ?>">Testimonial</a>
                                    </li>
                                    
                                    <li>
                                        <a href="<?= base_url('Faq'); ?>">Faq</a>
                                    </li>
                                   
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="footer-title">
                                <h4>Follow Us</h4>
                            </div>
                            <div class="footer-social">
                                <ul>
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
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 privacy-link">
                            <ul>
                                <li><a href="<?= base_url('Privacy_Policy'); ?>">Privacy Policy</a></li>
                                <li><a href="<?= base_url('Terms_and_Conditions'); ?>">Terms & Conditions</a></li>
                            </ul>
                        </div>
                        <div class="col-12 copy-right">
                            <p>©2021 All rights reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade" id="hire" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hire from Us</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <p>Gammaprep has a great pool of students who may match your requirements, we promise to find that pool and arrange a customized free placement drive for your organization.</p>
            <p>Just fill this form, and leave the rest on us.</p><?= br(2); ?>
          <form action="<?= base_url('Home/hire'); ?>" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="form-group col-md-12">
                <label>Job Title</label>
                <input type="text" name="job_title" class="form-control" required />
              </div>
              <div class="form-group col-md-6">
                <label>Company Name</label>
                <input type="text" name="company" class="form-control" required />
              </div>
              <div class="form-group col-md-6">
                <label>Recruiter's Name</label>
                <input type="text" name="rc_name" class="form-control" required />
              </div>
              <div class="form-group col-md-6">
                <label>Recruiter's Email</label>
                <input type="text" name="rc_email" class="form-control" required />
              </div>
              <div class="form-group col-md-6">
                <label>Recruiter's Mobile Number</label>
                <input type="text" name="rc_phone" class="form-control" required />
              </div>
              
              <div class="form-group col-md-12">
                <button class="btn btn-primary">Send Request</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
 </div>
        <!--Start of Tawk.to Script-->

<!--End of Tawk.to Script-->