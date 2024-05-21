<?php
namespace App\Services;

use App\Models\Watki;
use App\Models\Wiadomosci;
use App\Models\Pliki;
use App\Models\Zasoby;
use App\Models\Kalendarium;
use App\Models\Czywiesz;
use App\Models\Modlitwy;
use App\Models\Biografia;
use App\Models\Artykuly;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PlikiDodawanie {


    public static function plikiPowiazania($plik_id, $limit)
    {
     $powiazania=DB::table('pliki_powiazania',)->where('pliki_id', $plik_id)->limit($limit)->orderBy('created_at', 'desc')->get();

  //   $jeden=$powiazania->first();

        $powiazania->map(function ($powiazania) {

            switch ($powiazania->powiazPliki_type) {
                case 'App\Models\Wiadomosci':
                    $powiazania->rodzaj='Wiadomości';
                    $wiadomosc=Wiadomosci::find($powiazania->powiazPliki_id);
                    $powiazania->pow_tytul=$wiadomosc->tytul;
                    break;

               case 'App\Models\Modlitwy':
                    $powiazania->rodzaj='Modlitwy';
                    $modlitwa=Modlitwy::find($powiazania->powiazPliki_id);
                    $powiazania->pow_tytul=$modlitwa->nazwa;
                    break;
                case 'App\Models\Czywiesz':
                    $powiazania->rodzaj='Czy wiesz, że...';
                    $czywiesz=Czywiesz::find($powiazania->powiazPliki_id);
                    $powiazania->pow_tytul=$czywiesz->tytul;
                    break;
                 case 'App\Models\Kalendarium':
                    $powiazania->rodzaj='Kalendarium';
                    $wiadomosc=Kalendarium::find($powiazania->powiazPliki_id);
                    $powiazania->pow_tytul=$wiadomosc->tytul;
                    break;
                case 'App\Models\Zasoby':
                    $powiazania->rodzaj='Zasoby';
                    $wiadomosc=Zasoby::find($powiazania->powiazPliki_id);
                    $powiazania->pow_tytul=$wiadomosc->nazwa;
                    break;
                case 'App\Models\Artykuly':
                    $powiazania->rodzaj='Artykuły';
                    $artykul=Artykuly::find($powiazania->powiazPliki_id);
                    $powiazania->pow_tytul=$artykul->tytul;
                    break;
                case 'App\Models\Biografia':
                    $powiazania->rodzaj='Biografia';
                    /*$wiadomosc=Biografia::find($powiazania->powiazPliki_id);
                    $powiazania->pow_tytul=$wiadomosc->tytul;*/
                    break;
                default:
                    return 'Brak pozycji plikiPowiazania';


            }

            $powiazania->pow_data=Carbon::parse($powiazania->created_at)->format('Y-m-d');

            //$powiazania['liczbaDodan'] = DB::table('zdjecia_powiazania')->where('zdjecia_id', $Wyniki->id)->count();


            return $powiazania;
        });

return $powiazania;
    }

    public static function plikiMozliweDlaPublikacji($dzial, $tresc_id)
    {
       // dd($dzial);
        $plikiWszystkie=Pliki::all();
        switch ($dzial)
        {

            case 'Wiadomosci':
                $tresc=Wiadomosci::find($tresc_id);
                break;
            case 'Czywiesz':
                $tresc=Czywiesz::find($tresc_id);
                break;
            case 'Kalendarium':
                $tresc=Kalendarium::find($tresc_id);
                break;
            case 'Modlitwy':
                $tresc=Modlitwy::find($tresc_id);
                break;
            case 'Zasoby':
                $tresc=Zasoby::find($tresc_id);
                break;
            case 'Biografia':
                $tresc=Biografia::find($tresc_id);
                break;
            case 'Artykuly':
               $tresc=Artykuly::find($tresc_id);
                break;
            default:
                return 'Brak pozycji plikiMozliweDlaPublikacji';

        }
        $plikiPublikacji=$tresc->pliki()->get();
        $Wyniki=$plikiWszystkie->diff($plikiPublikacji);
        return $Wyniki;
    }

    public static function plikZalaczOdlacz($dzial, $tryb, $tresc_id, $plik_id)
    {
        switch ($dzial){

            case 'Wiadomosci':
                $watki=Watki::orderBy('tytul', 'asc')->get();
                $pliki=Pliki::orderBy('opis', 'asc')->get();
                $wiadomosc = Wiadomosci::findOrFail($tresc_id);

                if($tryb=='Zalaczanie'){
                    $wiadomosc->pliki()->attach($plik_id);
                }
                else {
                    $wiadomosc->pliki()->detach($plik_id);
                }

                $listaRoutName='wiadomosciLista';
                $nazwaListy='Lista wiadomości';
                $galeria=$wiadomosc->galeria;
                return view('tresc.edycja.wiadomosci-edycja', ['wiadomosc'=>$wiadomosc,
                    'watki'=>$watki,
                    'pliki'=>$pliki,
                    'galeria'=>$galeria,
                    'nazwaListy'=>$nazwaListy,
                    'listaRoutName'=>$listaRoutName,
                    'plikiZmiana'=>'Tak'
                ]);
                break;
            case 'Modlitwy':
                $modlitwa = Modlitwy::findOrFail($tresc_id);


                if($tryb=='Zalaczanie'){
                    $modlitwa->pliki()->attach($plik_id);
                }
                else {
                    $modlitwa->pliki()->detach($plik_id);
                }
                $listaRoutName='modlitwyLista';
                $nazwaListy='Lista modlitw';
                return view('tresc.edycja.modlitwy-edycja', ['modlitwa'=>$modlitwa,
                    'nazwaListy'=>$nazwaListy,
                    'listaRoutName'=>$listaRoutName,
                    'plikiZmiana'=>'Tak'
                ]);
                break;


            case 'Czywiesz':
                $czywiesz = Czywiesz::findOrFail($tresc_id);
                if($tryb=='Zalaczanie'){
                    $czywiesz->pliki()->attach($plik_id);
                }
                else {
                    $czywiesz->pliki()->detach($plik_id);
                }
                $listaRoutName='czywieszLista';
                $nazwaListy='Lista "Czy wiesz"';
                return view('tresc.edycja.czywiesz-edycja', ['czywiesz'=>$czywiesz,
                    'nazwaListy'=>$nazwaListy,
                    'listaRoutName'=>$listaRoutName,
                    'plikiZmiana'=>'Tak'
                ]);
                break;

            case 'Zasoby':
                $zasob = Zasoby::findOrFail($tresc_id);
                if($tryb=='Zalaczanie'){
                    $zasob->pliki()->attach($plik_id);
                }
                else {
                    $zasob->pliki()->detach($plik_id);
                }
                $listaRoutName='zasobyLista';
                $nazwaListy='"Zdjęcia, dokumenty, książki" - lista';
                $galeria=$zasob->galeria;
                return view('tresc.edycja.zasoby-edycja', ['zasob'=>$zasob,
                    'nazwaListy'=>$nazwaListy,
                    'galeria'=>$galeria,
                    'listaRoutName'=>$listaRoutName,
                    'plikiZmiana'=>'Tak'
                ]);
                break;

            case 'Kalendarium':
                $kalendarium = Kalendarium::findOrFail($tresc_id);
                if($tryb=='Zalaczanie'){
                    $kalendarium->pliki()->attach($plik_id);
                }
                else {
                    $kalendarium->pliki()->detach($plik_id);
                }
                $listaRoutName='kalendariumLista';
                $nazwaListy=' Kalendarium - lista pozycji';
                return view('tresc.edycja.kalendarium-edycja', ['kalendarium'=>$kalendarium,
                    'nazwaListy'=>$nazwaListy,
                    'listaRoutName'=>$listaRoutName,
                    'plikiZmiana'=>'Tak'
                ]);
                break;
            case 'Biografia':

                break;
            case 'Artykuly':
                $watki=Watki::orderBy('tytul', 'asc')->get();
                $pliki=Pliki::orderBy('opis', 'asc')->get();
                $artykul = Artykuly::findOrFail($tresc_id);

                if($tryb=='Zalaczanie'){
                    $artykul->pliki()->attach($plik_id);
                }
                else {
                    $artykul->pliki()->detach($plik_id);
                }

                $listaRoutName='artykulyLista';
                $nazwaListy='Lista artykułów';
                $galeria=$artykul->galeria;
                return view('tresc.edycja.artykuly-edycja', ['artykul'=>$artykul,
                    /*'watki'=>$watki,
                    'pliki'=>$pliki,
                    'galeria'=>$galeria,*/
                    'nazwaListy'=>$nazwaListy,
                    'listaRoutName'=>$listaRoutName,
                    'plikiZmiana'=>'Tak'
                ]);


                break;

            default:
                return 'Brak pozycji plikZalaczOdlacz';

        }
}

}
