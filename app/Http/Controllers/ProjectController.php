<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller {
    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'nullable|url',
        ]);
        Auth::user()->projects()->create($request->all());
        return back()->with('success', 'Project added!');
    }

    public function edit(Project $project)
    {
        if ($project->user_id !== Auth::id()) {
            abort(403);
        }
        return view('profile.edit-project', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        if ($project->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'nullable|url',
        ]);

        $project->update($request->all());
        return redirect()->route('profile.edit')->with('success', 'Project updated!');
    }

    public function destroy(Project $project) {
        if ($project->user_id !== Auth::id()) {
            abort(403);
        }
        $project->delete();
        return back()->with('success', 'Project deleted!');
    }
}
