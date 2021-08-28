<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balance;
use Auth;

class BalanceController extends Controller
{
    public function withdraw(){
        $pending_requests = Balance::where('user_id', Auth::user()->id)->where('sweep_status', 'pending')->get();
        return view('vendor.voyager.balances.withdraw')->with('pending_requests', $pending_requests);
    }

    public function withdrawal(Request $request){
        $this->validate($request, [
            'sweep_amount' => 'required|integer|min:1|max:'.author_balance(Auth::user()->id).'',
            'sweep_number' => 'required'
        ]);

        $withdrawal = Balance::create([
            'user_id' => Auth::user()->id,
            'transaction_type' => 'withdrawal',
            'amount' => $request->sweep_amount,
            'balance_left' => author_balance(Auth::user()->id) - $request->sweep_amount,
            'sweep_status' => 'pending',
            'sweep_number' => $request->sweep_number
        ]);

       
        return redirect()->back();
        
    }

    public function withdrawal_requests(){
        $withdrawal_requests = Balance::where('sweep_status', 'pending')->paginate(5);
        return view('vendor.voyager.balances.withdrawal_requests')->with('withdrawal_requests', $withdrawal_requests);
    }

    public function approve_withdrawal($id){

        $withdrawal_request = Balance::findOrFail($id);
        $withdrawal_request->sweep_status = 'approved';

        if( $withdrawal_request->save() ){
            return redirect()->back()->with([ 'message'=>'Request Approved', 'alert-type'=>'success']);
        }else{
            return redirect()->back()->with([ 'message'=>'Request Approval Failed', 'alert-type'=>'error']);
        }
    }
}
