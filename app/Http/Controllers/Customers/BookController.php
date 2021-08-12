<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function allBooks () {
        $books = Book::query()->paginate(3);
        return view('customers.all_books', [
            'books' => $books
        ]);
    }

    public function newArrivals () {
        $books = Book::query()->get();
        $FirstDay = date("Y-m-d", strtotime('sunday last week'));
        $LastDay = date("Y-m-d", strtotime('sunday this week'));
        $newArrivals = [];
        foreach ($books as $book){
            if(Carbon::parse($book->created_at)->format('Y-m-d') >= $FirstDay && Carbon::parse($book->created_at)->format('Y-m-d') <= $LastDay) {
                array_push($newArrivals, $book);
            }
        }
        return view('customers.new_arrivals',[
                'newArrivals' => $newArrivals,
            ]);
    }

    public function bestSelling () {
        return view('customers.best_selling');
    }

    public function allCategories () {
        $categories = Category::all();
        return view('customers.all_categories',[
            'categories' => $categories
        ]);
    }

    public function categoryDetails ($id) {
        $books = Book::query()->where('category', '=', $id)->get();
        return view('customers.category_specific_books',[
            'books' => $books
        ]);
    }

    public function bookDetails ($id) {
        $book = Book::query()->where('id', '=',$id)->first();
        $categories = Category::all();
        return view('customers.book_details',[
            'book' => $book,
            'categories' => $categories
        ]);
    }

}
