<?php

namespace App\Models\Admin;

use App\Helpers\AssetHelper;
use App\Helpers\DetailsHelper;
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
        return Str::replace(config('app.url'), '', AssetHelper::assetURL('complex', $this->building_image));
    }

    public function getVideoUrlSectionAttribute(): string
    {
        return Str::replace(config('app.url'), '', AssetHelper::assetURL('buildings', $this->building_image));
    }

    public function toDetails(): DetailsHelper
    {
        return (new DetailsHelper)
            ->add('section_id', optional($this->section)->id)
            ->add('section_slug', optional($this->section)->section_slug)
            ->add('image_url', AssetHelper::assetURL('complex', $this->building_image))
            ->add('gallery_id', $this->id);
    }

    public function toDetailsBuilding(): DetailsHelper
    {
        return (new DetailsHelper)
            ->add('section_id', optional($this->section)->id)
            ->add('section_slug', optional($this->section)->section_slug)
            ->add('image_url', AssetHelper::assetURL('buildings', $this->building_image))
            ->add('building_slug', optional($this->building)->building_slug)
            ->add('gallery_id', $this->id);
    }
}
