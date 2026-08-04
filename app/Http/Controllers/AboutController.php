<?php

namespace App\Http\Controllers;

use App\Models\BranchChurch;
use App\Models\Creed;
use App\Models\History;
use App\Models\PastorProfile;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function index(): View
    {
        $pastor = PastorProfile::where('is_active', true)->first();
        $histories = History::orderBy('sort_order')->get();
        $branches = BranchChurch::orderBy('sort_order')->get();
        $creeds = Creed::orderBy('sort_order')->get();

        return view('about.index', compact('pastor', 'histories', 'branches', 'creeds'));
    }
}
