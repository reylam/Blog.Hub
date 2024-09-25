<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redis;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('created_at')->paginate(3);
        $categories = Category::all();

        return view('blog.indexBlog', compact('blogs', 'categories'));
    }

    public function dashboard()
    {
        $blogByViews = Blog::orderByDesc('views')->paginate(3);
        $blogByNews = Blog::orderByDesc('created_at')->paginate(3);
        $categories = Category::all();
        $thumbnails = Blog::orderBy('created_at')->paginate(4);

        return view('dashboard', compact('blogByNews', 'blogByViews', 'categories', 'thumbnails'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('blog.addBlog', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');


        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'thumbnail' => $thumbnailPath,
            'slug' => Str::uuid()->toString(),
            'user_id' => $request->user_id
        ]);

        return redirect()->route('profile.blog')->with('success', 'Blog berhasil ditambahkan!');
    }



    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->first();

        $blog->update([
            'views' => $blog->views + 1
        ]);

        $comments = Comment::where('blog_id', $blog->id)->with('user')->get();
        $blogs = Blog::where('id', '!=', $blog->id)->inRandomOrder()->take(5)->get();

        return view('blog.readBlog', compact('blog', 'blogs', 'comments'));
    }

    public function destroy($id)
    {
        Blog::where('id', $id)->delete();

        return redirect()->back()->with('status', 'Blog Deleted Successfully');
    }

    public function edit($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $categories = Category::all();

        return view('blog.editBlog', compact('blog', 'categories'));
    }


    public function update(Request $request, $slug)
    {
        $blog = Blog::where('slug', $slug)->first();

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->category_id = $request->category_id;



        $filename = $request->file('thumbnail')->store('thumbnails', 'public');


        $blog->thumbnail = $filename;

        $blog->save();

        return redirect()->route('profile.blog')->with('status', 'Blog Updated Successfully');
    }
}
