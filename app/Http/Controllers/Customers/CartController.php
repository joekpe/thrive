<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart($bookID) {
        $book_name = Book::query()->where('id','=',$bookID)->first();
        if(\Session::get('booksCart')){
            $existing_books = \Session::get('booksCart');

            foreach ($existing_books as $book){
                if($book !== $bookID){
                    \Session::push('booksCart',$bookID);
                    return redirect()->back()->with('success', 'You have added '.$book_name->name.' to cart');
                }else{
                    return redirect()->back()->with('errorMessage', 'You have already added this book to cart');
                }
            }
        }else{
            \Session::push('booksCart', $bookID);
            return redirect()->back()->with('success', 'You have added '.$book_name->name.' to cart');
        }
    }
}
