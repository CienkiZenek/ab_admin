<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Str;

class Kalendarium extends Model
{
    use HasFactory;
    protected $table = 'kalendarium';
    protected $fillable =['tytul', 'data', 'naglowek', 'tresc', 'wiecej', 'status', 'zdjecie1', 'zdjecie2',
        'zdjecie1_podpis', 'zdjecie2_podpis', 'zdjecie1_id', 'zdjecie2_id','title', 'keywords', 'description'];

    public function setTytulAttribute($value){
        $this->attributes['tytul']=$value;
        $this->attributes['slug']=Str::slug($value, '-');
    }

    public function setDataAttribute($value){
        $this->attributes['data']=$value;
        $this->attributes['rok']=(int)Str::substr($value, 0, 4);
        $this->attributes['mies']=(int)Str::substr($value, 5, 2);
        $this->attributes['dzien']=(int)Str::substr($value, 8, 2);

        switch (Str::substr($value, 5, 2)){
            case '1':
                $this->attributes['mies_tekst']='styczeń';
                break;
            case '2':
                $this->attributes['mies_tekst']='luty';
                break;
            case '3':
                $this->attributes['mies_tekst']='marzec';
                break;
            case '4':
                $this->attributes['mies_tekst']='kwiecień';
                break;
            case '5':
                $this->attributes['mies_tekst']='maj';
                break;
            case '6':
                $this->attributes['mies_tekst']='czerwiec';
                break;
            case '7':
                $this->attributes['mies_tekst']='lipiec';
                break;
            case '8':
                $this->attributes['mies_tekst']='sierpień';
                break;
            case '9':
                $this->attributes['mies_tekst']='wrzesień';
                break;
            case '10':
                $this->attributes['mies_tekst']='październik';
                break;
            case '11':
                $this->attributes['mies_tekst']='listopad';
                break;
            case '12':
                $this->attributes['mies_tekst']='grudzień';
                break;
        }

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
