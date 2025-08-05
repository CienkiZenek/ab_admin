<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Str;

class Wiadomosci extends Model
{
    use HasFactory;
    protected $table = 'wiadomosci';
    protected $fillable =['tytul', 'rodzaj', 'naglowek', 'tresc', 'data', 'gatunek','autor', 'zrodlo', 'status', 'strona_glowna', 'zdjecie_karuzela', 'zdjecie_karuzela_podpis', 'zdjecie_karuzela_id', 'galeria_nazwa',  'przyklejona', 'link_tresc', 'link_url', 'zdjecie1', 'zdjecie2',
        'zdjecie1_podpis', 'zdjecie2_podpis', 'zdjecie1_id', 'zdjecie2_id', 'ramka1', 'ramka2', 'komentarz', 'film', 'film_podpis', 'cytat1', 'cytat2', 'cytat3', 'cytat4', 'title', 'keywords', 'description'];


    public function setTytulAttribute($value){
        $this->attributes['tytul']=$value;
        $this->attributes['slug']=Str::slug($value, '-');
    }

    public function zdjecia(): MorphToMany
    {
        return $this->morphToMany(Zdjecia::class, 'powiaz', 'zdjecia_powiazania')->withTimestamps();
    }

    public function watki(): MorphToMany
    {
        return $this->morphToMany(Watki::class, 'powiazWatki', 'watki_powiazania')->withTimestamps();
    }

    public function pliki(): MorphToMany
    {
        return $this->morphToMany(Pliki::class, 'powiazPliki', 'pliki_powiazania')->withTimestamps();
    }


   public function galeria(): MorphToMany
    {
        return $this->morphToMany(Zdjecia::class, 'powiaz', 'zdjecia_powiazania')->wherePivot('rodzaj', 'Galeria');
    }

}
