<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\ShippingDetail;
use Auth;
use App\Models\Order;
use App\Models\Balance;
use \App\Models\User;
use \App\Models\Location;


class CartController extends Controller
{
    public function addToCart(Request $request) {
        
        if(session()->has('booksCart')){
            $book_ids = [];
            foreach(session()->get('booksCart') as $bookCart){
                array_push($book_ids, $bookCart['book_id']);
            }

            if(!in_array($request->book_id, $book_ids)){
                session()->push('booksCart', $request->all());
                return redirect()->back()->with('success', 'You have added '.$request->book_name.' to cart');
            }else{
                return redirect()->back()->with('errorMessage', 'You have already added this book to cart');
            }

            dd($book_ids);

            
        }else{
            session()->push('booksCart', $request->all());
            return redirect()->back()->with('success', 'You have added '.$request->book_name.' to cart');
        }
       
    }

    public function clear_cart(){
        session()->flush();
        return redirect()->back()->with('success', 'Cart cleared!!!');
    }

    public function delete_cart_item($id){
        $cart = session()->pull('booksCart', []); // Second argument is a default value
        if(($key = array_search($id, array_column($cart, 'book_id') )) !== false) {
            unset($cart[$key]);
        }
        $new_cart = array_values($cart);
        //dd($new_cart);
        session()->put('booksCart', $new_cart);
        //dd(session()->get('booksCart'));
        return redirect()->back()->with('success', 'Item deleted!!!');
    }

    public function cart(){
        return view('customers.cart');
    }

    public function save_shipping_details(Request $request){
        //validating shipping details
        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required',
            'location_id' => 'required'
            
        ]);

        $location = Location::find($request->location_id);
        //dd($location);

        //saving shipping details
        $shipping_details = ShippingDetail::create($request->except(['_token']) + ['user_id' => Auth::user()->id] + ['delivery_fee' => $location->delivery_fee]);
        
        return redirect()->route('pay_now')->with('shipping_details', $shipping_details);
    }

    public function checkout(Request $request){
        if(session()->has('booksCart')){

            
            
            //getting last invoice id
            $latest_invoice = Order::orderBy('id', 'desc')->first();
            foreach (session()->get('booksCart') as $cart_book) {
                $book = Book::find($cart_book['book_id']);

                //converting price to GHS
                $price = $book['selling_price'] * $book->multi_currency->rate;

                //adding order to table
                Order::create([
                    'invoice_number' => $latest_invoice ? $latest_invoice->invoice_number + 1 : 1,
                    'book_id' => $book->id,
                    'book_name' => $book['name'],
                    'book_price' => $price,
                    'book_quantity' => $cart_book['quantity'],
                    'shipping_details_id' => $shipping_details->id,
                    'user_id' => Auth::user()->id,
                    'author_id' => $book['user_id'],
                    'book_details' => $book
                ]);


                

                //depositing amount into author's account 

                //getting author details
                $author = User::find($book['user_id']);
                $deposit_amount = ($author->author_percentage / 100.00) * ($price * $cart_book['quantity']);
               
                Balance::create([
                    'user_id' => $author->id,
                    'transaction_type' => 'deposit',
                    'amount' => $deposit_amount,
                    'balance_left' => author_balance($author->id) + $deposit_amount,
                    'sweep_status' => 'n/a'
                ]);
                
            }

            

            //emptying cart
            session()->forget('booksCart');
            return redirect()->route('website-home')->with('success', 'Order successful');
        }
        else{
            return redirect()->route('website-home')->with('success', 'Your cart is empty');
        }
    }
}
