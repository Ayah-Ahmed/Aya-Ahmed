<?php

include_once "../MiddleWares/PostRequest.php";
include_once "../MiddleWares/guest.php";
include_once "../../../vendor/autoload.php";
session_start();

use App\Database\Models\User;
use App\http\Requests\Validation;

$validator = new Validation;
$validator->setValueName('password')->setValue($_POST['password'])->required()->confirmed($_POST['password_confirmation'])
    ->regex('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/', "Minimum eight and maximum 20 characters, at least one uppercase letter, one lowercase letter, one number and one special character");
$validator->setValueName('password_confirmation')->setValue($_POST['password_confirmation'])->required();

if (!empty($validator->getErrors())) {
    $_SESSION['errors'] = $validator->getErrors();
    $_SESSION['old'] = $_POST;
    header('location: ../../../resetpassword.php');
    die;
}

$user = new User;
$user->setEmail($_SESSION['verfication_email'])->setPassword(password_hash($_POST['password'], PASSWORD_BCRYPT));

if (!$user->updatePassword()) {
    $_SESSION['errors']['code']['wrong'] = "Something went Wrong";
    $_SESSION['old'] = $_POST;
    header('location: ../../../resetpassword.php');
    die;
}
unset($_SESSION['verfication_email']);
header('location:../../../signin.php');