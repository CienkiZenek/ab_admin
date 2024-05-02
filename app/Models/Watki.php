<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Str;

class Watki extends Model
{
    use HasFactory;
    protected $table = 'watki';
    protected $fillable =['tytul'];
    public function setTytulAttribute($value){
        $this->attributes['tytul']=$value;
        $this->attributes['slug']=Str::slug($value, '_');
    }
    /*public function wiadomosci(){
        return $this->belongsToMany(Wiadomosci::class, 'watki_wiadomosci', 'watki_id','wiadomosci_id');
    }*/

    public function wiadomosc(): MorphToMany
    {
        return $this->morphedByMany(Wiadomosci::class, 'powiazWatki', 'watki_powiazania')->withTimestamps();
    }

}
