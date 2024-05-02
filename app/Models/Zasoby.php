<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Str;

class Zasoby extends Model
{
    use HasFactory;
    protected $table = 'zasoby';
    protected $fillable =['nazwa', 'opis', 'tresc', 'rodzaj', 'zdjecie1', 'zdjecie2', 'strona_glowna',
        'zdjecie1_podpis', 'zdjecie2_podpis', 'zdjecie1_id', 'zdjecie2_id','title', 'keywords', 'description'];

    public function setNazwaAttribute($value){
        $this->attributes['nazwa']=$value;
        $this->attributes['slug']=Str::slug($value, '-');
    }

    public function zdjecia(): MorphToMany
    {
        return $this->morphToMany(Zdjecia::class, 'powiaz', 'zdjecia_powiazania')->withTimestamps();
    }
    public function pliki(): MorphToMany
    {
        return $this->morphToMany(Pliki::class, 'powiazPliki', 'pliki_powiazania')->withTimestamps();
    }
    public function galeria(): MorphToMany
    {
        return $this->morphToMany(Zdjecia::class, 'powiaz', 'zdjecia_powiazania')->wherePivot('rodzaj', 'Galeria');
    }
    public function watki(): MorphToMany
    {
        return $this->morphToMany(Watki::class, 'powiazWatki', 'watki_powiazania')->withTimestamps();
    }
}
