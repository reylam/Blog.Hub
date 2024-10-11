<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $blogs = Blog::with(['user', 'category'])->orderBy('created_at', 'desc')->get();
        $users = User::all();
        $roles = Role::all();
        $categories = Category::all();

        return view('admin.dashboard', compact('blogs', 'users', 'roles', 'categories'));
    }

    public function storeAccount(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required'],
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        RoleUser::create([
            'user_id' => $user->id,
            'role_id' => $request->role_id
        ]);

        return redirect()->back()->with('success', "Successfully create user");
    }

    public function updateAccount(Request $request, $id)
    {
        $user =  User::where('id', $id)->first();
        $roleUser = RoleUser::where('user_id', $id)->first();

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
        ]);

        $roleUser->update([
            'role_id' => $request->role_id
        ]);

        return redirect()->back()->with('success', "Successfully update user $user->username");
    }

    public function destroyAccount($username)
    {
        $user = User::where('username', $username)->first();

        $user->delete();

        return redirect()->back()->with('success', "Successfully create user");
    }
}
