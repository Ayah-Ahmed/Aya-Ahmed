<?php
include_once "../MiddleWares/PostRequest.php";
include_once "../MiddleWares/guest.php";
include_once "../../../vendor/autoload.php";
session_start();

use App\Database\Models\User;
use App\http\Requests\Validation;
use App\Mail\VerficationCode;

// print_r(new VerficationCode("ayaahmed-aal@hotmail.com", "VerficationCode", 12345));
// die;
# Validation 
# Validation has errors -> save errors into session -> return redirect back with error messages
# Successfull Validation 
# Generate Code (Verfication email: 5digits)
# Password hashing 
#model User -> insert into `users` 
#Send verfication mail
# header into Verfication code page

$validator = new Validation;
$validator->setValueName('first_name')->setValue($_POST['first_name'])->required()->max(30);

$validator->setValueName('last_name')->setValue($_POST['last_name'])->required()->max(30);

$validator->setValueName('email')->setValue($_POST['email'])->required()->max(40)->unique('users')
    ->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/');

$validator->setValueName('password')->setValue($_POST['password'])->required()->confirmed($_POST['password_confirmation'])
    ->regex('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/', "Minimum eight and maximum 20 characters, at least one uppercase letter, one lowercase letter, one number and one special character");

$validator->setValueName('password_confirmation')->setValue($_POST['password_confirmation'])->required();

$validator->setValueName('phone')->setValue($_POST['phone'])->required()->unique('users')
    ->regex('/^01[0125][0-9]{8}$/');

$validator->setValueName('gender')->setValue($_POST['gender'])->required()->in(['m', 'f']);



$_SESSION['errors'] = $validator->getErrors();
//if we have errors -> redirect to html page to display errors
if (!empty($validator->getErrors())) {

    //save old values of post into session
    $_SESSION['old'] = $_POST;
    header('location: ../../../signup.php');
    die;
}

$verficationCode = rand(10000, 99999); //Generate Code

$user = new User;
$user->setFirst_name($_POST['first_name'])->setLast_name($_POST['last_name'])->setEmail($_POST['email'])->setPhone($_POST['phone'])
    ->setGender($_POST['gender'])->setPassword(password_hash($_POST['password'], PASSWORD_BCRYPT))->setVerfication_code($verficationCode);
// print_r($user);
// die;
if ($user->create()) {
    $body = "<h4>Hello</h4> <p> Here is your Verfication Code: <b> {$verficationCode}</b> </p> <h5> Thank You</h5>";
    $verficationCode = new VerficationCode($_POST['email'], "VerficationCode", $body);
    if ($verficationCode->send()) {
        $_SESSION['verfication_email'] = $_POST['email'];
        header('location:../../../verifyCode.php? page=signup');
        die;
    } else {
        $_SESSION['errors']['mail']['error'] = "Something WentWorng. Please Try again";
        header('location:../../../signup.php');
        die;
    }
} else {
    $_SESSION['errors']['something']['error'] = "Something WentWorng";
    header('location:../../../signup.php');
    die;
}