<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lineaproducto extends Model
{
    protected $table = 'lineaproducto';
    protected $fillable = ['id', 'cantidad','id_producto', 'id_pedido'];
}
?>