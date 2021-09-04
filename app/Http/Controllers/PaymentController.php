<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Paystack;
use Auth;
use App\Models\Book;
use App\Models\Order;
use App\Models\Balance;
use \App\Models\User;

class PaymentController extends Controller
{
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        $paymentDetails = $paymentDetails['data'];

        if($paymentDetails['status'] == 'success'){
            //dd($paymentDetails['metadata']['order_id']);
            foreach (session()->get('booksCart') as $cart_book) {
                $book = Book::find($cart_book['book_id']);

                //converting price to GHS
                $price = $book['selling_price'] * $book->multi_currency->rate;

                //adding order to table
                Order::create([
                    'invoice_number' => $paymentDetails['metadata']['order_id'],
                    'book_id' => $book->id,
                    'book_name' => $book['name'],
                    'book_price' => $price,
                    'book_quantity' => $cart_book['quantity'],
                    'shipping_details_id' => $paymentDetails['metadata']['shipping_details'],
                    'user_id' => Auth::user()->id,
                    'author_id' => $book['user_id'],
                    'paystack_reference' => $paymentDetails['reference']
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

                $book->quantity = $book->quantity - $cart_book['quantity'];
                $book->save();
                
            }

            

            //emptying cart
            session()->forget('booksCart');
            return redirect()->route('website-home')->with('success', 'Order successful');
            
            //dd($paymentDetails);
            // Now you have the payment details,
            // you can store the authorization_code in your db to allow for recurrent subscriptions
            // you can then redirect or do whatever you want
        }else{
            return redirect()->route('cart')->with('errorMessage', 'Failed to complete order, please try again');
        }
        
    }
}
