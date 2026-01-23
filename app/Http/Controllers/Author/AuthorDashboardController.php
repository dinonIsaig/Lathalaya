<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;

class AuthorDashboardController extends Controller
{
    public function index(Request $request)
    {

        $authorId = Auth::guard('author')->id();

        $articles = Article::where('author_id', $authorId)
                            ->orderBy('created_at', 'desc')
                            ->paginate(10);

        $totalArticles = $articles->total();

        $publishedCount = Article::where('author_id', $authorId)
                            ->where('status', 'Published')
                            ->count();

        $pendingCount = Article::where('author_id', $authorId)
                            ->where('status', 'Pending')
                            ->count();

        return view('author.dashboard', compact(
            'articles', 
            'totalArticles', 
            'publishedCount', 
            'pendingCount'
        ));
    }
}
