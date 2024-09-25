<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function index()
    {
        $bookmarks = Bookmark::where('user_id', Auth::user()->id)->get();

        return view('profile.bookmark', compact('bookmarks'));
    }

    public function store(Request $request)
    {
        Bookmark::create($request->all());

        return redirect()->back()->with('success', 'Berhasil menambahkan Blog Ke bookmark');
    }
    public function destroy($id)
    {
        $bookmark = Bookmark::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus Blog Ke bookmark');
    }
}
