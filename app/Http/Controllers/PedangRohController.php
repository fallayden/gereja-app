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

    public function download(Magazine $magazine)
    {
        if (!$magazine->pdf_file || !\Illuminate\Support\Facades\Storage::disk('public')->exists($magazine->pdf_file)) {
            abort(404, 'File majalah tidak ditemukan.');
        }

        $fileName = \Illuminate\Support\Str::slug($magazine->title) . '-edisi-' . $magazine->edition_number . '.pdf';

        return \Illuminate\Support\Facades\Storage::disk('public')->download(
            $magazine->pdf_file,
            $fileName,
            ['Content-Type' => 'application/pdf']
        );
    }

    public function view(Magazine $magazine)
    {
        if (!$magazine->pdf_file || !\Illuminate\Support\Facades\Storage::disk('public')->exists($magazine->pdf_file)) {
            abort(404, 'File majalah tidak ditemukan.');
        }

        return \Illuminate\Support\Facades\Storage::disk('public')->response(
            $magazine->pdf_file,
            null,
            ['Content-Type' => 'application/pdf']
        );
    }
}
