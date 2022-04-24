<?php

namespace App\Helpers;

class ErrorHandler
{
    public static function get(string $errorKey): ?string
    {
        if (isset($_SESSION['errors'][$errorKey])) {
            foreach ($_SESSION['errors'][$errorKey] as $value) {
                return ErrorHandler::Template($value);
            }
        }
        return null;
    }

    public static function display()
    // display all errors in one place 
    {
        $message = null;
        if (isset($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $errors) {
                foreach ($errors as $error) {
                    ErrorHandler::Template($error);
                    break;
                }
            }
        }
        return $message;
    }


    public static function Template(string $value)
    {
        return "<p class='text-danger font-weight-bold'> {$value} </p>";
    }
}