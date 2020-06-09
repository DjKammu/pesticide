<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'sometimes','string', 
                'email', 'max:255', 'unique:users'],
            'refer_sponser_id' => ['nullable','sometimes','exists:App\UserInfo,sponser_id'],
            'number' => ['required','numeric','unique:users',
                   function ($attribute, $value, $fail) {
                      $valid = preg_match('%^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$%i', $value) && strlen($value) >= 10;
                       if(!$valid ){
                           $fail('The phone number is invalid');
                       }
                  } 
             ],
            'password' => ['required', 'string', 'min:8'],
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
        $first_name = $data['name'];
        $last_name = request()->last_name;
        $name = $first_name.($last_name ? ' '.$last_name : '');

        $user =  User::create([
            'name' => $name,
            'email' => $data['email'],
            'number' => $data['number'],
            'password' => Hash::make($data['password']),
            'role' => User::ROLE_USER,
        ]);

        $data['first_name'] = $first_name;
        $data['last_name'] = $last_name;
        $refer_sponser_id = request()->refer_sponser_id;
        $data['sponser_id'] = strtoupper(\Str::random(10));
        $data['refer_sponser_id'] = ($refer_sponser_id) ? $refer_sponser_id 
                : User::TOP_SPONSER;
        $user->userInfo()->create($data);

        return $user;
    }
}
