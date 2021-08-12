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
    Route::any('addtocart/{id}', [App\Http\Controllers\Customers\CartController::class, 'addToCart'])->name('website-book-cart');

});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('books', BookController::class);
    Route::get('/books/{id}/delete', [BookController::class, 'destroy']);
});
