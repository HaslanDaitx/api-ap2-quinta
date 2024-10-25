<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vilao extends Model
{
    protected $fillable = [
        'nome',
        'universo',
        'pontoDePoder',
    ];
}