<?php
session_start();
include_once "../MiddleWares/PostRequest.php";
include_once "../MiddleWares/guest.php";
include_once "../../../vendor/autoload.php";


use App\Database\Models\User;
use App\http\Requests\Validation;
use App\Mail\VerficationCode;

$validator = new Validation;
$validator->setValueName('email')->setValue($_POST['email'])->required()->exists('users', 'email')
    ->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/');



$_SESSION['errors'] = $validator->getErrors();

if (!empty($validator->getErrors())) {
    $_SESSION['old'] = $_POST;
    header('location: ../../../signup.php');
    die;
}

$verficationCode = rand(10000, 99999); //Generate Code

$user = new User;
$user->setEmail($_POST['email'])->setVerfication_code($verficationCode);

if ($user->updateUserCode()) {
    $body = "<h4>Hello</h4> <p> Here is your Verfication Code: <b> {$verficationCode}</b> </p> <h5> Thank You</h5>";
    $verficationCode = new VerficationCode($_POST['email'], "VerficationCode", $body);
    if ($verficationCode->send()) {
        $_SESSION['verfication_email'] = $_POST['email'];
        header('location:../../../verifyCode.php? page=verifyEmail');
        die;
    } else {
        $_SESSION['errors']['mail']['error'] = "Something WentWorng. Please Try again";
        header('location:../../../verifyEmail.php');
        die;
    }
}