<?php


use App\Database\Models\User;
use App\http\Requests\Validation;

include_once "../MiddleWares/PostRequest.php";
include_once "../MiddleWares/guest.php";
include_once "../../../vendor/autoload.php";
session_start();

$validator = new Validation;
$validator->setValueName('code')->setValue($_POST['code'])->required()->integer()->digit(5)->exists('users', "verfication_code");



$_SESSION['errors'] = $validator->getErrors();
//if we have errors -> redirect to html page to display errors
if (!empty($validator->getErrors())) {
    //save old values of post into session
    $_SESSION['old'] = $_POST;
    header('location: ../../../verifyCode.php?page=' . $_GET['page']);
    die;
}

$user = new User;
$user->setEmail($_SESSION['verfication_email'])->setVerfication_code($_POST['code']);
$result = $user->checkCode();
if ($result->num_rows != 1) {

    $_SESSION['errors']['code']['wrong'] = "Wrong Code";
    $_SESSION['old'] = $_POST;
    header('location: ../../../verifyCode.php?page=' . $_GET['page']);
    die;
}

if ($_GET['page'] == 'signup') {
    $user->setVerfied_email_at(date('Y-m-d H:i:s'));
    if ($user->makeUserVerified()) {
        header('location: ../../../signin.php');
        die;
    } else {
        $_SESSION['errors']['something']['error'] = "Something WentWorng";
        $_SESSION['old'] = $_POST;
        header('location: ../../../verifyCode.php?page='  . $_GET['page']);
        die;
    }
    // include_once "../../../signin.php";
} elseif ($_GET['page'] == 'verifyEmail') {
    header('location: ../../../resetpassword.php');
    die;
}