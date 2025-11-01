<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use App\Models\Admin\{ApartmentFloorPlan, BuildingGallery, TransitionsGallery};

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

    /**
     * fileSize
     * Returns the formatted size of a file stored on a disk.
     * @param string $file Full path to the file on the disk
     * @param string $disk Name of the disk where the file is stored
     * @return string|null Formatted size (e.g., "1.2 MB") or null if the file does not exist
     */
    public static function fileSize(string $file, string $disk = 'public'): ?string
    {
        if (!Storage::disk($disk)->exists($file)) {
            return null;
        }

        $bytes = Storage::disk($disk)->size($file);
        return self::sizeFormat($bytes);
    }

    public static function scanDisk(string $disk): Collection
    {
        $map = [
            'complex' => [
                [
                    'model' => BuildingGallery::class,
                    'column' => 'building_image'
                ],
            ],
            'buildings' => [
                [
                    'model' => BuildingGallery::class,
                    'column' => 'building_image'
                ],
            ],
            'apartments' => [
                [
                    'model' => ApartmentFloorPlan::class,
                    'column' => 'floor_plan_image'
                ],
            ],
            'transitions' => [
                [
                    'model' => TransitionsGallery::class,
                    'column' => 'video_path'
                ],
            ],
        ];

        $files = Storage::disk($disk)->allFiles();

        return collect($files)->map(function ($path, $index) use ($disk, $map) {
            $filename = basename($path);
            $referenced = null;
            $referencedBy = null;

            foreach ($map[$disk] ?? [] as $entry) {
                $referenced = $entry['model']::where($entry['column'], $path)
                    ->orWhere($entry['column'], $filename)
                    ->first();

                if ($referenced) {
                    $referencedBy = class_basename($entry['model']);
                    break;
                }
            }

            return [
                'id' => $index + 1,
                'name' => $filename,
                'disk' => $disk,
                'path' => $path,
                'size' => self::fileSize($path, $disk),
                'modified_at' => self::getModifiedAtSafely($disk, $path, $referenced?->created_at),
                'created_at' => $referenced?->created_at,
                'is_orphan' => ! $referenced,
                'referenced_by' => $referencedBy,
            ];
        });
    }

    public static function getModifiedAtSafely(string $disk, string $path, ?Carbon $createdAt = null): ?string
    {
        try {
            return Carbon::createFromTimestamp(Storage::disk($disk)->lastModified($path))->format('d/m/Y H:i:s');
        } catch (\Exception $e) {
            try {
                $fullPath = Storage::disk($disk)->path($path);
                if (file_exists($fullPath)) {
                    return Carbon::createFromTimestamp(filemtime($fullPath))->format('d/m/Y H:i:s');
                }
            } catch (\Exception $e2) {
                // Ignora erro
            }

            return $createdAt ? $createdAt->format('d/m/Y H:i:s') : null;
        }
    }


    /** Funções privadas **/

    /**
     * formatSize
     * Converts a byte value to a readable string (e.g., "1.2 MB")
     * @param int $bytes Size in bytes
     * @return string Formatted Size
     */
    public static function sizeFormat(int $bytes): string
    {
        $units = ['bytes', 'KB', 'MB', 'GB', 'TB'];
        $i = 0;

        while ($bytes >= 1024 && $i < count($units) - 1) {
            $bytes /= 1024;
            $i++;
        }

        return number_format($bytes, 2, ',', '') . ' ' . $units[$i];
    }

    public static function sizeToBytes(?string $size): int
    {
        if (! $size) return 0;

        [$value, $unit] = explode(' ', $size);
        $value = (float) str_replace(',', '.', $value);

        return match (strtoupper($unit)) {
            'KB' => $value * 1024,
            'MB' => $value * 1024 * 1024,
            'GB' => $value * 1024 * 1024 * 1024,
            default => 0,
        };
    }
}
