<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biogram extends Model
{
    use HasFactory;
    protected $table = 'biogram';
    protected $fillable =['tresc', 'kolejnosc','rok', 'dzien_mies'];
}
