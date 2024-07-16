<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with('author')->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'video' => 'nullable|url'
        ]);

        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path('assets/img/blogs'), $filename);
                $images[] = 'assets/img/blogs/' . $filename;
            }
        }

        $video = $request->input('video');

        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'author_id' => Auth::id(),
            'images' => json_encode($images),
            'video' => $video,
        ]);

        return redirect()->route('blogs.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::find($id);
        return view('admin.blogs.show', compact('blog'));
    }

    public function all()
    {
        $blogs = Blog::with('author')->get();
        return view('admin.blogs.all', compact('blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    // Update the specified blog in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'video' => 'nullable|url'
        ]);

        $blog = Blog::findOrFail($id);
        $existingImages = $blog->images ? json_decode($blog->images, true) : [];

        $newImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path('assets/img/blogs'), $filename);
                $newImages[] = 'assets/img/blogs/' . $filename;
            }

            // Delete the old images if new ones are uploaded
            foreach ($existingImages as $image) {
                if (file_exists(public_path($image))) {
                    unlink(public_path($image));
                }
            }
        } else {
            $newImages = $existingImages;
        }

        $video = $request->input('video');

        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'images' => json_encode($newImages),
            'video' => $video,
        ]);

        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('blogs.index');
    }
}
