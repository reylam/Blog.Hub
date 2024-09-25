<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [BlogController::class, 'dashboard'])->name('dashboard');

Route::get('/401-unauthorized', function () {
    return view('401');
});

Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('dashboard.categories');
Route::get('blog/', [BlogController::class, 'index'])->name('blog.index');
Route::get('blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::middleware('admin', 'auth')->get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('profile/blog', [ProfileController::class, 'blog'])->name('profile.blog');
    Route::get('profile/addBlog', [BlogController::class, 'create'])->name('blog.create');
    Route::post('profile/addBlog', [BlogController::class, 'store'])->name('blog.store');
    Route::delete('profile/blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
    Route::get('profile/edit/blog/{slug}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('profile/edit/blog/{slug}', [BlogController::class, 'update'])->name('blog.update');
    Route::get('/profile/bookmark', [BookmarkController::class, 'index'])->name('profile.bookmark');
    Route::post('/profile/bookmark', [BookmarkController::class, 'store'])->name('bookmark.store');
    Route::delete('/profile/bookmark/{id}', [BookmarkController::class, 'destroy'])->name('bookmark.destroy');
    Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');
});

require __DIR__ . '/auth.php';
