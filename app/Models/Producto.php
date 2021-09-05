<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    // use HasFactory;
    protected $table = "producto";
    protected $primaryKey = "pro_id";
    //public $timestamps = false;

    public function categoria(){
        return $this->belongsto(Categoria::class, 'cat_id');
    }

}
