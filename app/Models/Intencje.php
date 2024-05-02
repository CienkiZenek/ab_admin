<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intencje extends Model
{
    use HasFactory;
    protected $table = 'intencje';
    protected $fillable =['status', 'typ', 'tresc_nadeslana', 'tresc_opublikowana'];
}
