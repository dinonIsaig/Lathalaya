<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Article;


class LathalayaController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::where('status', 'Published')->latest()->take(9)->get();

        $header = Article::where('status', 'Published')->latest()->first();

        return view('lathalaya', [
            'publishedArticles' => $articles,
            'headerArticle' => $header
        ]);
    }


}
