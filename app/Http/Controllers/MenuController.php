<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \App\Lineaproducto;

class MenuController extends Controller
{
    public function getIndex(){
        $arrayProductos = Lineaproducto::all();
        return view('menu.index', array('arrayProductos'=>$arrayProductos));
    }
    
    public function getShow($id){
        $arrayProductos = Lineaproducto::find($id);
        return view('menu.show', array('arrayProductos'=>$arrayProductos));
    }
 
}