<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class AdminUpdateArticleController extends Controller
{

    public function index($id)
    {
        $article = Article::findOrFail($id);

        return view('admin.update-article', compact('article'));
    }
}