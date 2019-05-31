<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Empresa;
use App\Staff;
use App\Producto;

class EmpresaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:empresa');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('empresa.empresa');
    }

    public function getConfigurar($id)
    {
        $empresas = Empresa::find($id);
        return view('empresa.configure', array('arrayEmpresas'=> $empresas));
    } 

    public function setConfigurar(Request $request, $id){
        $nombre = $request->input("nombre");
        $codEmpresa = $request->input('codEmpresa');
        $telefono = $request->input('telefono');
        $direccion = $request->input('direccion');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $empresas = Empresa::find($id);
        $empresas->nombre = $nombre;
        $empresas->codEmpresa = $codEmpresa;
        $empresas->telefono = $telefono;
        $empresas->direccion = $direccion;
        $empresas->email = $email;
        $empresas->password = $password;
        $empresas->save();
        return redirect('empresa');                  
    }

    public function verStaffs()
    {
        $staffs = Staff::where('id_empresa',auth('empresa')->user()->id)->get();
        return view('empresa.verStaff', array('arrayStaffs'=> $staffs));
    }

    public function getStaffs()
    {
        return view('empresa.createStaff');
    }

    public function setStaffs(Request $request, $id)
    {
        $empresas = Empresa::find($id);
        $staffs = new Staff;
        $staffs->nombre = request('nombre');
        $staffs->telefono = request('telefono');
        $staffs->email = request('email');
        $staffs->worktime = request('worktime').'h';
        $staffs->role = request('role');
        $staffs->password =  Hash::make($request['password']);
        $staffs->id_empresa = $empresas->id;
        $staffs->save();
        return redirect('empresa');
    }

    public function verProducts()
    {
        $productos = Producto::where('id_empresa',auth('empresa')->user()->id)->get();
        return view('empresa.verProduct', array('arrayProductos'=> $productos));
    }

    public function getProducts()
    {
        return view('empresa.createProduct');
    }

    public function setProducts(Request $request, $id)
    {
        $empresas = Empresa::find($id);
        $productos = new Producto;
        $productos->nombre = request('nombre');
        $productos->precio = request('precio');
        $productos->imagen = request('imagen'); 
        $productos->id_empresa = $empresas->id; 
        $productos->save();
        return redirect('empresa');
    }

    public function editProducts($id)
    {
        $productos = Producto::find($id);
        return view('empresa.editProduct', array('arrayProductos'=> $productos));
    }

    public function updateProducts(Request $request, $id){
        $nombre = $request->input("nombre");
        $precio = $request->input('precio');
        $imagen = $request->input('imagen');
        $productos = Producto::find($id);
        $productos->nombre = $nombre;
        $productos->precio = $precio;
        $productos->imagen = $imagen;
        $productos->save();
        return redirect('empresa');                  
    }

    public function deleteProducts($id)
    {
        $productos = Producto::find($id);
        $productos->delete();
        return redirect('empresa');
    }
}