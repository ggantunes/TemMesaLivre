<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
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
    protected $redirectTo = '/home';

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
        return Validator::make($data, [
            'name' => 'string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required','string','min:6', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/'],
            'profile' => 'required|string|max:255',
            'userName' => 'required|string|max:255',
            'companyName' => 'string|max:255',
            'ctr' => 'string|max:255', 
            'itr' => 'string|max:255', 
            'nic' => 'string|max:255', 
            'cel' => 'string|max:255'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //If profile is Professional, cheate the fields below
        if($data['profile'] == 3){
            $user = User::create([
                'profile' => $data['profile'],
                'userName' => $data['userName'],
                'name' => $data['name'],
                'cel' => $data['cel'],
                'itr' => $data['itr'], //Individual Taxpayer Registry (CPF)
                'nic' => $data['nic'], //National Identity Card (RG)
                'email' => $data['email'],
                'password' => Hash::make($data['password'])
            ]);
        //If profile is not Professional, cheate the fields below
        }else{
            $user = User::create([
            'profile' => $data['profile'],
            'companyName' => $data['companyName'],            
            'ctr' => $data['ctr'], //Corporate Taxpayer Registry (CNPJ)
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        }
        

        //Send mail to Client, when new users are registred
        Mail::to($data['email'])->send(new WelcomeMail($user));

        return $user;
    }
}
