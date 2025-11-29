<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('parent')->orderBy('id', 'asc')->paginate(10);
        return view('backend.galleries.index', compact('galleries'));
    }

    public function create()
    {
        $parents = Gallery::whereNull('parent_id')->get();
        return view('backend.galleries.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'type' => 'required|in:single,group',
            'parent_id' => 'nullable|exists:galleries,id',
        ]);

        $gallery = Gallery::create([
            'uuid' => (string) \Str::uuid(),
            'title' => $request->title,
            'type' => $request->type,
            'parent_id' => $request->parent_id,
            'target' => $request->target,
            'status' => $request->status ?? 1,
            'remarks' => $request->remarks,
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $file_name = $this->uploadFile($request->file('image'), $gallery->id);

            $gallery->images()->create([
                'url' => $file_name
            ]);
        }

        return redirect()->route('galleries.index')->with('success', 'Gallery created successfully!');
    }

    public function edit($uuid)
    {
        $gallery = Gallery::where('uuid', $uuid)->firstOrFail();
        $parents = Gallery::whereNull('parent_id')->where('id', '!=', $gallery->id)->get();
        return view('backend.galleries.edit', compact('gallery', 'parents'));
    }

    public function update(Request $request, $uuid)
    {
        $gallery = Gallery::where('uuid', $uuid)->firstOrFail();

        $request->validate([
            'title' => 'required|string',
            'type' => 'required|in:single,group',
            'parent_id' => 'nullable|exists:galleries,id',
        ]);

        $gallery->update([
            'title' => $request->title,
            'type' => $request->type,
            'parent_id' => $request->parent_id,
            'target' => $request->target,
            'status' => $request->status ?? 1,
            'remarks' => $request->remarks,
        ]);

        // Replace image if new uploaded
        if ($request->hasFile('image')) {
            if ($gallery->images()->exists()) {
                $oldImage = $gallery->images()->first();
                $oldPath = storage_path("app/public/images/galleries/" . $oldImage->url);

                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }

                $oldImage->delete();
            }

            $file_name = $this->uploadFile($request->file('image'), $gallery->id);
            $gallery->images()->create(['url' => $file_name]);
        }

        return redirect()->route('galleries.index')->with('success', 'Gallery updated successfully!');
    }

    public function destroy($uuid)
    {
        $gallery = Gallery::where('uuid', $uuid)->firstOrFail();
        $gallery->delete();
        return redirect()->route('galleries.index')->with('success', 'Gallery moved to trash.');
    }

    public function trash()
    {
        $trashed = Gallery::onlyTrashed()->latest()->paginate(10);
        return view('backend.galleries.trash', compact('trashed'));
    }

    public function restore($uuid)
    {
        $gallery = Gallery::onlyTrashed()->where('uuid', $uuid)->firstOrFail();
        $gallery->restore();
        return redirect()->route('galleries.trash')->with('success', 'Gallery restored successfully.');
    }

    public function forceDelete($uuid)
    {
        $gallery = Gallery::onlyTrashed()->where('uuid', $uuid)->firstOrFail();

        // delete associated image (file + db)
        if ($gallery->images()->exists()) {
            $oldImage = $gallery->images()->first();
            $oldPath = storage_path("app/public/images/galleries/" . $oldImage->url);

            if (file_exists($oldPath)) {
                @unlink($oldPath);
            }

            $oldImage->delete();
        }

        $gallery->forceDelete();
        return redirect()->route('galleries.trash')->with('success', 'Gallery permanently deleted.');
    }

    // Local file upload
    private function uploadFile($file, $name)
    {
        $folder = storage_path('app/public/images/galleries');

        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0775, true, true);
        }

        $timestamp = str_replace([' ', ':', '-'], '', now());
        $file_name = $timestamp . '_' . $name . '.' . $file->getClientOriginalExtension();
        $file->move($folder, $file_name);

        return $file_name;
    }


    public function getData(Request $request)
    {
        try {
            $query = Gallery::query();

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
