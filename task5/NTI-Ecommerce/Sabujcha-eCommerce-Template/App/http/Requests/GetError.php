<?php

namespace App\http\Requests;

class GetError
{
    public static function Message($message)
    {
        return  ucwords(str_replace('_', ' ', $message));
    }
}