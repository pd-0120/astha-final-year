<?php require_once 'nav.php' ?>
<div class="body-wrapper">
    <?php require_once 'header.php' ?>
    <!-- CONTACT ADDRESS AREA START -->
    <div class="ltn__contact-address-area mb-90">
        <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php include_once 'flash_session.php' ?>
                    </div>
                </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="asset/icons/10.png" alt="Icon Image">
                        </div>
                        <h3>Email Address</h3>
                        <p>astharealestate@gmail.com<br> jobs.astharealestate@gmail.com</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="asset/icons/11.png" alt="Icon Image">
                        </div>
                        <h3>Phone Number</h3>
                        <p>+9199898990<br>+9199898989</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <img src="asset/icons/12.png" alt="Icon Image">
                        </div>
                        <h3>Office Address</h3>
                        <p>Modhera Cross road, Mehsana<br>Gujarat, India</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT ADDRESS AREA END -->
    
    <!-- CONTACT MESSAGE AREA START -->
    <div class="ltn__contact-message-area mb-120 mb--100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__form-box contact-form-box box-shadow white-bg">
                        <h4 class="title-2">Get A Quote</h4>
                        <form id="contact-form" action="contact_post.php" method="post">
                            <input type="hidden" name="is_form_submit" value="1">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-item input-item-name ltn__custom-icon">
                                        <input type="text" name="name" placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-item input-item-email ltn__custom-icon">
                                        <input type="email" name="email" placeholder="Enter email address">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-item input-item-phone ltn__custom-icon">
                                        <input type="number" name="contactNumber" placeholder="Enter phone number">
                                    </div>
                                </div>
                            </div>
                            <div class="input-item input-item-textarea ltn__custom-icon">
                                <textarea name="query" placeholder="Enter query"></textarea>
                            </div>
                            <p><label class="input-info-save mb-0"><input type="checkbox" name="agree"> Save my name, email, and website in this browser for the next time I comment.</label></p>
                            <div class="btn-wrapper mt-0">
                                <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">get a free service</button>
                            </div>
                            <p class="form-messege mb-0 mt-20"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT MESSAGE AREA END -->

    <!-- GOOGLE MAP AREA START -->
    <div class="google-map mb-5">
       
    <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1wKpkbD4BFDcXCx_57U2fq6VOV00N04o&ehbc=2E312F&noprof=1" width="100%" height="80%" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

    </div>
    <?php include_once 'footer.php' ?>
</div>
<?php include_once 'footer1.php' ?>