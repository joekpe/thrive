<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class DashboardController extends Controller
{

    public function index()
    {
        $my_no_of_books = Book::mycount();
        return view('dashboard.index')->with('books', 0);
    }
}
