<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cytat extends Model
{
    use HasFactory;
    protected $table = 'cytat';
    protected $fillable =['tresc', 'podpis', 'gatunek' ];
}
