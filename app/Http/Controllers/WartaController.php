<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class WartaController extends Controller
{
    public function index(): View
    {
        $articles = Article::published()
            ->orderBy('published_at', 'desc')
            ->paginate(6);

        $archives = Article::published()
            ->has('attachments')
            ->with('attachments')
            ->orderBy('published_at', 'desc')
            ->take(4)
            ->get();

        return view('warta.index', compact('articles', 'archives'));
    }

    public function show(string $slug): View
    {
        $article = Article::where('slug', $slug)
            ->published()
            ->with('attachments')
            ->firstOrFail();

        $archives = Article::published()
            ->has('attachments')
            ->with('attachments')
            ->orderBy('published_at', 'desc')
            ->take(4)
            ->get();

        return view('warta.show', compact('article', 'archives'));
    }
}
