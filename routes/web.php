<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

    #admin routes
    Route::middleware(['role:admin'])->group(function () {
        Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');

        #Blogs
        Route::resource('blogs', BlogController::class)->except(['show', 'all']);

        #Products
        Route::resource('products', ProductController::class)->except(['show']);
    });

    #user routes
    Route::middleware(['role:user'])->group(function () {
        Route::view('home', 'user.home')->name('user.home');

        // comments routes
        Route::post('blogs/{blog}/comments', [CommentController::class, 'store'])->name('comments.store');
        Route::put('comments/{comment}', [CommentController::class, 'update'])->name('comments.update');


    });

    #profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

# blogs route for guest or unauth user
Route::get('blogs/all/', [BlogController::class, 'all'])->name('blogs.all');
Route::get('blogs/{blog}/', [BlogController::class, 'show'])->name('blogs.show');

Route::get('/products/details', [ProductController::class, 'show'])->name('products.show');

require __DIR__.'/auth.php';
