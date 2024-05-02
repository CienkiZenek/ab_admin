<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Str;

class Filmy extends Model
{
    use HasFactory;
    protected $table = 'filmy';
    protected $fillable =['tytul', 'opis', 'film_kod', 'kanal', 'kanal_url', 'rodzaj', 'gatunek', 'title', 'keywords', 'description'];

public function setTytulAttribute($value){
    $this->attributes['tytul']=$value;
    $this->attributes['slug']=Str::slug($value, '-');
}
    public function watki(): MorphToMany
    {
        return $this->morphToMany(Watki::class, 'powiazWatki', 'watki_powiazania')->withTimestamps();
    }
}
