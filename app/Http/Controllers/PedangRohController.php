<?php

namespace App\Http\Controllers;

use App\Models\Magazine;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PedangRohController extends Controller
{
    public function index(Request $request): View
    {
        $query = Magazine::query()
            ->orderBy('publish_date', 'desc')
            ->orderBy('edition_number', 'desc');

        if ($request->filled('year')) {
            $query->whereYear('publish_date', $request->integer('year'));
        }

        if ($request->filled('search')) {
            $search = $request->query('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('edition_number', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $magazines = $query->paginate(8)->withQueryString();

        $availableYears = Magazine::query()
            ->whereNotNull('publish_date')
            ->orderBy('publish_date', 'desc')
            ->get(['publish_date'])
            ->map(fn (Magazine $magazine): int => $magazine->publish_date->year)
            ->unique()
            ->values();

        return view('pedang-roh.index', compact('magazines', 'availableYears'));
    }
}
