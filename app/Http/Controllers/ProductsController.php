<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Empresa;
use App\Producto;
use App\Pedidos;
use App\LineaProducto;

class ProductsController extends Controller
{
    public function index($id)
    {
        $empresas = Empresa::find($id);
        $productos = Producto::where('id_empresa',$empresas->id)->get();
        if (count($productos)>0){
            return view('cart.products')->withDetails($productos);
        }
        return view('cart.products')->withMessage("No element found!");
    }
 

    public function cart()
    {
        return view('cart.cart');
    }
    
    public function addToCart($id)
    {
        $product = Producto::find($id);
        $cart = session()->get('cart');

        if(!$cart) {
            $cart = [
                    $id => [
                        "nombre" => $product->nombre,
                        "quantity" => 1,
                        "precio" => $product->precio,
                        "imagen" => $product->imagen    
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'se añadio perfectamente');
        }

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'se añadio perfectamente');
        }
 
        $cart[$id] = [
            "nombre" => $product->nombre,
            "quantity" => 1,
            "precio" => $product->precio,
            "imagen" => $product->imagen    
        ];
 
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'se añadio perfectamente');
    }
    public function getInsert(){
        $contacto = new Pedidos;
        $contacto->id;
        $contacto->tipopedido=request("tipopedido");
        $contacto->total=request("total");
        $contacto->pagado=true;
        $contacto->id_cliente=auth('client')->user()->id;
        $contacto->save();
        $cart = session()->get('cart');
        foreach ($cart as $key => $value) {
            $contacto1 = new Lineaproducto;
            $contacto1->cantidad=$value["quantity"];
            $contacto1->id_producto=$key;
            $contacto1->id_pedido=$contacto->id;
            $contacto1->save();
        }
        return view('cart.pedido');
    }
    
    public function getinsertVisa(Request $_request, $id)
    {
        $n1=$_request->input("n3");
        $n2=$_request->input("n4");
        $n3=$_request->input("n5");
        $arrayProductos = Cliente::find($id);
        $arrayProductos->visa=$n1;
        $arrayProductos->numero=$n2;
        $arrayProductos->numerodedetra=$n3;
        $arrayProductos->save();
        return view('cart.visa');
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            if(($request->quantity)>=1)
            {
            session()->put('cart', $cart);
            session()->flash('success', 'se cambio perfectamente');
            }else{
                echo '<script language="javascript">alert("No se puede cambiar a una cantidad negativa");</script>'; ;
            }
        }
    }
 
    public function remove(Request $request)
    {
        if($request->id) 
        {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'se elimino perfectamente');
        }
    }
}
/*YONG FOOD
Token Service:
7a4a794e3068386358776b4c506f35376866454545796c396f324f464f4a4a63
Token Secret:
5031724259634f4c706a726754657054326d46354e6d5863566d567a374b3532
Recurrencia: PAYPERUSE
Plan Relacionado: INDEPENDIENTE TRIAL (3 Meses // 2.95 )
Habilitado: 1
Válido Hasta: 28-05-2019
Fecha de Creación: 28-05-2019
Fecha de Actualización: 28-05-2019
URL Servicio: http://localhost/phpmyadmin/sql.php?db=projec*/