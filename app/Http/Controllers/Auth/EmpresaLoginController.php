<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Empresa;

class EmpresaLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:empresa');
    }

    public function showLoginForm()
    {
        return view('auth.empresa-login');
    }

    public function showRegisterForm()
    {
        return view('auth.empresa-register');
    }

    public function login(request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|max:9'
        ]);

        if (Auth::guard('empresa')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('empresa.dashboard'));    
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function register(request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'codEmpresa' => ['required', 'integer', 'max:255'],
            'phone' => ['required', 'integer', 'min:9'],
            'direction' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:empresas'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $empresas = new Empresa;
        $empresas->nombre = request('name');
        $empresas->codEmpresa = request('codEmpresa');
        $empresas->telefono = request('phone');
        $empresas->direccion = request('direction');
        $empresas->email = request('email');
        $empresas->password = Hash::make($request['password']);
        $empresas->save();
        return redirect()->intended(route('empresa.dashboard'));
    }
}
