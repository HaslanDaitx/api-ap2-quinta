<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Heroi extends Model
{
    protected $fillable = [
        'nome',
        'universo',
        'pontoDePoder',
    ];
}