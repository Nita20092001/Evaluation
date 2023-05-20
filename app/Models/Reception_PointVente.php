<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reception_PointVente extends Model
{
    use HasFactory;

    protected $fillable = ['idlaptop','quantite','idpointdevente'];

    protected $table = 'reception_pointventes';

    public function laptops(){
        return $this->belongsTo(Laptop::class,'idlaptop');
    }

    public function pointdeventes(){
        return $this->belongsTo(PointDeVente::class,'idpointdevente');
    }

}
