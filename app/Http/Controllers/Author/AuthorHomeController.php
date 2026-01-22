<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Filters\ArticleFilter;

class AuthorHomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::where('status', 'Published');
        ArticleFilter::apply($query, $request);
        $articles = $query->latest()->take(9)->get();
        $header = Article::where('status', 'Published')->latest()->first();

        return view('author.home', [
            'publishedArticles' => $articles,
            'headerArticle' => $header
        ]);
    }
}