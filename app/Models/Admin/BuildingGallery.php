<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

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
}
