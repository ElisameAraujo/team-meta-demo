<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    protected $table = "directions";
    public $timestamps = false;

    public function apartments()
    {
        $this->hasMany(Apartment::class);
    }
}
