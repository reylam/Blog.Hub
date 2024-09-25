<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->orderBy('created_at')->with('blogs')->first();

        return view('category', compact('category'));
    }
}
