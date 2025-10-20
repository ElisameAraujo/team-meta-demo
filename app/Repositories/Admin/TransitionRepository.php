<?php

namespace App\Repositories\Admin;

use App\Helpers\DiskHelper;
use App\Interfaces\Admin\TransitionInterface;
use App\Models\Admin\Building;
use App\Models\Admin\TransitionsGallery;

class TransitionRepository implements TransitionInterface
{
    public function newTransition($data)
    {
        $fromKey = $this->generateKey($data->type, $data->from_key);
        $toKey = $this->generateKey($data->type, $data->to_key);
        $videoPath = DiskHelper::storeImage($data->video_path, 'transitions', $data->type);

        TransitionsGallery::create([
            'from_key' => $fromKey,
            'to_key' => $toKey,
            'video_path' => $videoPath,
            'type' => $data->type
        ]);

        return true;
    }


    private function generateKey(string $type, string $key): string
    {
        $baseTypes = ['complex', 'building', 'floor', 'apartment'];
        $buildingSlugs = Building::pluck('building_slug')->toArray();

        $allowedTypes = array_merge($baseTypes, $buildingSlugs);

        $type = strtolower(trim($type));
        if (!in_array($type, $allowedTypes)) {
            throw new \InvalidArgumentException("Invalid type: $type");
        }

        return $type . ':' . trim($key);
    }
}
