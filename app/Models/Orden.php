<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;
    protected $table = "orden";
    protected $primaryKey = "ord_id";

    public function detalles(){
        return $this->hasMany(DetalleOrden::class, 'ord_id');
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'usu_id');
    }
}
