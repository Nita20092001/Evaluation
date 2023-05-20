<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magasin_stock extends Model
{
    use HasFactory;

    protected $fillable=["idlaptop","quantite"];

    protected $table='magasin_stocks';

    public function laptops(){
        return $this->belongsTo(Laptop::class,'idlaptop');
    }
}
