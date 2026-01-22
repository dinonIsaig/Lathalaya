<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Filters\ArticleFilter; // 1. Added missing import

class LathalayaController extends Controller
{
    public function index(Request $request)
    {

        $query = Article::where('status', 'Published');
        ArticleFilter::apply($query, $request);
        $header = (clone $query)->latest()->first();
        $articles = $query->latest()
            ->when($header, function ($q) use ($header) {
                return $q->where('article_id', '!=', $header->article_id);
            })
            ->take(9)
            ->get();

        return view('lathalaya', [
            'publishedArticles' => $articles,
            'headerArticle' => $header
        ]);
    }
}