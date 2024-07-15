<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'guest'])->name('guest');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::get('/chat', [ChatController::class, 'index']);
    #admin routes
    Route::middleware(['role:admin'])->group(function () {
        Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');

        #Blogs
        Route::resource('blogs', BlogController::class)->except(['show', 'all']);

        #Products
        Route::resource('products', ProductController::class)->except(['show']);

        #Admin Report
        Route::get('/admin/reports/orders', [AdminReportController::class, 'index'])->name('admin.reports.orders');
        Route::get('/admin/reports/orders/download', [AdminReportController::class, 'downloadPdf'])->name('admin.reports.orders.download');
    });

    #user routes
    Route::middleware(['role:user'])->group(function () {
        // Route::view('home', 'user.home')->name('user.home');
        Route::get('home', [HomeController::class, 'index'])->name('user.home');
        // order routes
        Route::get('/products/{product}/order', [OrderController::class, 'create'])->name('order.create');
        Route::post('/products/{product}/order', [OrderController::class, 'store'])->name('order.store');
        Route::get('order/history', [OrderController::class, 'orderHistory'])->name('orders.history');

        // payments routes
        Route::get('/payment/{orderId}', [PaymentController::class, 'show'])->name('payment.show');
        Route::post('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');
        Route::get('/payment/success/{orderId}', [PaymentController::class, 'success'])->name('payment.success');
        Route::get('/payment/pending/{orderId}', [PaymentController::class, 'pending'])->name('payment.pending');

        // comments routes
        Route::post('blogs/{blog}/comments', [CommentController::class, 'store'])->name('comments.store');
        Route::put('comments/{comment}', [CommentController::class, 'update'])->name('comments.update');

        //Review and Rating routes
        Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

        //Cetak PDF
        Route::get('/order/{order}/receipt', [OrderController::class, 'generateReceipt'])->name('order.receipt');

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
