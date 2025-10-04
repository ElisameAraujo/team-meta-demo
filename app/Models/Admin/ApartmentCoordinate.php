<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ApartmentCoordinate extends Model
{
    protected $table = "apartments_coordinates";

    protected $fillable = [
        'x_position',
        'y_position',
        'width',
        'height',
        'apartment_id',
    ];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
