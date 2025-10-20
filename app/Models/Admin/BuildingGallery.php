<?php

namespace App\Models\Admin;

use App\Helpers\AssetHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BuildingGallery extends Model
{
    protected $table = "building_gallery";
    protected $fillable = [
        'building_id',
        'section_id',
        'building_image',
        'type'
    ];
    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function getVideoUrlAttribute(): string
    {
        return Str::replace('http://127.0.0.1:8000', '', AssetHelper::assetURL('complex', $this->building_image));
    }

    public function getVideoUrlSectionAttribute(): string
    {
        return Str::replace('http://127.0.0.1:8000', '', AssetHelper::assetURL('buildings', $this->building_image));
    }
}
