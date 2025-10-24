<?php

namespace App\Interfaces\Admin;

interface TransitionInterface
{
    public function newTransition($data);
    public function updateTransition($data);
}
