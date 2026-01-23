<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Author;
use App\Filters\ArticleFilter;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Carbon;


class AdminDashboardController extends Controller
{


    public function index(Request $request)
    {
        $pendingQuery = Article::with('author')->where('status', 'Pending');
        $pendingArticles = ArticleFilter::apply($pendingQuery, $request)
            ->latest('created_at')
            ->paginate(10)
            ->withQueryString();

        $publishedQuery = Article::with('author')->where('status', 'Published');
        $publishedArticles = ArticleFilter::apply($publishedQuery, $request)
            ->latest('created_at')
            ->paginate(10)
            ->withQueryString();

        $query = Article::query()->where('status', '!=', 'Pending');
        $articles = ArticleFilter::apply($query, $request)
            ->with('author')
            ->latest('created_at')
            ->paginate(10)
            ->withQueryString();

        $totalArticles = ArticleFilter::apply(Article::query(), $request)->count();
        $publishedCount = (clone $publishedQuery)->count();
        $pendingCount = (clone $pendingQuery)->count();

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
                        ->with('success', 'Article deleted successfully');
    }


}
