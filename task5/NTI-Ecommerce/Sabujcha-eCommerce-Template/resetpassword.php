<?php
$title = "Reset Password";
include_once "layouts/header.php";
include_once "App/http/MiddleWares/guest.php";

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
                                    <form action="App/http/Post/resetPassword.php" method="post">
                                        <label for="password"> Password</label>
                                        <input type="password" name="password" />
                                        <?= getError('password') ?>
                                        <label for="password_confirmation">Password Confirmation</label>
                                        <input type="password" name="password_confirmation" />
                                        <?= getError('password_confirmation') ?>
                                        <div class="button-box mt-5">
                                            <button type="submit"><span>Reset</span></button>
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
</div>
</div>

<?php

include_once "layouts/footer-scripts.php";
?>