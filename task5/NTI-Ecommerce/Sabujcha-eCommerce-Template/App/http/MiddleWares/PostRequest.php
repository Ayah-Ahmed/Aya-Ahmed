<?php

// Prevent any Get method

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    http_response_code(405);
    include_once("../../../layouts/errors/405.php");
    die;
}