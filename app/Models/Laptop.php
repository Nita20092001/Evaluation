<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;

    protected $fillable = ["modele","idmarque","idprocesseur","idram","idecran","iddisquedur","prix","prix_achat"];

    protected $table = 'laptops';

    public function laptops(){
        return $this->belongsTo(Laptop::class);
    }

    public function marques(){
        return $this->belongsTo(Marque::class,'idmarque');
    }

    public function processeurs(){
        return $this->belongsTo(Processeur::class,'idprocesseur');
    }

    public function rams(){
        return $this->belongsTo(Ram::class,'idram');
    }

    public function disquedurs(){
        return $this->belongsTo(DisqueDur::class,'iddisquedur');
    }
    
    public function ecrans(){
        return $this->belongsTo(Ecran::class,'idecran');
    }

}
