<?php

use App\Helpers\ErrorHandler;

function old(string $key): ?string
{
    return $_SESSION['old'][$key] ?? '';
}

function getError(string $key): ?string
{
    return ErrorHandler::get($key) ?? null;
}