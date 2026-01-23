<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class AdminArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.create-article');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
            'author_id' => 1, //temporary hardcoded author ID, use author seeder for sample author
        ]);

        return redirect()->route('admin.article-view', ['id' => $article->article_id])
                     ->with('success', 'Article submitted!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $article = Article::findOrFail($id);

        return view('admin.article-view', compact('article'));
    }

    public function publish($id)
    {
        $article = Article::where('article_id', $id)->firstOrFail();
        
        $article->update([
            'status' => 'Published'
        ]);

        return redirect()->back()->with('success', 'Article has been published successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
