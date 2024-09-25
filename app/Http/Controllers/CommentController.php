<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        Comment::create([
            'user_id' => $request->user_id,
            'blog_id' => $request->blog_id,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan Comment Ke Blog');
    }

    public function destroy($id)
    {
        Comment::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus Comment Ke Blog');
    }
}
