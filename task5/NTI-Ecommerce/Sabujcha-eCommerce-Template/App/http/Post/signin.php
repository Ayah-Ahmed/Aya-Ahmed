<?php


use App\Database\Models\User;
use App\http\Requests\Validation;

include_once "../MiddleWares/PostRequest.php";
include_once "../MiddleWares/guest.php";
include_once "../../../vendor/autoload.php";
session_start();

define('Blocked', 0);
$validator = new Validation;

$validator->setValueName('email')->setValue($_POST['email'])->required()->max(40)->exists('users')
    ->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/');

$validator->setValueName('password')->setValue($_POST['password'])->required()
    ->regex('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/',);


//if we have errors -> redirect to html page to display errors
if (!empty($validator->getErrors())) {
    $_SESSION['errors'] = $validator->getErrors();
    //save old values of post into session
    $_SESSION['old'] = $_POST;
    header('location: ../../../signin.php');
    die;
}

// print_r(11111111111);

$userModel = new User;
$result = $userModel->setEmail($_POST['email'])->getUserByEmail();
if ($result->num_rows != 1) {
    $_SESSION['errors']['email']['wrong'] = "Email Not Exists";
    $_SESSION['old'] = $_POST;
    header('location: ../../../signin.php');
    die;
}
$user = $result->fetch_object(User::class);

if (!password_verify($_POST['password'], $user->getPassword())) {

    $_SESSION['errors']['password']['wrong'] = "password wrong";
    $_SESSION['old'] = $_POST;
    header('location: ../../../signin.php');
    die;
}
if ($user->getStatus() == Blocked) {
    $_SESSION['errors']['something']['block'] = "Your account has been blocked";
    $_SESSION['old'] = $_POST;
    header('location: ../../../signin.php');
    die;
}

if (is_null($user->getVerfied_email_at())) {
    $_SESSION['verfication_email'] = $_POST['email'];
    header('location:../../../verifyCode.php');
    die;
}
if (isset($_POST['remeber_me'])) {
    $remeberToken = uniqid(more_entropy: true);
    $user->setRemeber_token($remeberToken)->updateRemeberToken();
    setcookie('user', $remeberToken, time() + (365 * 24 * 60 * 60), '/');
}
$_SESSION['user'] = $user->safeData();
header('location:../../../index.php');