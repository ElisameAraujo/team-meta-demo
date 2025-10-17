<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;
    protected $table = "buildings";
    protected $fillable = [
        'building_name',
        'background',
        'building_slug',
        'apartments_available'
    ];

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
    }

    public function gallery()
    {
        return $this->hasMany(BuildingGallery::class);
    }

    public function overviewImage()
    {
        return $this->hasOne(BuildingGallery::class)->whereNull('section_id')
            ->where('type', 'overview');
    }

    public function sectionImages()
    {
        return $this->hasMany(BuildingGallery::class)->whereNotNull('section_id');
    }


    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y H:i:s');
    }

    public function getFormattedUpdatedAtAttribute()
    {
        return Carbon::parse($this->updated_at)->format('d/m/Y H:i:s');
    }

    public static function buildingsList()
    {
        return self::select('building_name', 'building_slug')
            ->orderBy('building_name', 'asc')
            ->get();
    }
}
