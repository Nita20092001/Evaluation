<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perte extends Model
{
    use HasFactory;

    protected $fillable=['idlaptop','quantite'];

    protected $table='pertes';

    public function laptops(){
        return $this->belongsTo(Laptop::class,'idlaptop');
    }
}
