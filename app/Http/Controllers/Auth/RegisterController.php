<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Location;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;

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
    protected $redirectTo = '/dashboard';

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm()
    {
        $locations=Location::orderBy('name','asc')->get();
        return view('auth.register',compact('locations'));
    }

    public function register(Request $request)
    {
       
        $this->validate($request, [
            'lastname' => 'required|string',
            'firstname' => 'required|string',
            'regnumber' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'department_id' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = new User;
        $user->lastname = $request->lastname;
        $user->firstname = $request->firstname;
        $user->useridentity = 'phcn' . date('Y') . '_' . rand(33000, 99955);
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->department_id = $request->department_id;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->location_id = $request->location_id;
        $user->role_id = $request->role_id;
        

        $user->save();

        return redirect(route('login'))->with('success', 'Your account has been created successfully with ref '.$user->useridentity);
    }
}
