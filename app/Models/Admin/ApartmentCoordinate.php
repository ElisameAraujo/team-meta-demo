<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApartmentCoordinate extends Model
{
    use HasFactory;
    protected $table = "apartments_coordinates";

    protected $fillable = [
        'x_position',
        'y_position',
        'width',
        'height',
        'points',
        'type',
        'apartment_id',
    ];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class, 'apartment_id', 'id');
    }
}
