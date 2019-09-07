<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Rules\PhoneNumber;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/';

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
            'name'                  => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'                 => ['required', 'string', 'max:255', 'unique:users', new PhoneNumber],
            'password'              => ['required', 'string', 'min:8', 'confirmed'],
            "gender"                => ['required', 'string'],
            "date_of_birth"         => ['nullable', 'date'],
            "blood_group"           => ['required', 'string'],
            "country"               => ['required', 'string'],
            "state"                 => ['required', 'string'],
            "city"                  => ['required', 'string'],
            "is_donated_before"     => ['nullable', 'boolean'],
            "is_available"          => ['nullable', 'boolean'],
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
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'date_of_birth' => $data['date_of_birth'],
            'blood_group' => $data['blood_group'],
            'country' => $data['country'],
            'state' => $data['state'],
            'city' => $data['city'],
            'is_donated_before' => $data['is_donated_before']?true:false,
            'is_available' => $data['is_available']?true:false,
        ]);
        return $user;
    }
}
