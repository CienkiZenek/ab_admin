<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ksiegarnie extends Model
{
    use HasFactory;
    protected $table = 'ksiegarnie';
    protected $fillable =['nazwa', 'link', 'opis', 'dostepna'];
}
