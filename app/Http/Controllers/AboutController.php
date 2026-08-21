<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AboutController extends Controller
{
    public function index(): View
    {
        $pastor = config('church.pastor');
        $histories = config('church.histories');
        $branches = config('church.branches');
        $creeds = config('church.creeds');

        return view('about.index', compact('pastor', 'histories', 'branches', 'creeds'));
    }
}
