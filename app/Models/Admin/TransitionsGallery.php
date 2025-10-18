<?php

namespace App\Models\Admin;

use App\Helpers\AssetHelper;
use App\Helpers\DiskHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TransitionsGallery extends Model
{
    protected $fillable = [
        'from_key',
        'to_key',
        'type',
        'video_path'
    ];
    protected $table = "transitions_gallery";

    public function getOriginAttribute(): string
    {
        return Str::ucfirst(explode(':', $this->from_key)[1] ?? $this->from_key);
    }

    public function getDestinationAttribute(): string
    {
        return Str::ucfirst(explode(':', $this->to_key)[1] ?? $this->to_key);
    }

    public function getTypeTransitionAttribute(): string
    {
        return Str::ucfirst($this->type);
    }

    public function getVideoUrlAttribute(): string
    {
        return Str::replace('http://127.0.0.1:8000', '', AssetHelper::assetURL('transitions', $this->video_path));
    }
}
