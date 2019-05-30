<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\Lineaproducto;
use App\Pedidos;

class StaffController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:staff');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pedidos = Pedidos::all();
        $lineaproducto = Lineaproducto::all();
        return view('staff.staff', array('pedidos' => $pedidos), array('productos' => $lineaproducto));
    }

    public function pagado($id)
    {
        $pedidos = Pedidos::find($id);
        if ($pedidos->estado == 'pendiente')
        {
        $pedidos->estado = "encurso";
        $pedidos->save();
        }
        return redirect('staff');
    }

    public function preparado($id)
    {
        $pedidos = Pedidos::find($id);
        if ($pedidos->estado == 'encurso')
        {
            $pedidos->estado = "preparado";
            $pedidos->save();
        }
        if ($pedidos->tipopedido == 'comeaqui' and $pedidos->estado == "preparado")
        {
            $pedidos->estado = "entregado";
            $pedidos->save();
        }
        return redirect('staff');
    }

    public function entregado($id)
    {
        $pedidos = Pedidos::find($id);
        if ($pedidos->tipopedido == 'parallevar' and $pedidos->estado == "preparado")
        {
            $pedidos->estado = "encamino";
            $pedidos->save();
        }
        return redirect('staff');
    }
}
