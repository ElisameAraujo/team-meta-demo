<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = "sections";
    public $timestamps = false;

    public function building()
    {
        return $this->belongsTo(Building::class);
    }
}
