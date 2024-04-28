<?php require_once 'nav.php' ?>
<div class="body-wrapper">
    <?php require_once 'header.php' ?>
    <div class="ltn__login-area pb-65">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1 class="section-title">Sign In</h1>
                    </div>
                </div>
            </div>
            <?php include_once 'flash_session.php' ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="account-login-inner">
                        <form action="login_post.php" class="ltn__form-box contact-form-box" method="post">
                            <input type="email" name="email" placeholder="Email*" required>
                            <input type="password" name="password" placeholder="Password*">
                            <div class="btn-wrapper mt-0">
                                <button class="theme-btn-1 btn btn-block" type="submit">SIGN IN</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="account-create text-center pt-50">
                        <h4>DON'T HAVE AN ACCOUNT?</h4>
                        <div class="btn-wrapper">
                            <a href="register.php" class="theme-btn-1 btn black-btn">CREATE ACCOUNT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'footer.php' ?>
</div>
<?php include_once 'footer1.php' ?>