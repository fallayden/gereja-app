<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $schedules = config('church.schedules');

        return view('home.index', compact('schedules'));
    }
}
