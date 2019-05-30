<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    protected $table = 'pedidos';
    
    protected $fillable = ['id', 'tipopedido','estado', 'total', 'pagado','id_cliente'];
}
?>