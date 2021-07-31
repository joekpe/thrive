<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function allBooks () {
        return view('customers.all_books');
    }

    public function newArrivals () {
        return view('customers.new_arrivals');
    }

    public function bestSelling () {
        return view('customers.best_selling');
    }

    public function allCategories () {
        return view('customers.all_categories');
    }
}
