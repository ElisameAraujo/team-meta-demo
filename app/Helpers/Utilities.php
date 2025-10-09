<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Utilities
{

    public static function exists(string $disk, ?string $path): bool
    {
        return !empty($path) && Storage::disk($disk)->exists($path);
    }

    public static function url(string $disk, ?string $path): ?string
    {
        return self::exists($disk, $path) ? asset('storage/' . $disk . '/' . $path) : null;
    }
}
