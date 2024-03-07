<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Antrian;

class HomeController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        $today = now()->toDateString();
        $todayAt3PM = now()->setHour(15)->setMinute(0)->setSecond(0)->toDateTimeString();

        Antrian::where(function ($query) use ($today, $todayAt3PM) {
            $query->whereDate('created_at', '<', $today)
                ->orWhere(function ($query) use ($today, $todayAt3PM) {
                    $query->whereDate('created_at', '=', $today)
                            ->whereTime('created_at', '>', '23:00');
                });
        })->delete();

        return view('welcome');
    }
}
