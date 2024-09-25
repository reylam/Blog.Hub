<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $blogs = Blog::with(['user', 'category'])->orderBy('created_at', 'desc')->get();
        $users = User::all();

        return view('admin.dashboard', compact('blogs', 'users'));
    }
}
