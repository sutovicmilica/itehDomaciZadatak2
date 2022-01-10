<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odeca extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'opis',
        'tip_id'
    ];

    protected $table = 'odeca';
}
