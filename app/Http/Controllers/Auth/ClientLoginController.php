<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Client;

class ClientLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:client');
    }

    public function showLoginForm()
    {
        return view('auth.client-login');
    }

    public function showRegisterForm()
    {
        return view('auth.client-register');
    }

    public function login(request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|max:9'
        ]);

        if (Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('client.dashboard'));    
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function register(request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'direction' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clientes'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'visa' => ['optional', 'string'],
            'numero' => ['optional', 'string'],
        ]);

        $clientes = new Client;
        $clientes->nombre = request('name');
        $clientes->telefono = request('phone');
        $clientes->direccion = request('direction');
        $clientes->email = request('email');
        $clientes->password = Hash::make($request['password']);
        $clientes->visa = "";
        $clientes->numero = "";
        $clientes->save();
        return redirect()->intended(route('client.dashboard'));
    }
}
