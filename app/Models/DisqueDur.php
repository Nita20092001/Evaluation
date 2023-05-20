<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisqueDur extends Model
{
    use HasFactory;

    protected $fillable = ["capacite"];

    protected $table = 'disquedurs';
}
