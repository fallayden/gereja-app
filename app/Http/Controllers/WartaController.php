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

    public function downloadAttachment(\App\Models\ArticleAttachment $attachment)
    {
        if (!$attachment->file_path || !\Illuminate\Support\Facades\Storage::disk('public')->exists($attachment->file_path)) {
            abort(404, 'File lampiran tidak ditemukan.');
        }

        $fileName = $attachment->file_name ?: basename($attachment->file_path);
        if (!\Illuminate\Support\Str::endsWith(strtolower($fileName), '.pdf')) {
            $fileName .= '.pdf';
        }

        return \Illuminate\Support\Facades\Storage::disk('public')->download(
            $attachment->file_path,
            $fileName,
            ['Content-Type' => 'application/pdf']
        );
    }

    public function viewAttachment(\App\Models\ArticleAttachment $attachment)
    {
        if (!$attachment->file_path || !\Illuminate\Support\Facades\Storage::disk('public')->exists($attachment->file_path)) {
            abort(404, 'File lampiran tidak ditemukan.');
        }

        return \Illuminate\Support\Facades\Storage::disk('public')->response(
            $attachment->file_path,
            null,
            ['Content-Type' => 'application/pdf']
        );
    }
}
