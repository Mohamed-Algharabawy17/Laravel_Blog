<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckPostOwner;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('test-login', function () {
    $user = Illuminate\Support\Facades\Auth::user();
    return $user->name();
})->middleware('auth');

Route::get('/posts', [UserController::class, 'index'])->name('posts.index');

Route::get('/posts/trash', [UserController::class, 'trash'])->name('posts.trash');

Route::get('/posts/{id}/restore', [UserController::class, 'restore'])->name('posts.restore');

Route::get('/posts/count', [UserController::class, 'count'])->name('posts.count');

Route::delete('/posts/{id}/force_delete', [UserController::class, 'force_delete'])->name('posts.force_delete');

Route::get('/posts/create', [UserController::class, 'create'])->name('posts.create')->middleware('auth');

Route::post('/posts', [UserController::class, 'store'])->name('posts.store')->middleware('auth');

Route::get('/posts/{post}/show', [userController::class, 'show'])->name('posts.show');

Route::get('/user/{user}/posts', [UserController::class, 'show_all_posts'])->name('user.posts');

Route::get('/posts/{id}/edit', [UserController::class, 'edit'])->name('posts.edit')
    ->where('id', '[0-9]+')
    ->middleware(CheckPostOwner::class);

Route::put('/posts/{id}', [UserController::class, 'update'])->name('posts.update')->where('id', '[0-9]+');
Route::delete('/posts/{id}', [UserController::class, 'destroy'])->name('posts.destroy')->where('id', '[0-9]+');

Route::fallback(function () {
    return 'Route not found';
});
