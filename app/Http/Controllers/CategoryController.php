<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'asc')->paginate(10);
        return view('backend.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
        ]);

        try {
            Category::create([
                'uuid' => (string) \Str::uuid(),
                'title' => $request->title,
                'slug' => \Str::slug($request->title),
                'description' => $request->description,
                'status' => $request->status ?? 1,
                'remarks' => $request->remarks,
            ]);

            return redirect()->route('admin.categories.index')->with('success', 'Category created successfully!');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function show($uuid)
    {
        $category = Category::where('uuid', $uuid)->firstOrFail();
        return view('backend.categories.show', compact('category'));
    }

    public function edit($uuid)
    {
        $category = Category::where('uuid', $uuid)->firstOrFail();
        return view('backend.categories.edit', compact('category'));
    }

    public function update(Request $request, $uuid)
    {
        $category = Category::where('uuid', $uuid)->firstOrFail();
        $request->validate([
            'title' => 'required|string',
        ]);

        try {
            $category->update([
                'title' => $request->title,
                'slug' => \Str::slug($request->title),
                'description' => $request->description,
                'status' => $request->status ?? 1,
                'remarks' => $request->remarks,
                'updated_by' => Auth::id(),
            ]);

            return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function destroy($uuid)
    {
        $category = Category::where('uuid', $uuid)->firstOrFail();
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category moved to trash.');
    }

    public function trash()
    {
        $trashed = Category::onlyTrashed()->latest()->paginate(10);
        return view('backend.categories.trash', compact('trashed'));
    }

    public function restore($uuid)
    {
        $category = Category::onlyTrashed()->where('uuid', $uuid)->firstOrFail();
        $category->restore();
        return redirect()->route('admin.categories.trash')->with('success', 'Category restored successfully.');
    }

    public function forceDelete($uuid)
    {
        $category = Category::onlyTrashed()->where('uuid', $uuid)->firstOrFail();
        $category->forceDelete();
        return redirect()->route('admin.categories.trash')->with('success', 'Category permanently deleted.');
    }

    public function getData(Request $request)
    {
        try {
            $query = Category::query();

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
