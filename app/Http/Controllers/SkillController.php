<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller {
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);
        Auth::user()->skills()->create($request->all());
        return back()->with('success', 'Skill added!');
    }

    public function edit(Skill $skill) {
        if ($skill->user_id !== Auth::id()) {
            abort(403);
        }
        return view('profile.edit-skill', compact('skill'));
    }

    public function update(Request $request, Skill $skill) {
        if ($skill->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'name' => 'required',
        ]);

        $skill->update($request->all());
        return redirect()->route('profile.edit')->with('success', 'Skill updated!');
    }

    public function destroy(Skill $skill) {
        if ($skill->user_id !== Auth::id()) {
            abort(403);
        }
        $skill->delete();
        return back()->with('success', 'Skill deleted!');
    }
}
