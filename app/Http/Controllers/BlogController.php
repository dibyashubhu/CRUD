<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category')->latest()->paginate(6);
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = BlogCategory::all();
        return view('blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'content' => 'required',
            // 'blog_category_id' => 'required|exists:blog_categories,id',
             'blog_category_id' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        Blog::create($data);

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    // public function edit(Blog $blog)
    // {
    //     $categories = BlogCategory::all();
    //     return view('blogs.edit', compact('blog', 'categories'));
    // }
      
    public function edit($id)
{
    $blog = Blog::with('category')->findOrFail($id);
    $categories = BlogCategory::all();
    return view('blogs.edit', compact('blog','categories'));
}
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'content' => 'required',
            // 'blog_category_id' => 'required|exists:blog_categories,id',
             'blog_category_id' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update($data);

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
    
    public function show(Blog $blog)
        {
            // $blog is automatically fetched by ID from the URL due to route model binding
            return view('blogs.show', compact('blog'));
        }

    public function contact(){
        return view('blogs.contact');
    }
}

