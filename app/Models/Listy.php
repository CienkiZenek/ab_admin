<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listy extends Model
{
    use HasFactory;
    protected $table = 'listy';
    protected $fillable =['status', 'tresc'];
}
