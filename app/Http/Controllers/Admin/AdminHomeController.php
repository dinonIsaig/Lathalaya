<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Filters\ArticleFilter;

class AdminHomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::where('status', 'Published');
        ArticleFilter::apply($query, $request);
        $articles = $query->latest()->take(9)->get();
        $header = Article::where('status', 'Published')->latest()->first();

        return view('admin.home', [
            'publishedArticles' => $articles,
            'headerArticle' => $header
        ]);
    }
}