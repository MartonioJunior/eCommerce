<?php

namespace App\Http\Controllers\Auth;

use App\Client;
use App\Business\ClientBusiness;
use App\Business\AdminBusiness;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    protected $redirectTo = 'client';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:client');
    }

    public function clientRegisterForm()
    {
        return view('auth.signup', ['url' => 'client']);
    }

    public function adminRegisterForm()
    {
        return view('auth.signup', ['url' => 'admin']);
    }

    public function registerClient(Request $request) {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'login' => 'required',
            'password' => 'required'
        ]);

        if ($request->input('password') != $request->input('password_confirmation')) {
            return;
        }
        $data = [
            'name' => $request->input('name'),
            'login' => $request->input('login'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'address' => $request->input('address'),
        ];
        $client = RegisterController::createClient($data);
        $client->save();
        auth('client')->login($client, true);
        return redirect()->to('/');
    }

    public function registerAdmin(Request $request) {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'login' => 'required',
            'password' => 'required'
        ]);

        if ($request->input('password') != $request->input('password_confirmation')) {
            return;
        }

        $data = [
            'name' => $request->input('name'),
            'login' => $request->input('login'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        $admin = RegisterController::createAdmin($data);
        $admin->save();
        auth('admin')->login($admin, true);
        return redirect()->to('/');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    /*
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'login' => ['required', 'string', 'max:40'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string', 'max:255'],
        ]);
    }
    */

    protected function createClient(array $data)
    {
        return ClientBusiness::create($data['name'], $data['email'], $data['login'], Hash::make($data['password']), $data['address']);
    }

    protected function createAdmin(array $data)
    {
        return AdminBusiness::create($data['name'], $data['email'], $data['login'], Hash::make($data['password']));
    }
}
