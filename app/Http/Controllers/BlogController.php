<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Tag;
use App\Models\Category;
use App\Models\PracticeArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('id', 'asc')->paginate(10);
        return view('backend.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $tags = Tag::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        $areas = PracticeArea::where('status', 1)->get();
        return view('backend.blogs.create', compact('tags', 'categories', 'areas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
            'tag_id' => 'nullable|exists:tags,id',
        ]);

        $blog = Blog::create([
            'uuid' => (string) \Str::uuid(),
            'title' => $request->title,
            'slug' => \Str::slug($request->title),
            'description' => $request->description,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'tag_id' => $request->tag_id,
            'status' => $request->status ?? 1,
            'remarks' => $request->remarks,
        ]);

        // Image Upload & polymorphic save
        if ($request->hasFile('image')) {
            $file_name = $this->uploadFile($request->file('image'), $blog->id);

            // Save to images table
            $blog->images()->create([
                'url' => $file_name
            ]);
        }

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');
    }

    public function show($uuid)
    {
        $blog = Blog::where('uuid', $uuid)->firstOrFail();
        return view('backend.blogs.show', compact('blog'));
    }

    public function edit($uuid)
    {
        $blog = Blog::where('uuid', $uuid)->firstOrFail();
        $tags = Tag::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        $areas = PracticeArea::where('status', 1)->get();
        return view('backend.blogs.edit', compact('blog', 'tags', 'categories', 'areas'));
    }

    public function update(Request $request, $uuid)
    {
        $blog = Blog::where('uuid', $uuid)->firstOrFail();
        $request->validate([
            'title' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
            'tag_id' => 'nullable|exists:tags,id',
        ]);

        $blog->update([
            'title' => $request->title,
            'slug' => \Str::slug($request->title),
            'description' => $request->description,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'tag_id' => $request->tag_id,
            'status' => $request->status ?? 1,
            'remarks' => $request->remarks,
        ]);

        // If new image uploaded
        if ($request->hasFile('image')) {

            // DELETE old image (file + db record)
            if ($blog->images()->exists()) {

                $oldImage = $blog->images()->first();

                $oldPath = storage_path("app/public/images/blogs/" . $oldImage->url);

                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }

                $oldImage->delete();
            }

            // Upload new image
            $file_name = $this->uploadFile($request->file('image'), $blog->id);

            // Save new to DB
            $blog->images()->create([
                'url' => $file_name,
            ]);
        }


        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');
    }

    public function destroy($uuid)
    {
        $blog = Blog::where('uuid', $uuid)->firstOrFail();
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog moved to trash.');
    }

    public function trash()
    {
        $trashed = Blog::onlyTrashed()->latest()->paginate(10);
        return view('backend.blogs.trash', compact('trashed'));
    }

    public function restore($uuid)
    {
        $blog = Blog::onlyTrashed()->where('uuid', $uuid)->firstOrFail();
        $blog->restore();
        return redirect()->route('blogs.trash')->with('success', 'Blog restored successfully.');
    }

    public function forceDelete($uuid)
    {
        $blog = Blog::onlyTrashed()->where('uuid', $uuid)->firstOrFail();
        $blog->forceDelete();
        return redirect()->route('blogs.trash')->with('success', 'Blog permanently deleted.');
    }

    public function getData(Request $request)
    {
        try {
            $query = Blog::query();

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

    // local
    private function uploadFile($file, $name)
    {
        $folder = storage_path('app/public/images/blogs');

        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0775, true, true);
        }

        $timestamp = str_replace([' ', ':', '-'], '', now());
        $file_name = $timestamp . '_' . $name . '.' . $file->getClientOriginalExtension();
        $file->move($folder, $file_name);

        return $file_name;
    }

    // cPanel
    // private function uploadFile($file, $name)
    // {
    //     $timestamp = str_replace([' ', ':', '-'], '', now());
    //     $file_name = $timestamp . '_' . $name . '.' . $file->getClientOriginalExtension();

    //     // Save to 'public' disk defined in filesystems.php
    //     $path = $file->storeAs('images/blogs', $file_name, 'public');

    //     return $file_name; // just return file name, path is images/blogs/...

    // }
}
