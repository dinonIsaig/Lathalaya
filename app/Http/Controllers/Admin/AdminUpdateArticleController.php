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

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $article = Article::where('article_id', $id)->firstOrFail();
        $article->update($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Article updated successfully!');
    }
}