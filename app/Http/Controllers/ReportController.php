<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Balance;
use App\Models\Book;
use Auth;
use DB;

class ReportController extends Controller
{
    //book sales report
    public function book_sales(){
        if(Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'manager'){
            $orders = Order::with('customer')->get();
        }else{
            $orders = Order::where('author_id', Auth::user()->id)->with('customer')->get();
        }
        
        return view('vendor.voyager.reports.book_sales')->with('orders', $orders);
    }

    public function book_sales_specified(Request $request){
        //$order = Order::where(
        //dd($request);
        if(Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'manager'){
            $orders = Order::whereBetween('created_at', [$request->from_date, $request->to_date])->with('customer')->get();
        }else{
            $orders = Order::whereBetween('created_at', [$request->from_date, $request->to_date])->where('author_id', Auth::user()->id)->with('customer')->get();
        }
        
        return view('vendor.voyager.reports.book_sales')->with('orders', $orders);
    }

    //finance report
    public function finance(){
        if(Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'manager'){
            $finances = Balance::with('author')->get();
        }else{
            $finances = Balance::where('user_id', Auth::user()->id)->with('author')->get();
        }
        
        return view('vendor.voyager.reports.finance')->with('finances', $finances);
    }

    public function finance_specified(Request $request){
        //$order = Order::where(
        //dd($request);
        if(Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'manager'){
            $finances = Balance::whereBetween('created_at', [$request->from_date, $request->to_date])->with('author')->get();
        }else{
            $finances = Balance::whereBetween('created_at', [$request->from_date, $request->to_date])->where('user_id', Auth::user()->id)->with('author')->get();
        }
        
        return view('vendor.voyager.reports.finance')->with('finances', $finances);
    }


    //inventory report
    public function inventory(){
        if(Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'manager'){
            $books = Book::with('author')->with('multi_currency')->get();
        }else{
            $books = Book::where('user_id', Auth::user()->id)->with('author')->with('multi_currency')->get();
        }
        
        return view('vendor.voyager.reports.inventory')->with('books', $books);
    }

    public function inventory_specified(Request $request){
        if(Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'manager'){
            $books = Book::whereBetween('created_at', [$request->from_date, $request->to_date])->with('author')->with('multi_currency')->get();
        }else{
            $books = Book::whereBetween('created_at', [$request->from_date, $request->to_date])->where('user_id', Auth::user()->id)->with('author')->with('multi_currency')->get();
        }
        
        return view('vendor.voyager.reports.inventory')->with('books', $books);
    }

    //customer report
    public function customer(){
        if(Auth::user()->role->name == 'admin' || Auth::user()->role->name == 'manager'){
            $customers = Order::select(
                'user_id', 
                'author_id',
                'created_at',
                DB::raw("SUM(book_price * book_quantity) as total_spent")
                )->groupBy('user_id')->orderBy('created_at', 'desc')->with('customer')->get();
        }else{
            $customers = Order::select(
                'user_id', 
                'author_id',
                'created_at',
                DB::raw("SUM(book_price * book_quantity) as total_spent")
                )->groupBy('user_id')->where('author_id', Auth::user()->id)->orderBy('created_at', 'desc')->with('customer')->get();
        }
        
        return view('vendor.voyager.reports.customer')->with('customers', $customers);
    }
}
