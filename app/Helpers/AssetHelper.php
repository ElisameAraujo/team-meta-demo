<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class AssetHelper
{

    public static function assetExists(string $disk, ?string $path): bool
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
        if (self::assetExists($disk, $path)) {
            return asset("storage/{$disk}/{$path}");
        }

        return asset($placeholder);
    }
}
