<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app', [
            'today' => \Carbon\Carbon::now()->isoFormat('dddd, LL'),
            'todayWithTime' => date('Y-m-d H:i:s'),
        ]);
    }
}
