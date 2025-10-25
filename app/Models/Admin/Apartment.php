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
        'total_area',
        'covered_area',
        'semi_covered_area',
        'uncovered_area',
        'common_area',
        'storage_size',
        'ambients',
        'floor',
        'price',
        'apartment_status_id',
        'building_id'
    ];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function status()
    {
        return $this->belongsTo(ApartmentStatus::class, 'apartment_status_id', 'id');
    }

    public function coordinates()
    {
        return $this->hasOne(ApartmentCoordinate::class);
    }

    public function floorPlan()
    {
        return $this->hasOne(ApartmentFloorPlan::class);
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

    public function getFormattedTotalAreaAttribute()
    {
        $coveredArea = $this->covered_area ?? 0;
        $semiCoveredArea = $this->semi_covered_area ?? 0;
        $uncoveredArea = $this->uncovered_area ?? 0;
        $commonArea = $this->common_area ?? 0;
        $this->total_area = $coveredArea + $semiCoveredArea + $uncoveredArea + $commonArea;

        return number_format($this->total_area, 2, ',', '.') . ' m²';
    }

    public function getFormattedUncoveredAreaAttribute()
    {
        return number_format($this->uncovered_area, 2, ',', '.') . ' m²';
    }

    public function getFormattedSemiCoveredAreaAttribute()
    {
        return number_format($this->semi_covered_area, 2, ',', '.') . ' m²';
    }

    public function getFormattedCommonAreaAttribute()
    {
        return number_format($this->common_area, 2, ',', '.') . ' m²';
    }

    public function getFormattedStorageSizeAttribute()
    {
        if ($this->storage_size == NULL) {
            return '—';
        }
        return number_format($this->storage_size, 2, ',', '.') . ' m²';
    }

    public function getMappedCoordinatesAttribute(): bool
    {
        return $this->coordinates()->exists();
    }

    public static function ambients($building = null)
    {
        $query = self::select('ambients')
            ->distinct()
            ->orderBy('ambients');

        if ($building) {
            $query->where('building_id', $building);
        }

        return $query->pluck('ambients');
    }

    public static function floors($building = null)
    {
        $query = self::select('floor')
            ->distinct()
            ->orderBy('floor');

        if ($building) {
            $query->where('building_id', $building);
        }

        return $query->pluck('floor');
    }
}
