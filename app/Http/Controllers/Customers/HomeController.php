<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(){
        $authors = User::query()->where('role_id', '=', '3')->where('status', '=', 'approved')->limit(6)->get();
        
        $books = DB::table('users')
        ->join('books', 'users.id', '=', 'books.user_id')
        ->where('users.status', 'approved')
        ->limit(12)
        ->get();

        $FirstDay = date("Y-m-d", strtotime('sunday last week'));
        $LastDay = date("Y-m-d", strtotime('sunday this week'));
        $newArrivals = [];
        foreach ($books as $book){
            if(Carbon::parse($book->created_at)->format('Y-m-d') >= $FirstDay && Carbon::parse($book->created_at)->format('Y-m-d') <= $LastDay) {
                array_push($newArrivals, $book);
            }
        }
        return view('customers.home',[
            'authors' => $authors,
            'newArrivals' => $newArrivals,
            'books' => $books
        ]);
    }
}
