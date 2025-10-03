<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ApartmentStatus extends Model
{
    protected $table = "apartment_status";
    public $timestamps = false;

    public function apartments()
    {
        $this->hasMany(Apartment::class);
    }
}
