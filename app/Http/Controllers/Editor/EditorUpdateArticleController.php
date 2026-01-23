<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class EditorUpdateArticleController extends Controller
{
    public function index($id)
    {
        $article = Article::findOrFail($id);

        return view('editor.update-article', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $article = Article::where('article_id', $id)->firstOrFail();
        $article->update($request->all());

        return redirect()->route('editor.dashboard')->with('success', 'Article updated successfully!');
    }
}