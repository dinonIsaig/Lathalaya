<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Filters\ArticleFilter; // 1. Added missing import

class LathalayaController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::where('status', 'Published')->latest()->skip(1)->take(9)->get();

        $header = Article::where('status', 'Published')->latest()->first();
        $query = Article::where('status', 'Published');
        ArticleFilter::apply($query, $request);

        if ($header) {
            $query->where('article_id', '!=', $header->article_id);
        }

        $articles = $query->latest()->take(9)->get();

        return view('lathalaya', [
            'publishedArticles' => $articles,
            'headerArticle' => $header
        ]);
    }

    public function show(string $id)
    {

        $article = Article::findOrFail($id);

        return view('article-view', compact('article'));
    }

}
