<?php require_once 'nav.php' ?>

<div class="body-wrapper">
    <?php require_once 'header.php' ?>
    <div class="ltn__login-area pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1 class="section-title">Register <br>Your Account</h1>
                    </div>
                </div>
            </div>
            <?php include_once 'flash_session.php' ?>
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="account-login-inner">
                        <form action="register_post.php" class="ltn__form-box contact-form-box" method="post">
                            <input type="text" name="firstname" placeholder="First Name" required>
                            <input type="text" name="lastname" placeholder="Last Name" required>
                            <input type="email" name="email" placeholder="Email*" required>
                            <input type="number" name="phone" placeholder="Phone*" required >
                            <input type="password" name="password" placeholder="Password*" required>
                            <div class="btn-wrapper">
                                <button class="theme-btn-1 btn reverse-color btn-block" type="submit">CREATE ACCOUNT</button>
                            </div>
                        </form>
                        <div class="by-agree text-center">
                            <div class="go-to-btn mt-2">
                                <a href="login.php">ALREADY HAVE AN ACCOUNT ?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once 'footer.php' ?>
</div>
<?php include_once 'footer1.php' ?>