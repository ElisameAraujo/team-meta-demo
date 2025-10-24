<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class DetailsHelper
{
    protected array $details = [];

    public function add(string $key, mixed $value): self
    {
        $this->details[$key] = $value;
        return $this;
    }

    public function all(): array
    {
        return $this->details;
    }

    public function toJson(): string
    {
        return json_encode($this->details);
    }
}
