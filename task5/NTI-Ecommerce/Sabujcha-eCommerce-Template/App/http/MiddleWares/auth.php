<?php

if (empty($_SESSION['user'])) {
    header('location: ../../../siginin.php');
    die;
}