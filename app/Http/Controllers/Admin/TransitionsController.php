<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\Admin\TransitionInterface;
use Illuminate\Http\Request;

class TransitionsController extends Controller
{
    public function __construct(private TransitionInterface $transition) {}
    public function addTransition(Request $request)
    {
        $data = (object) $request->except('_token');

        if ($request->hasFile('video_path')) {
            $this->transition->newTransition($data);
        } else {
            return redirect()->back()->with('error', 'No file selected');
        }

        return redirect()->back()->with('success', 'Transition added successfully.');
    }
}
