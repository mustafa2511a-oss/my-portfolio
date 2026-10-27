<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class AdminProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        $messages = ContactMessage::latest()->get();
        
        return view('admin.projects', compact('projects', 'messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'technologies' => 'required|string',
            'github_link' => 'nullable|url',
            'demo_link' => 'nullable|url',
        ]);

        Project::create($request->all());

        return back()->with('success', 'Naya Project Add Ho Gaya!');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return back()->with('success', 'Project Delete Ho Gaya!');
    }

    public function destroyMessage($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return back()->with('success', 'Message Delete Ho Gaya!');
    }
}