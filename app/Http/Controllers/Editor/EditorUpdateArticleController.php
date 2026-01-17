<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;


class EditorUpdateArticleController extends Controller
{
    public function index(Request $request)
    {

        return view('editor.update-article');
    }


}
