<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;


class EditorDashboardController extends Controller
{
    public function index(Request $request)
    {

        return view('editor.dashboard');
    }


}
