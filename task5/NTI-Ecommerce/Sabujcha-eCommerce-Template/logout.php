<?php
session_start();
include_once "App/http/MiddleWares/auth.php";
unset($_SESSION['user']);
setcookie('user', "", time() - 1, '/');
header('location: signin.php');