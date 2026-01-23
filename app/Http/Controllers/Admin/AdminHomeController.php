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
        $header = Article::where('status', 'Published')->latest()->first();
        $query = Article::where('status', 'Published');
        ArticleFilter::apply($query, $request);

        if ($header) {
            $query->where('article_id', '!=', $header->article_id);
        }

        $articles = $query->latest()->take(9)->get();

        return view('admin.home', [
            'publishedArticles' => $articles,
            'headerArticle' => $header
        ]);
    }
}
