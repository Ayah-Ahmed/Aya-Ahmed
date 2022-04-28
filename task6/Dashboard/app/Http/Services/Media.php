<?php

namespace App\Http\Services;

use Illuminate\Http\UploadedFile;

class Media
{
    public static function upload(UploadedFile $image, string $directory): string
    {
        $photo = $image->hashName();

        $image->move(public_path("assets/images/{$directory}"), $photo);
        return $photo;
    }

    public static function delete(string $image, string $directory)
    {
        if (file_exists(public_path("assets/images/{$directory}/$image"))) {
            unlink(public_path("assets/images/{$directory}/$image"));
            return true;
        }
        return false;
    }
}