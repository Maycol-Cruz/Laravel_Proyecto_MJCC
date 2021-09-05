<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleOrden extends Model
{
    use HasFactory;
    protected $table = "detalle_orden";
    protected $primaryKey = "dor_id";

    public function producto(){
        return $this->belongsTo(Producto::class, 'pro_id');
    }
}
