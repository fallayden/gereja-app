<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $schedules = Schedule::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('home.index', compact('schedules'));
    }
}
