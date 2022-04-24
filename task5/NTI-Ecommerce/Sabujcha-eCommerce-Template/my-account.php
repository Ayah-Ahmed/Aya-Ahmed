<?php

$title = "My account";
include_once "layouts/header.php";
include_once "App/http/MiddleWares/auth.php";


use App\Database\Models\User;
use App\http\Requests\Validation;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update-profile'])) {
    $validator = new Validation;
    $validator->setValueName('first_name')->setValue($_POST['first_name'])->required()->max(30);
    $validator->setValueName('last_name')->setValue($_POST['last_name'])->required()->max(30);
    $validator->setValueName('gender')->setValue($_POST['gender'])->required()->in(['f', 'm']);

    if (empty($validator->getErrors())) {
        $user = new User;
        $user->setFirst_name($_POST['first_name'])->setLast_name($_POST['last_name'])
            ->setGender($_POST['gender'])->setEmail($_SESSION['user']->email);

        if ($user->update()) {
            $_SESSION['user']->first_name = $_POST['first_name'];
            $_SESSION['user']->last_name = $_POST['last_name'];
            $_SESSION['user']->gender = $_POST['gender'];
            $success = "<div class='alert alert-success text-center'> Profile updated Successfully </div>";
        } else {
            $_SESSION['errors']['something']['wrong'] = "<div class='alert alert-danger text-center'> Something wnet Wrong </div>";
        }
    } else {
        $_SESSION['errors'] = $validator->getErrors();
    }
}
include_once "layouts/navbar.php";
include_once "layouts/breadcrumb.php";
?>
<!-- my account start -->
<div class="checkout-area pb-80 pt-100">
    <div class="container">
        <div class="row">
            <div class="ml-auto mr-auto col-lg-9">
                <div class="checkout-wrapper">
                    <div id="faq" class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title">
                                    <span>1</span>
                                    <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account
                                        information
                                    </a>
                                </h5>
                            </div>
                            <div id="my-account-1" class="panel-collapse collapse show">
                                <div class="panel-body">
                                    <div class="billing-information-wrapper">
                                        <div class="account-info-wrapper">
                                            <h4>My Account Information</h4>
                                            <h5>Your Personal Details</h5>
                                        </div>

                                        <form method="post">
                                            <div class="row">
                                                <div class="col-12">
                                                    <?= getError('something') ?>
                                                    <?= $success ?? "" ?>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="billing-info">
                                                        <label>First Name</label>
                                                        <input type="text" name="first_name"
                                                            value="<?= $_SESSION['user']->first_name ?>" />
                                                        <?= getError('first_name') ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="billing-info">
                                                        <label>Last Name</label>
                                                        <input type="text" name="last_name"
                                                            value="<?= $_SESSION['user']->last_name ?>" />
                                                        <?= getError('last_name') ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="billing-info">
                                                        <label for="gender">Gender </label>
                                                        <select name="gender" id="gender" class="form-control">
                                                            <option
                                                                <?= $_SESSION['user']->gender == 'm' ? 'selected' : '' ?>
                                                                value="m">
                                                                Male
                                                            </option>
                                                            <option
                                                                <?= $_SESSION['user']->gender == 'f' ? 'selected' : '' ?>
                                                                value="f">
                                                                Female
                                                            </option>
                                                        </select>
                                                        <?= getError('gender') ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="billing-back-btn">
                                                <div class="billing-back">
                                                    <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                </div>
                                                <div class="billing-btn ">
                                                    <button type="submit" name="update-profile">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">
                                <span>2</span>
                                <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your
                                    password
                                </a>
                            </h5>
                        </div>
                        <div id="my-account-2" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="billing-information-wrapper">
                                    <div class="account-info-wrapper">
                                        <h4>Change Password</h4>
                                        <h5>Your Password</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="billing-info">
                                                <label>Password</label>
                                                <input type="password" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="billing-info">
                                                <label>Password Confirm</label>
                                                <input type="password" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="billing-back-btn">
                                        <div class="billing-back">
                                            <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                        </div>
                                        <div class="billing-btn">
                                            <button type="submit">Continue</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">
                                <span>3</span>
                                <a data-toggle="collapse" data-parent="#faq" href="#my-account-3">Modify your
                                    address book entries
                                </a>
                            </h5>
                        </div>
                        <div id="my-account-3" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="billing-information-wrapper">
                                    <div class="account-info-wrapper">
                                        <h4>Address Book Entries</h4>
                                    </div>
                                    <div class="entries-wrapper">
                                        <div class="row">
                                            <div
                                                class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                <div class="entries-info text-center">
                                                    <p>Farhana hayder (shuvo)</p>
                                                    <p>hastech</p>
                                                    <p>Road#1 , Block#c</p>
                                                    <p>Rampura.</p>
                                                    <p>Dhaka</p>
                                                    <p>Bangladesh</p>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                <div class="entries-edit-delete text-center">
                                                    <a class="edit" href="#">Edit</a>
                                                    <a href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="billing-back-btn">
                                        <div class="billing-back">
                                            <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                        </div>
                                        <div class="billing-btn">
                                            <button type="submit">Continue</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title">
                                <span>4</span>
                                <a href="wishlist.php">Modify your wish list </a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- my account end -->
<?php
include_once "layouts/footer.php";
include_once "layouts/footer-scripts.php";
?>