<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('author.create-article');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'cover_image' => 'nullable|image|max:10240',
            'category' => 'required|string|max:100',
            'content' => 'required|string',
        ]);
        
        $imagePath = null;
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('articles', 'public');
        }

        $article = Article::create([
            'title' => $request->title,
            'category' => $request->category,
            'content' => $request->content,
            'cover_image' => $imagePath,
            'author_id' => Auth::guard('author')->id(),
        ]);

        return redirect()->route('author.article-view', ['id' => $article->article_id])
                     ->with('success', 'Article submitted!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $article = Article::findOrFail($id);

        return view('author.article-view', compact('article'));
    }

}
