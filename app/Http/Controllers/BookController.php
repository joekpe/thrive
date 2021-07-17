<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Location;
use App\Models\MultiCurrency;
use Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::where('user_id', Auth::user()->id)->paginate(5);
        return view('books.index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $locations = Location::all();
        $currencies = MultiCurrency::all();
        return view('books.create')->with('data', [$categories, $sub_categories, $locations, $currencies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'name' => 'required',
            'currency' => 'required',
            'selling_price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category' => 'required',
            'sub_category' => 'required',
            'threshold' => 'numeric'
        ]);

        

        Book::create([
            'name' => $request->name,
            'currency' => $request->currency,
            'selling_price' => $request->selling_price,
            'quantity' => $request->quantity,
            'category' => $request->category,
            'sub_category' => $request->sub_category,
            'threshold' => $request->threshold,
            'user_id' => Auth::user()->id
        ]);
        return back()->with('success', 'Book has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('books.show')->with('book', Book::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $locations = Location::all();
        $currencies = MultiCurrency::all();
        return view('books.edit')->with('book', Book::find($id))->with('data', [$categories, $sub_categories, $locations, $currencies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $this->validate($request, [
            'name' => 'required',
            'currency' => 'required',
            'selling_price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category' => 'required',
            'sub_category' => 'required',
            'threshold' => 'numeric'
        ]);

        $book = Book::find($id);
        $book->name = $request->name;
        $book->currency = $request->currency;
        $book->selling_price = $request->selling_price;
        $book->quantity = $request->quantity;
        $book->category = $request->category;
        $book->sub_category = $request->sub_category;
        $book->threshold = $request->threshold;

        return $book->save() ? back()->with('success', 'Book updated') : back()->with('error', 'Book not updated')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Book::find($id)->delete() ? back()->with('success', 'Book deleted') : back()->with('error', 'Book not deleted');
    }
}
