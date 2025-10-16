<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ApartmentFloorPlan extends Model
{
    protected $table = "apartment_floor_plan";

    protected $fillable = [
        'apartment_id',
        'floor_plan_image'
    ];
    public function apartment()
    {
        return $this->hasMany(Apartment::class);
    }
}
