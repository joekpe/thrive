<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use App\Models\User;
use App\Mail\Agreement;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

use TCG\Voyager\Http\Controllers\VoyagerUserController as BaseVoyagerUserController;

class VoyagerUserController extends BaseVoyagerUserController
{
    public function profile(Request $request)
    {
        $route = '';
        $dataType = Voyager::model('DataType')->where('model_name', Auth::guard(app('VoyagerGuard'))->getProvider()->getModel())->first();
        if (!$dataType && app('VoyagerGuard') == 'web') {
            $route = route('voyager.users.edit', Auth::user()->getKey());
        } elseif ($dataType) {
            $route = route('voyager.'.$dataType->slug.'.edit', Auth::user()->getKey());
        }

        return Voyager::view('voyager::profile', compact('route'));
    }

    // POST BR(E)AD
    public function update(Request $request, $id)
    {
        if (Auth::user()->getKey() == $id) {
            $request->merge([
                'role_id'                              => Auth::user()->role_id,
                'user_belongstomany_role_relationship' => Auth::user()->roles->pluck('id')->toArray(),
            ]);
        }
        //dd($request);
        //update author percentage
        $user = User::where('id', $id)->first();
        $status = $user->status;
        //dd($user->status);
        if($user){
            if($request->author_percentage > 0 and $request->author_percentage != $user->author_percentage){
                
                $status = 'pending';
                
                $user->author_percentage = $request->author_percentage;
                $user['status'] = 'pending';
                $user->save();

                $details = [
                    'author_percentage' => $request->author_percentage,
                    'app_url' => URL::to('/activate_account/'.$user->id),
                ];
                Mail::to($request->email)->send(new Agreement($details));
            }
        }
        $request['status'] = $status;
        return parent::update($request, $id);
    }
}
