<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\AuthorSignup;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if($data['role_id'] == 3){
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'role_id' => ['required', 'int'],
                'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg|max:2048']
            ]);
        }else{
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'role_id' => ['required', 'int'],
            ]);
        } 
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if($data['role_id'] == 3){
            $imageName = time().'.'.$data['avatar']->extension();  
     
            $data['avatar']->move(public_path('storage/users'), $imageName); 

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role_id' => $data['role_id'],
                'avatar' => 'users/'.$imageName,
                'phone_number' => $data['phone_number'],
                'status' => 'pending'
            ]);

            $bio = \App\Models\AuthorBiography::create([
                'user_id' => $user->id
            ]);

            $details = [
                'name' => $data['name'],
                'email' => $data['email'],
                'phone_number' => $data['phone_number'],
            ];
            Mail::to(env('SITE_OWNER_EMAIL'))->send(new AuthorSignup($details));

            return $user;

        }else{

            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role_id' => $data['role_id'],
                'phone_number' => $data['phone_number'],
                'status' => 'n/a'
            ]);
        }
    }
}
