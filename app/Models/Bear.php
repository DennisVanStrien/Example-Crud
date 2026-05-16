<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bear extends Model
{
    protected $table = 'bear';

    protected $fillable = [
        'name',
        'color',
    ];
}
