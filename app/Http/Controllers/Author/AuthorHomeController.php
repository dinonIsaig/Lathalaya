<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Article;

class AuthorHomeController extends Controller
{
    public function index(Request $request)
    {

        $articles = Article::where('status', 'Published')->latest()->take(9)->get();

        $header = Article::where('status', 'Published')->latest()->first();

        return view('author.home', [
            'publishedArticles' => $articles,
            'headerArticle' => $header
        ]);
    }
}