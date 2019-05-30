<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Empresa;
use App\Producto;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:client');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('client.client');
    }

    public function showAll()
    {
        $clientes = Client::all();
        $empresas = Empresa::all();
        $productos = Producto::all();
        return view('client.search', array('arrayClientes'=> $clientes), array('arrayEmpresas'=> $empresas), array('arrayProductos'=> $productos));
    }

    public function showEmpresa(request $request)
    {
        $empresas = $request->input('busca');
        if ($empresas != ""){
            $empresa = Empresa::where('nombre', 'LIKE', '%' .$empresas. '%')->get();
            if (count($empresa)>0){
                return view('client.verEmpresa')->withDetails($empresa)->withQuery($empresas);
            }
        }
        return view('client.verEmpresa')->withMessage("No element found!")->withQuery($empresas);
    }

    public function getConfigurar()
    {
        $clientes = Client::where('id',auth('client')->user()->id)->first();
        return view('client.configure', array('arrayClientes'=> $clientes));
    } 

    public function setConfigurar(Request $request, $id){
        $nombre = $request->input("nombre");
        $telefono = $request->input('telefono');
        $direccion = $request->input('direccion');
        $email = $request->input('email');
        $password = $request->input('password');
        $clientes = Client::find($id);
        $clientes->nombre = $nombre;
        $clientes->telefono = $telefono;
        $clientes->direccion = $direccion;
        $clientes->email = $email;
        $clientes->password = $password;
        $clientes->save();
        return redirect('client');                  
    }

}
