<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Utilities
{

    public static function imageExists(string $disk, ?string $path): bool
    {
        return !empty($path) && Storage::disk($disk)->exists($path);
    }

    /**
     * Summary of assetURL
     * @param string $disk Represents the disk defined in 'filesystems.php' file
     * @param mixed $path Receive a full path of image from 'storage' folder
     * @param mixed $placeholder Defines a fallback when a image not found in the $path variable
     * @return string
     */
    public static function assetURL(string $disk, ?string $path, ?string $placeholder = NULL): ?string
    {
        if (self::imageExists($disk, $path)) {
            return asset("storage/{$disk}/{$path}");
        }

        return asset($placeholder);
    }
}
