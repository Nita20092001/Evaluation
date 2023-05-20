<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processeur extends Model
{
    use HasFactory;

    protected $fillable = ["nom","frequence"];

    protected $table = 'processeurs';
}
