<?php

namespace App\Http\Controllers;

use App\Models\Magazine;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PedangRohController extends Controller
{
    public function index(Request $request): View
    {
        $query = Magazine::query()->orderBy('year', 'desc')->orderBy('edition', 'desc');

        if ($request->filled('year')) {
            $query->where('year', $request->query('year'));
        }

        if ($request->filled('search')) {
            $search = $request->query('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('edition', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $magazines = $query->paginate(8)->withQueryString();

        $availableYears = Magazine::select('year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        return view('pedang-roh.index', compact('magazines', 'availableYears'));
    }
}
