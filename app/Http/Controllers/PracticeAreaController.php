<?php

namespace App\Http\Controllers;

use App\Models\PracticeArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PracticeAreaController extends Controller
{
    public function index()
    {
        $practiceAreas = PracticeArea::orderBy('id', 'asc')->paginate(10);
        return view('backend.practiceAreas.index', compact('practiceAreas'));
    }

    public function create()
    {
        return view('backend.practiceAreas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
        ]);

        try {
            PracticeArea::create([
                'uuid' => (string) \Str::uuid(),
                'title' => $request->title,
                'slug' => \Str::slug($request->title),
                'description' => $request->description,
                'icon' => $request->icon,
                'status' => $request->status ?? 1,
                'showing_at' => $request->showingAt ?? 0,
                'remarks' => $request->remarks,
            ]);

            return redirect()->route('admin.practice_areas.index')->with('success', 'PracticeArea created successfully!');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function show($uuid)
    {
        $practiceArea = PracticeArea::where('uuid', $uuid)->firstOrFail();
        return view('backend.practiceAreas.show', compact('practiceArea'));
    }

    public function edit($uuid)
    {
        $practiceArea = PracticeArea::where('uuid', $uuid)->firstOrFail();
        return view('backend.practiceAreas.edit', compact('practiceArea'));
    }

    public function update(Request $request, $uuid)
    {
        $practiceArea = PracticeArea::where('uuid', $uuid)->firstOrFail();
        $request->validate([
            'title' => 'required|string',
        ]);

        try {
            $practiceArea->update([
                'title' => $request->title,
                'slug' => \Str::slug($request->title),
                'description' => $request->description,
                'icon' => $request->icon,
                'status' => $request->status ?? 1,
                'showing_at' => $request->showingAt ?? 0,
                'remarks' => $request->remarks,
                'updated_by' => Auth::id(),
            ]);

            return redirect()->route('admin.practice_areas.index')->with('success', 'PracticeArea updated successfully!');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function destroy($uuid)
    {
        $practiceArea = PracticeArea::where('uuid', $uuid)->firstOrFail();
        $practiceArea->delete();
        return redirect()->route('admin.practice_areas.index')->with('success', 'PracticeArea moved to trash.');
    }

    public function trash()
    {
        $trashed = PracticeArea::onlyTrashed()->latest()->paginate(10);
        return view('admin.practice_areas.trash', compact('trashed'));
    }

    public function restore($uuid)
    {
        $practiceArea = PracticeArea::onlyTrashed()->where('uuid', $uuid)->firstOrFail();
        $practiceArea->restore();
        return redirect()->route('practiceAreas.trash')->with('success', 'PracticeArea restored successfully.');
    }

    public function forceDelete($uuid)
    {
        $practiceArea = PracticeArea::onlyTrashed()->where('uuid', $uuid)->firstOrFail();
        $practiceArea->forceDelete();
        return redirect()->route('practiceAreas.trash')->with('success', 'PracticeArea permanently deleted.');
    }

    public function getData(Request $request)
    {
        try {
            $query = PracticeArea::query();

            if ($request->filled('search')) {
                $query->where('title', 'like', "%{$request->search}%");
            }

            $countries = $query->orderBy('created_at', 'asc')->paginate(10);
            return response()->json($countries);
        } catch (\Throwable $e) {
            \Log::error('Countrise getData error: ' . $e->getMessage());
            return response()->json(['error' => 'Server error'], 500);
        }
    }
}
