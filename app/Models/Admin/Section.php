<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = "sections";
    public $timestamps = false;

    public function apartments()
    {
        $this->hasMany(Apartment::class);
    }
}
