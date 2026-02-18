<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    
 //    backend

    public function index()
    {
        $team = Team::latest()->get();
        return view('admin.team.index', compact('team'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:20480',
        ]);

        $team = new Team();
        $team->name = $request->name;
        $team->description = $request->description;

        if ($request->hasFile('image')) {
            $team->image = $request->file('image')
                ->store('team', 'public');
        }

        $team->save();

        return redirect()->route('team.index')
            ->with('success', 'Team created successfully!');
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('admin.team.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:20480',
        ]);

        if ($request->hasFile('image')) {

            if ($team->image) {
                Storage::disk('public')->delete($team->image);
            }

            $team->image = $request->file('image')
                ->store('team', 'public');
        }

        $team->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('team.index')
            ->with('success', 'Team updated successfully!');
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);

        if ($team->image) {
            Storage::disk('public')->delete($team->image);
        }

        $team->delete();

        return redirect()->route('team.index')
            ->with('success', 'Team deleted successfully!');
    }

    // frontend
    
    public function publicIndex()
    {
        $team = Team::latest()->get();
        return view('team', compact('team'));
    }
}
