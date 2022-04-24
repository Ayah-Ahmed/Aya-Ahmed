<?php
$title = "Signin";
include_once "layouts/header.php";
include_once "App/http/MiddleWares/guest.php";
include_once "layouts/navbar.php";
include_once "layouts/breadcrumb.php";
?>

<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4><?= $title ?></h4>
                        </a>

                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <?= getError('something'); ?>
                                    <form action="App/http/Post/signin.php" method="post">
                                        <input type="email" name="email" placeholder="Enter your email"
                                            value="<?= old('email') ?>" />
                                        <?= getError('email') ?>
                                        <input type="password" name="password" placeholder="Password" />
                                        <?= getError('password') ?>
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox" name="remeber_me" value="remeber"
                                                    id="remeber_me" />
                                                <label for="remeber_me">Remember me</label>
                                                <a href="verifyEmail.php">Forgot Password?</a>
                                            </div>
                                            <button type="submit"><span><?= $title ?></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once "layouts/footer.php";
include_once "layouts/footer-scripts.php";
?>