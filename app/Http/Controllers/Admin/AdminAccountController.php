<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Editor;
use App\Models\EditorsID;
use Illuminate\Http\Request;

class AdminAccountController extends Controller
{
    public function index()
    {
        $activeEditors = Editor::whereHas('editorId', function ($query) {
            $query->where('status', 'active');
        })->with('editorId')->orderBy('editor_number', 'asc')->paginate(10)->withQueryString();

        $allEditorIds = EditorsID::orderBy('editor_number', 'asc')->get();

        $totalEditorsCount = EditorsID::count();
        $activeCount = EditorsID::where('status', 'active')->count();
        $inactiveCount = EditorsID::where('status', 'inactive')->count();

        return view('admin.accounts', compact(
            'activeEditors',
            'allEditorIds',
            'totalEditorsCount',
            'activeCount',
            'inactiveCount'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'editor_number' => ['required', 'integer', 'unique:editorsID,editor_number'],
        ]);

        // Create the new inactive ID
        EditorsID::create([
            'editor_number' => $validated['editor_number'],
            'status' => 'Inactive', // Default status
        ]);

        return redirect()->back()->with('success', 'New Editor ID added successfully.');
    }
}
