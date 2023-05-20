<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfert extends Model
{
    use HasFactory;

    protected $fillable = ["idlaptop","quantite","idpointdevente","etat"];

    protected $table = 'transferts';

    public function laptops(){
        return $this->belongsTo(Laptop::class,"idlaptop");
    }

    public function pointdeventes(){
        return $this->belongsTo(PointDeVente::class,"idpointdevente");
    }


}
