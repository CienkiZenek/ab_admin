<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Strony extends Model
{
    use HasFactory;
    protected $table = 'strony';
    protected $fillable =['link', 'tytul', 'opis', 'zdjecie1', 'zdjecie2',
        'zdjecie1_podpis', 'zdjecie2_podpis', 'zdjecie1_id', 'zdjecie2_id',];

    public function zdjecia(): MorphToMany
    {
        return $this->morphToMany(Zdjecia::class, 'powiaz', 'zdjecia_powiazania')->withTimestamps();
    }
}
