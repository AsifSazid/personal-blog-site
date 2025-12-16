<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('id', 'asc')->paginate(10);
        return view('backend.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('backend.tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
        ]);

        try {
            Tag::create([
                'uuid' => (string) \Str::uuid(),
                'title' => $request->title,
                'slug' => \Str::slug($request->title),
                'description' => $request->description,
                'status' => $request->status ?? 1,
                'remarks' => $request->remarks,
            ]);

            return redirect()->route('admin.tags.index')->with('success', 'Tag created successfully!');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function show($uuid)
    {
        $tag = Tag::where('uuid', $uuid)->firstOrFail();
        return view('backend.tags.show', compact('tag'));
    }

    public function edit($uuid)
    {
        $tag = Tag::where('uuid', $uuid)->firstOrFail();
        return view('backend.tags.edit', compact('tag'));
    }

    public function update(Request $request, $uuid)
    {
        $tag = Tag::where('uuid', $uuid)->firstOrFail();
        $request->validate([
            'title' => 'required|string',
        ]);

        try {
            $tag->update([
                'title' => $request->title,
                'slug' => \Str::slug($request->title),
                'description' => $request->description,
                'status' => $request->status ?? 1,
                'remarks' => $request->remarks,
                'updated_by' => Auth::id(),
            ]);

            return redirect()->route('admin.tags.index')->with('success', 'Tag updated successfully!');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function destroy($uuid)
    {
        $tag = Tag::where('uuid', $uuid)->firstOrFail();
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('success', 'Tag moved to trash.');
    }

    public function trash()
    {
        $trashed = Tag::onlyTrashed()->latest()->paginate(10);
        return view('backend.tags.trash', compact('trashed'));
    }

    public function restore($uuid)
    {
        $tag = Tag::onlyTrashed()->where('uuid', $uuid)->firstOrFail();
        $tag->restore();
        return redirect()->route('admin.tags.trash')->with('success', 'Tag restored successfully.');
    }

    public function forceDelete($uuid)
    {
        $tag = Tag::onlyTrashed()->where('uuid', $uuid)->firstOrFail();
        $tag->forceDelete();
        return redirect()->route('admin.tags.trash')->with('success', 'Tag permanently deleted.');
    }

    public function getData(Request $request)
    {
        try {
            $query = Tag::query();

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
