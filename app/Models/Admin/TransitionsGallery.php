<?php

namespace App\Models\Admin;

use App\Helpers\AssetHelper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TransitionsGallery extends Model
{
    protected $fillable = [
        'from_key',
        'to_key',
        'type',
        'video_path'
    ];
    protected $table = "transitions_gallery";

    public function getOriginAttribute(): string
    {
        return Str::ucfirst(explode(':', $this->from_key)[1] ?? $this->from_key);
    }

    public function getDestinationAttribute(): string
    {
        return Str::ucfirst(explode(':', $this->to_key)[1] ?? $this->to_key);
    }

    public function getTypeTransitionAttribute(): string
    {
        $transitionName = Str::replace('-', ' ', $this->type);
        $transition = Str::title($transitionName);

        // Verifica se o último termo é um algarismo romano válido (até 100)
        if (preg_match('/\b(m{0,3}(c{0,1}(xc|xl|l)?|x{0,3})(ix|iv|v?i{0,3})?)\b$/i', $transition, $match)) {
            $transition = preg_replace('/' . preg_quote($match[0], '/') . '$/i', strtoupper($match[0]), $transition);
        }

        return $transition;
    }

    public function getVideoUrlAttribute(): string
    {
        return Str::replace('http://127.0.0.1:8000', '', AssetHelper::assetURL('transitions', $this->video_path));
    }
}
