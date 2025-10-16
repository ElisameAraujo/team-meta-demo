<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class DiskHelper
{

    public static function storeImage($image, string $disk, string $subfolder = '')
    {
        $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $image->getClientOriginalExtension();
        $slug = Str::slug($filename);
        $finalName = "{$slug}-" . now()->format('YmdHis') . ".{$extension}";

        return $image->storeAs($subfolder, $finalName, ['disk' => $disk]);
    }
}
