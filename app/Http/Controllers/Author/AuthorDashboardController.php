<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Article;

class AuthorDashboardController extends Controller
{
    public function index(Request $request)
    {

        $articles = Article::orderBy('created_at', 'desc')->get();

        $totalArticles = $articles->count();
        $publishedCount = $articles->where('status', 'Published')->count();
        $pendingCount = $articles->where('status', 'Pending')->count();

        return view('author.dashboard', compact(
            'articles', 
            'totalArticles', 
            'publishedCount', 
            'pendingCount'
        ));
    }
}
