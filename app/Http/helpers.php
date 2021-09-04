<?php

use App\Models\Book;
use App\Models\Category;
use App\Models\MultiCurrency;
use App\Models\User;
use App\Models\Balance;

function totalBooks ($authorID){
    try{
        $total_books = Book::query()->where('user_id', '=', $authorID)->count();
        return $total_books ;
    }
    catch (\Exception $e) {
        file_put_contents(storage_path('logs/error.log'), date('Y m d, H:i:s') . ' | ERROR | ' . $e->getMessage() . PHP_EOL . PHP_EOL, FILE_APPEND);
    }
}

function authorName ($authorID){
    try{
        $author = User::query()->where('id', '=', $authorID)->first();
        return $author ;
    }
    catch (\Exception $e) {
        file_put_contents(storage_path('logs/error.log'), date('Y m d, H:i:s') . ' | ERROR | ' . $e->getMessage() . PHP_EOL . PHP_EOL, FILE_APPEND);
    }
}

function categoryName ($categoryID){
    try{
        $category = Category::query()->where('id', '=', $categoryID)->first();
        return $category ;
    }
    catch (\Exception $e) {
        file_put_contents(storage_path('logs/error.log'), date('Y m d, H:i:s') . ' | ERROR | ' . $e->getMessage() . PHP_EOL . PHP_EOL, FILE_APPEND);
    }
}


function currency ($currencyID){
    try{
        $currency = MultiCurrency::query()->where('id', '=', $currencyID)->first();
        return $currency ;
    }
    catch (\Exception $e) {
        file_put_contents(storage_path('logs/error.log'), date('Y m d, H:i:s') . ' | ERROR | ' . $e->getMessage() . PHP_EOL . PHP_EOL, FILE_APPEND);
    }
}

function bookDetails($bookID){
    try{
//        $book = Book::query()->where('id', '=', $bookID)->first();
//        return $book ;
        return $bookID;
    }
    catch (\Exception $e) {
        file_put_contents(storage_path('logs/error.log'), date('Y m d, H:i:s') . ' | ERROR | ' . $e->getMessage() . PHP_EOL . PHP_EOL, FILE_APPEND);
    }
}

function author_balance($author_id){
    $balance_details = Balance::where('user_id', $author_id)->orderBy('id', 'desc')->first();
        
    $balance_left = $balance_details ? $balance_details->balance_left : 0.00;

    return $balance_left;
}

function books_sold($author_id){
    return App\Models\Order::where('author_id', $author_id)->sum('book_quantity');
}
