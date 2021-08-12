<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function allAuthors(){
        $authors = User::query()->where('role_id', '=', '3')->where('status', '=', 'approved')->get();
        return view('customers.authors', [
            'authors' => $authors
        ]);
    }

    public function specificAuthorBooks($id){
        $books = Book::query()-> where('user_id', '=', $id)->get();
        return view('customers.author_specific_books',[
            'books' => $books
        ]);
    }
}
