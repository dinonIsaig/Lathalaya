<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Carbon;


class AdminDashboardController extends Controller
{


    public function index(Request $request)
    {
        
        $pendingArticles = Article::with('author')
        ->where('status', 'Pending') 
        ->latest('created_at')
        ->get();

        $publishedArticles = Article::with('author')
        ->where('status', 'Published') 
        ->latest('created_at')
        ->get();

        $query = Article::query()->where('status', '!=', 'Pending');


        $articles = $query->with('author')
        ->latest('created_at')
        ->paginate(10)
        ->withQueryString();

        $totalArticles = Article::count();
        $publishedCount = Article::where('status', 'Published')->count();
        $pendingCount = Article::where('status', 'Pending')->count();


        return view('admin.dashboard', compact(
                'articles', 
                'pendingArticles', 
                'publishedArticles', 
                'totalArticles', 
                'publishedCount', 
                'pendingCount'
            ));
    }


    public function destroy(Request $request)
    {
    $request->validate([
        'article_id' => 'required|exists:articles,article_id'
    ]);

        $articles = Article::where('article_id', $request->article_id)->firstOrFail();

    $articles->delete();

    return redirect()->route('admin.dashboard')
                        ->with('success', 'Transaction deleted successfully');
    }


}
