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
        
        $data = $request->except('cover_image');

        //this is to delete the old photo to save storage
        if ($request->hasFile('cover_image')) {
            if ($article->cover_image && \Storage::disk('public')->exists($article->cover_image)) {
                \Storage::disk('public')->delete($article->cover_image);
            } 

            $path = $request->file('cover_image')->store('articles', 'public');

            $data['cover_image'] = $path;
        }

        $article->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Article updated successfully!');
    }
}