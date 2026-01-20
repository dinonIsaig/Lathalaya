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
        

        $publishedArticles = Article::with('author')
        ->where('status', 'Published') 
        ->latest('created_at')
        ->get();

        $query = Article::query()->where('status', '!=', 'Pending');


        $articles = $query->with('author')
        ->latest('created_at')
        ->paginate(10)
        ->withQueryString();



        return view('admin.home', compact(
                'articles', 
                'publishedArticles', 
            ));
    }


}
