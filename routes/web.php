<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => '/'], function (){
    Route::any('', [App\Http\Controllers\Customers\HomeController::class, 'home'])->name('website-home');
    Route::any('authors', [App\Http\Controllers\Customers\AuthorController::class, 'allAuthors'])->name('website-authors');
    Route::any('authors-specific/{id}', [App\Http\Controllers\Customers\AuthorController::class, 'specificAuthorBooks'])->name('website-authors-books');
    Route::any('all-books', [App\Http\Controllers\Customers\BookController::class, 'allBooks'])->name('website-allBooks');
    Route::any('book-details/{id}', [App\Http\Controllers\Customers\BookController::class, 'bookDetails'])->name('website-book-details');
    Route::any('new-arrivals', [App\Http\Controllers\Customers\BookController::class, 'newArrivals'])->name('website-newArrivals');
    Route::any('best-selling', [App\Http\Controllers\Customers\BookController::class, 'bestSelling'])->name('website-bestSelling');
    Route::any('all-categories', [App\Http\Controllers\Customers\BookController::class, 'allCategories'])->name('website-allCategories');
    Route::any('categories/{id}', [App\Http\Controllers\Customers\BookController::class, 'categoryDetails'])->name('website-categories-books');
    Route::post('addtocart', [App\Http\Controllers\Customers\CartController::class, 'addToCart'])->name('website-book-cart');
    Route::get('clear_cart', [App\Http\Controllers\Customers\CartController::class, 'clear_cart']);
    Route::get('delete_cart_item/{id}', [App\Http\Controllers\Customers\CartController::class, 'delete_cart_item']);
    Route::get('cart', [App\Http\Controllers\Customers\CartController::class, 'cart'])->name('cart');
    Route::get('/shipping_details', function(){
        return view('customers.shipping_details');
    })->name('shipping_details');

});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();
Route::get('/author_register', function(){
    return view('auth.author_register');
})->name('author_register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('books', BookController::class);
    Route::get('/books/{id}/delete', [BookController::class, 'destroy']);
    Route::get('/shipping_details', function(){
        $shipping_details = App\Models\ShippingDetail::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();
        if(!$shipping_details){
            $shipping_details = Auth::user();
        }

        return view('customers.shipping_details')->with('shipping_details', $shipping_details);
    })->name('shipping_details');
    Route::post('/checkout', [App\Http\Controllers\Customers\CartController::class, 'checkout'])->name('checkout');
});
