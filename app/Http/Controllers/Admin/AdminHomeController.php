<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Article;


class AdminHomeController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::where('status', 'Published')->latest()->skip(1)->take(9)->get();

        $header = Article::where('status', 'Published')->latest()->first();

        return view('admin.home', [
            'publishedArticles' => $articles,
            'headerArticle' => $header
        ]);
    }


}
