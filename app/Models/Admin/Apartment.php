<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;
    protected $table = "apartments";

    protected $fillable = [
        'unit_code',
        'covered_area',
        'ambients',
        'storage_size',
        'floor',
        'price',
        'apartment_status_id',
        'direction',
        'building_id'
    ];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function direction()
    {
        return $this->belongsTo(Direction::class);
    }

    public function status()
    {
        return $this->belongsTo(ApartmentStatus::class, 'apartment_status_id', 'id');
    }

    public function coordinates()
    {
        return $this->belongsTo(ApartmentCoordinates::class, 'id', 'apartment_id');
    }

    public function getFormattedPriceAttribute()
    {
        return '$ ' . number_format($this->price, 2, ',', '.');
    }

    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y H:i:s');
    }

    public function getFormattedUpdatedAtAttribute()
    {
        return Carbon::parse($this->updated_at)->format('d/m/Y H:i:s');
    }

    public function getFormattedCoveredAreaAttribute()
    {
        return number_format($this->covered_area, 2, ',', '.') . ' m²';
    }

    public function getFormattedStorageSizeAttribute()
    {
        if ($this->storage_size == NULL) {
            return '—';
        }
        return number_format($this->storage_size, 2, ',', '.') . ' m²';
    }
}
