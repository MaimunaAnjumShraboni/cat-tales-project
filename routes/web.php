
<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;



Route::get('/', [HomeController::class, 'my_home']);

Route::get('/home', [HomeController::class, 'index']);

Route::get('/add_cat', [AdminController::class, 'add_cat']);

Route::post('/upload_cat', [AdminController::class, 'upload_cat']);

Route::get('/view_cat', [AdminController::class, 'view_cat']);

Route::get('/delete_cat/{id}', [AdminController::class, 'delete_cat']);

Route::get('/update_cat/{id}', [AdminController::class, 'update_cat']);

Route::post('/edit_cat/{id}', [AdminController::class, 'edit_cat']);

Route::post('/adopt_cat/{id}', [HomeController::class, 'adopt_cat']);

Route::get('/my_cart', [HomeController::class, 'my_cart']);

Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);

Route::post('/confirm_order', [HomeController::class, 'confirm_order']);

Route::get('/orders', [AdminController::class, 'orders']);

Route::get('/on_the_way/{id}', [AdminController::class, 'on_the_way']);

Route::get('/delivered/{id}', [AdminController::class, 'delivered']);

Route::get('/cancel/{id}', [AdminController::class, 'cancel']);

Route::post('/book_cat', [HomeController::class, 'book_cat']);

Route::get('/requests', [AdminController::class, 'requests']);
Route::get('/approve/{id}', [AdminController::class, 'approve']);
Route::get('/deny/{id}', [AdminController::class, 'deny']);


Route::get('/admin_gallery', [AdminController::class, 'gallery']);
Route::post('/upload_gallery_image', [AdminController::class, 'upload_gallery_image']);
Route::get('/delete_gallery_image/{id}', [AdminController::class, 'delete_gallery_image']);


Route::get('/reviews', [HomeController::class, 'show_review_form']);
Route::post('/submit_review', [HomeController::class, 'submit_review']);


Route::get('/learn_facts', [HomeController::class, 'learn_facts']);




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
