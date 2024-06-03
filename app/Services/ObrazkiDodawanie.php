<?php
namespace App\Services;

use App\Models\Wiadomosci;
use App\Models\Zdjecia;
use App\Models\Pliki;
use App\Models\Strony;
use App\Models\Zasoby;
use App\Models\Kalendarium;
use App\Models\Czywiesz;
use App\Models\Modlitwy;
use App\Models\Biografia;
use App\Models\Artykuly;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ObrazkiDodawanie {


    public static function obrazekDodaj($tresc, $rodzaj, $plikZdjecia, $zdjecie_id, $tryb)
    {
        switch ($tryb) {

            case 'dodawanie':
        $tresc->zdjecia()->attach($zdjecie_id, ['rodzaj' => $rodzaj]);

        switch ($rodzaj) {
            case 'Zdjecie1':
                $tresc->zdjecie1 = $plikZdjecia;
                $tresc->zdjecie1_id = $zdjecie_id;
                $tresc->save();
                break;
            case 'Zdjecie2':
                $tresc->zdjecie2 = $plikZdjecia;
                $tresc->zdjecie2_id = $zdjecie_id;
                $tresc->save();
                break;
            default:
                return 'Brak pozycji';
        }
        // koniec tryb 'dodawanie'
break;

            case 'usuwanie':

                $tresc->zdjecia()->detach([$zdjecie_id]);

                switch ($rodzaj) {
                    case 'Zdjecie1':
                        $tresc->zdjecie1 = '';
                        $tresc->zdjecie1_id = null;
                        $tresc->save();
                        break;
                    case 'Zdjecie2':
                        $tresc->zdjecie2 = '';
                        $tresc->zdjecie2_id = null;
                        $tresc->save();
                        break;
                }

                // koniec tryb 'usuwanie'
                break;
            default:
                return 'Brak pozycji';

    }

    }

    public static function obrazekPowiazania($zdjecie_id, $limit)
    {
     $powiazania=DB::table('zdjecia_powiazania')->where('zdjecia_id', $zdjecie_id)->limit($limit)->orderBy('created_at', 'desc')->get();

  //   $jeden=$powiazania->first();

//dd($jeden);
        $powiazania->map(function ($powiazania) {
           // $powiazania->rodzaj = 'Wiadomość';
            switch ($powiazania->powiaz_type) {
                case 'App\Models\Wiadomosci':
                    $powiazania->rodzaj='Wiadomości';
                    $wiadomosc=Wiadomosci::find($powiazania->powiaz_id);
                    $powiazania->pow_tytul=$wiadomosc->tytul;
                    break;
                case 'App\Models\Pliki':
                    $powiazania->rodzaj='Pliki';
                    $plik=Pliki::find($powiazania->powiaz_id);
                    $powiazania->pow_tytul=$plik->opis;
                    break;

                case 'App\Models\Modlitwy':
                    $powiazania->rodzaj='Modlitwy';
                    $modlitwa=Modlitwy::find($powiazania->powiaz_id);
                    $powiazania->pow_tytul=$modlitwa->nazwa;
                    break;
                case 'App\Models\Zasoby':
                    $powiazania->rodzaj='Zasoby';
                    $zasob=Zasoby::find($powiazania->powiaz_id);
                    $powiazania->pow_tytul=$zasob->nazwa;
                    break;
                case 'App\Models\Strony':
                    $powiazania->rodzaj='Strony';
                    $strona=Strony::find($powiazania->powiaz_id);
                    $powiazania->pow_tytul=$strona->tytul;
                    break;
                case 'App\Models\Kalendarium':
                    $powiazania->rodzaj='Kalendarium';
                    $kalendarium=Kalendarium::find($powiazania->powiaz_id);
                    $powiazania->pow_tytul=$kalendarium->tytul;
                    break;
                case 'App\Models\Czywiesz':
                    $powiazania->rodzaj='Czy wiesz, że...';
                    $czywiesz=Czywiesz::find($powiazania->powiaz_id);
                    $powiazania->pow_tytul=$czywiesz->tytul;
                    break;

                case 'App\Models\Artykuly':
                    $powiazania->rodzaj='Artykuły';
                    $artykul=Artykuly::find($powiazania->powiaz_id);
                    $powiazania->pow_tytul=$artykul->tytul;
                    break;
                case 'App\Models\Biografia':
                    $powiazania->rodzaj='Biografia';
                   /* $kalendarium=Biografia::find($powiazania->powiaz_id);
                    $powiazania->pow_tytul=$kalendarium->nazwa;*/
                    break;
                default:
                    return 'Brak pozycji obrazekPowiazania';


            }

            $powiazania->pow_data=Carbon::parse($powiazania->created_at)->format('Y-m-d');
            //$powiazania['liczbaDodan'] = DB::table('zdjecia_powiazania')->where('zdjecia_id', $Wyniki->id)->count();


            return $powiazania;
        });

return $powiazania;
    }

    public static function zdjeciaMozliweDlaPublikacji($dzial, $tresc_id)
    {

        $zdjeciaWszystkie=Zdjecia::all()->sortByDesc('created_at');

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
            case 'Pliki':
                $tresc=Pliki::find($tresc_id);
                break;
            case 'Strony':
                $tresc=Strony::find($tresc_id);
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
        $zdjeciaPublikacji=$tresc->zdjecia()->get();
       // $Wyniki=$zdjeciaWszystkie->diff($zdjeciaPublikacji);

       // dd($zdjeciaWszystkie);

       // dd($zdjeciaWszystkie->diff($zdjeciaPublikacji));

        return $zdjeciaWszystkie->diff($zdjeciaPublikacji);
    }

    public static function zdjeciaMozliweDlaPublikacjiZeZbioru($zbiorZdjec, $dzial, $tresc_id)
    {

        $zdjeciaMozliweDlaPublikacjiZeZbioru=$zbiorZdjec->sortByDesc('created_at');


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
            case 'Pliki':
                $tresc=Pliki::find($tresc_id);
                break;
            case 'Strony':
                $tresc=Strony::find($tresc_id);
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
        $zdjeciaPublikacji=$tresc->zdjecia()->get();
          return $zdjeciaMozliweDlaPublikacjiZeZbioru->diff($zdjeciaPublikacji);
    }

    // funkvja do zmiany wyświetlanej nazy kategorii z faktycznej na "ludzką"

    public static function ludzkaKategoria($kategoriaTabela)
    {
        switch ($kategoriaTabela) {

            case '1938_powrot':
                $kategoria = '1938 powrót relikwii';
                break;
            case 'Gazeta':
                $kategoria = 'Gazeta';
                break;
            case 'Dokument':
                $kategoria = 'Dokument';
                break;
            case 'Ilustracja':
                $kategoria = 'Ilustracja';
                break;
            case 'Informacja':
                $kategoria = 'Informacja';
                break;
            case 'Kanonizacja_beatyfikacja':
                $kategoria = 'Kanonizacja - beatyfikacja';
                break;
            case 'Meczenstwo':
                $kategoria = 'Męczeństwo';
                break;
            case 'Male_obrazki':
                $kategoria = 'Małe obrazki';
                break;
            case 'Miejsca_kultu':
                $kategoria = 'Miejsca kultu';
                break;
            case 'Modlitwa':
                $kategoria = 'Modlitwa';
                break;
            case 'Muzeum':
                $kategoria = 'Muzeum';
                break;
            case 'Portret':
                $kategoria = 'Portret/Podobizna';
                break;
            case 'Publikacja':
                $kategoria = 'Publikacja';
                break;
            case 'Rakowiecka':
                $kategoria = 'Rakowiecka';
                break;
            case 'Strachocina':
                $kategoria = 'Strachocina';
                break;

            case 'Wydarzenie':
                $kategoria = 'Wydarzenie';
                break;
            case 'Zycie_AB':
                $kategoria = 'Życie Andrzeja Boboli';
                break;
            case 'Inne':
                $kategoria = 'Inne';
                break;

            default:
                $kategoria = 'Portret';
        }
return $kategoria;
    }
}
