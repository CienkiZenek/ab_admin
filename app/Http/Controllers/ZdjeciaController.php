<?php

namespace App\Http\Controllers;

use App\Models\Pliki;
use App\Models\Watki;
use App\Models\Wiadomosci;
use App\Models\Zdjecia;
use App\Models\Modlitwy;
use App\Models\Zasoby;
use App\Models\Strony;
use App\Models\Kalendarium;
use App\Models\Czywiesz;
use App\Models\Biografia;
use App\Models\Artykuly;
use App\Services\ObrazkiDodawanie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ZdjeciaController extends Controller
{



    protected function validator($data)
    {
        $walidated = Validator::make($data, [
            'plik' => 'required|image|max:4096',
            'plik_duze'=>'nullable',
            'duze'=>'nullable',
            'kategoria'=>'nullable',
            'autor'=>'nullable',
            'opis'=>'nullable'
        ])->validate();
        return $walidated;
    }

    protected function validatorBezZdjecia($data)
    {
        $walidated = Validator::make($data, [
            'plik' =>'nullable',
            'plik_duze'=>'nullable',
            'duze'=>'nullable',
            'kategoria'=>'nullable',
            'autor'=>'nullable',
            'opis'=>'nullable'
        ])->validate();
        return $walidated;
    }

    public function indexDodane()
    {
        $Wyniki=Zdjecia::orderBy('created_at', 'desc')->paginate(50);
        $Wyniki->map(function ($Wyniki) {
            $Wyniki->liczbaDodan = DB::table('zdjecia_powiazania')->where('zdjecia_id', $Wyniki->id)->count();
                return $Wyniki;
            });
        return view('tresc.listy.zdjecia-lista', ['Wyniki'=>$Wyniki,
                'dodawanie'=>'nie',
                'rodzaj'=>'',
                'tryb'=>''
                ]

            );
    }

    public function indexKategoria(Request $request)
    {

        if($request->kategoria=='wszystkie') {
            $Wyniki=Zdjecia::orderBy('created_at', 'desc')->paginate(0);
            $Wyniki->map(function ($Wyniki) {
                $Wyniki->liczbaDodan = DB::table('zdjecia_powiazania')->where('zdjecia_id', $Wyniki->id)->count();
                return $Wyniki;
            });
            return view('tresc.listy.zdjecia-lista', ['Wyniki'=>$Wyniki,
                    'dodawanie'=>'nie',
                    'kategoria'=>$request->kategoria,
                ]
            );
        }
        $Wyniki=Zdjecia::where('kategoria',$request->kategoria)->orderBy('created_at', 'asc')->paginate(0);
        $Wyniki->map(function ($Wyniki) {
            $Wyniki->liczbaDodan = DB::table('zdjecia_powiazania')->where('zdjecia_id', $Wyniki->id)->count();
            return $Wyniki;
        });
        return view('tresc.listy.zdjecia-lista', ['Wyniki'=>$Wyniki,
            'dodawanie'=>'nie',
                'kategoria'=>$request->kategoria]
        );

    }


    public function indexKategoriaDodawanie(Request $request)
    {
       // dd($request->rodzaj);

        if($request->kategoria=='wszystkie') {
            $Wyniki=Zdjecia::orderBy('created_at', 'desc')->paginate(0);
            $Wyniki->map(function ($Wyniki) {
                $Wyniki->liczbaDodan = DB::table('zdjecia_powiazania')->where('zdjecia_id', $Wyniki->id)->count();
                return $Wyniki;
            });
            return view('tresc.listy.zdjecia-lista', ['Wyniki'=>$Wyniki,
                    'dodawanie'=>'tak',
                    'dzial'=>$request->dzial,
                    'tresc_id'=>$request->tresc_id,
                    'kategoria'=>$request->kategoria,
                    'rodzaj'=>$request->rodzaj,
                    'tryb'=>$request->tryb
                ]
            );
        }
        else {
            $Wyniki = Zdjecia::where('kategoria', $request->kategoria)->orderBy('created_at', 'asc')->paginate(0);
            $Wyniki->map(function ($Wyniki) {
                $Wyniki->liczbaDodan = DB::table('zdjecia_powiazania')->where('zdjecia_id', $Wyniki->id)->count();
                return $Wyniki;
            });
            return view('tresc.listy.zdjecia-lista', ['Wyniki' => $Wyniki,
                    'dodawanie' => 'tak',
                    'dzial' => $request->dzial,
                    'tresc_id' => $request->tresc_id,
                    'kategoria' => $request->kategoria,
                    'rodzaj'=>$request->rodzaj,
                    'tryb' => $request->tryb
                ]
            );
        }
    }

    public function nowe()
    {$listaRoutName='zdjeciaListaDodane';
        $nazwaListy='Lista zdjęć';
        return view('tresc.dodawanie.zdjecia-dodawanie',['nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName]);
    }


    public function create(Request $request)
    {
      $data = $this->validator($request->all());
        //$data=$request->all();
       // dd($request->all());
            $path = $request->file('plik')->storeAs(
                'zdjecia', $request->file('plik')->getClientOriginalName()
            );
            $data['plik']=$request->file('plik')->getClientOriginalName();
           /* $data['plik']=$path;*/

        Zdjecia::create($data);
        session()->flash('komunikat', "Nowe zdjęcie zostało dodane");
        return redirect()->route('zdjeciaListaDodane');
    }


    public function edit($id)
    {
        $zdjecie=Zdjecia::findOrFail($id);
        $zdjecie->liczbaDodan = DB::table('zdjecia_powiazania')->where('zdjecia_id', $zdjecie->id)->count();
        $listaRoutName='zdjeciaListaDodane';
        $nazwaListy='Lista zdjęć';
        return view('tresc.edycja.zdjecia-edycja', ['zdjecie'=>$zdjecie,
                'nazwaListy'=>$nazwaListy,
                'listaRoutName'=>$listaRoutName
            ]
        );
    }


    public function update(Request $request, $id)
    {
        $zdjecie=Zdjecia::findOrFail($id);
        $stareZdjecie=$zdjecie->plik;
       // dd($stareZdjecie);

        $data = $this->validatorBezZdjecia($request->all());
       // dd($data['plik']);
        //$data =$request->all();

        $listaRoutName='zdjeciaListaDodane';
        $nazwaListy='Lista zdjęć';

        if(isset($data['plik'])) {
            // usuwanie starego zdjęcia

            Storage::delete('zdjecia/'.$stareZdjecie);
            $path = $request->file('plik')->storeAs(
                'zdjecia', $request->file('plik')->getClientOriginalName()
            );
            $data['plik'] = $request->file('plik')->getClientOriginalName();
            /*$data['plik'] = $path;*/
        }

        $zdjecie->update($data);
        session()->flash('komunikat', "Zdjęcie zostało zaktualizowane!");
        return view('tresc.edycja.zdjecia-edycja', ['zdjecie'=>$zdjecie,
                'nazwaListy'=>$nazwaListy,
                'listaRoutName'=>$listaRoutName
            ]
        );
    }

    public function zdjecieDuzeZapis(Request $request, $id)
    {
        $zdjecie=Zdjecia::findOrFail($id);
        $stareDuzeZdjecie=$zdjecie->plik_duze;
        //dd($stareDuzeZdjecie);
        $data =$request->all();
        $listaRoutName='zdjeciaListaDodane';
        $nazwaListy='Lista zdjęć';

        if(isset($data['plik_duze'])) {
            // usuwanie starego zdjęcia

            if(Str::length($stareDuzeZdjecie)>4){
            Storage::delete('zdjecia/'.$stareDuzeZdjecie);
            }
            $path = $request->file('plik_duze')->storeAs(
                'zdjecia', $request->file('plik_duze')->getClientOriginalName()
            );
            //dd($path);
            $data['duze'] = 'tak';
           $data['plik_duze'] = $request->file('plik_duze')->getClientOriginalName();
           /*$data['plik_duze'] = $path;*/

        }

        $zdjecie->update($data);
        session()->flash('komunikat', "Duże zdjęcie zostało dodane/zaktualizowane!");
        return view('tresc.edycja.zdjecia-edycja', ['zdjecie'=>$zdjecie,
                'nazwaListy'=>$nazwaListy,
                'listaRoutName'=>$listaRoutName
            ]
        );

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $zdjecie = Zdjecia::findOrFail($id);
        Storage::delete('zdjecia/'.$zdjecie->plik);
        // usuwanie również dużego zdjęcia - gdy jest
        if(Str::length('zdjecia/'.$zdjecie->plik_duze)>4){
            Storage::delete('zdjecia/'.$zdjecie->plik_duze);
        }
        $zdjecie->delete();

        session()->flash('komunikat', "Zdjecie zostało usunięte");
        return redirect()->route('zdjeciaListaDodane');





    }

    // Dodawanie zdjęć. Funkcja wywołuje z widoku wiadomości/artykulu/bio itp -> lista zdjęć do dodania
    //pojawia się po wybraniu przycisku "dodaj zdjęcie" w "Wiadomosci", "Artykule" itp

    public function zdjeciaDodajDo(Request $request)
    {
//dd($request->dzial);
        $dzial=$request->dzial;
        $rodzaj=$request->rodzaj;
        $tresc_id=$request->tresc_id;
        $tryb=$request->tryb;

        // wyszukanie zdjęć dodanych, do tego działu (artykuł, wiadomośc itp...)
        // od kolekcji wszsytich zdjęc odjąc kolekcję zdjęć dla danej waidomości i tylko ją wyświatlać
      // zdjęcia do tej publikacji:

        //TODO pozostałe przypadki
        /*$wiadomosc=Wiadomosci::find($request->tresc_id);
        $zdjeciaPublikacji=$wiadomosc->zdjecia()->get();

 $zdjeciaWszystkie=Zdjecia::all();
        $Wyniki=$zdjeciaWszystkie->diff($zdjeciaPublikacji);*/

        $Wyniki= ObrazkiDodawanie::zdjeciaMozliweDlaPublikacji($dzial,$tresc_id);
        if($Wyniki->isNotEmpty()){
        $Wyniki=$Wyniki->toQuery()->paginate(0);

        return view('tresc.listy.zdjecia-lista', ['Wyniki'=>$Wyniki,
            'dzial'=>$dzial,
            'tresc_id'=>$tresc_id,
            'rodzaj'=>$rodzaj,
            'dodawanie'=>'tak',
            'tryb'=>$tryb
            ]);
        }

        $infoSystemowe="Brak zdjęć do dodania!";
        return view('dodatki.informacjeSystemowe', ['infoSystemowe'=>$infoSystemowe]);
    }

    /*np:
     * dzial" => "wiadomosci"
     * tresc
     * tresc_id" => "3" // id wiadomości
     * "rodzaj" => "Zdjecie2"
     * "zdjecie_id" => "1" // id wybranego zdjęcia
     * */
    public function zdjecieDodaj(Request $request)
    {

//$ObrazkiDodawanie = new ObrazkiDodawanie();

        // usuwamy powiązania z tabeli pośredniej - >zmiana zdjęcia
// w zależności do czego załączamy zdjęcia zapisujemy powiązanie do tabeli posredniej "zdjecia_powiazania
        // potem zapisujemy plik zdjecia w tabeli odpwiedniego działu - wiadomosći, artykulu itp
        // na końcu wracamy do widoku edycji dzialu

        $plikZdjecia=Zdjecia::find($request->zdjecie_id)->plik;
        $zdjecie=Zdjecia::find($request->zdjecie_id);
       /* $pliki=Pliki::orderBy('opis', 'asc')->get();*/

switch ($request->dzial)
{
    case 'Wiadomosci':
        $watki=Watki::orderBy('tytul', 'asc')->get();
       $wiadomosc=Wiadomosci::find($request->tresc_id);

        ObrazkiDodawanie::obrazekDodaj($wiadomosc, $request->rodzaj, $plikZdjecia, $zdjecie->id, $request->tryb);

        $galeria=$wiadomosc->galeria;
        $listaRoutName='wiadomosciLista';
        $nazwaListy='Lista wiadomości';
        return view('tresc.edycja.wiadomosci-edycja', ['wiadomosc'=>$wiadomosc,
            'watki'=>$watki,
            'galeria'=>$galeria,
            'zdjeciaZmiana'=>'Tak',
            'nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName
        ]);

        break;

    case 'Modlitwy':
        $modlitwa=Modlitwy::find($request->tresc_id);
        ObrazkiDodawanie::obrazekDodaj($modlitwa, $request->rodzaj, $plikZdjecia, $zdjecie->id, $request->tryb);
        $listaRoutName='modlitwyLista';
        $nazwaListy='Lista modlitw';
        return view('tresc.edycja.modlitwy-edycja', ['modlitwa'=>$modlitwa,
            'nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName,
            'zdjeciaZmiana'=>'Tak'
        ]);
        break;
    case 'Pliki':
        $plik = Pliki::findOrFail($request->tresc_id);
        ObrazkiDodawanie::obrazekDodaj($plik, $request->rodzaj, $plikZdjecia, $zdjecie->id, $request->tryb);
        $plik->liczbaDodan = DB::table('pliki_powiazania')->where('pliki_id', $plik->id)->count();
        $listaRoutName='plikiLista';
        $nazwaListy='Lista plików';
        return view('tresc.edycja.pliki-edycja', ['plik'=>$plik,
            'nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName,
            'zdjeciaZmiana'=>'Tak'
        ]);
        break;
    case 'Zasoby':
        $zasob = Zasoby::findOrFail($request->tresc_id);
        ObrazkiDodawanie::obrazekDodaj($zasob, $request->rodzaj, $plikZdjecia, $zdjecie->id, $request->tryb);
        $listaRoutName='zasobyLista';
        $nazwaListy='Lista zasobów';
        $galeria=$zasob->galeria;
        return view('tresc.edycja.zasoby-edycja', ['zasob'=>$zasob,
            'nazwaListy'=>$nazwaListy,
            'galeria'=>$galeria,
            'listaRoutName'=>$listaRoutName,
            'zdjeciaZmiana'=>'Tak'
        ]);
        break;
    case 'Strony':
        $strona = Strony::findOrFail($request->tresc_id);
        ObrazkiDodawanie::obrazekDodaj($strona, $request->rodzaj, $plikZdjecia, $zdjecie->id, $request->tryb);
        $listaRoutName='stronyLista';
        $nazwaListy='Lista stron internetowych';
        return view('tresc.edycja.strony-edycja', ['strona'=>$strona,
            'nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName,
            'zdjeciaZmiana'=>'Tak'
        ]);
        break;
    case 'Kalendarium':
        $kalendarium = Kalendarium::findOrFail($request->tresc_id);
        ObrazkiDodawanie::obrazekDodaj($kalendarium, $request->rodzaj, $plikZdjecia, $zdjecie->id, $request->tryb);
        $listaRoutName='kalendariumLista';
        $nazwaListy=' Kalendarium - lista pozycji';
        return view('tresc.edycja.kalendarium-edycja', ['kalendarium'=>$kalendarium,
            'nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName,
            'zdjeciaZmiana'=>'Tak'
        ]);
        break;
    case 'Czywiesz':
        $czywiesz = Czywiesz::findOrFail($request->tresc_id);
        ObrazkiDodawanie::obrazekDodaj($czywiesz, $request->rodzaj, $plikZdjecia, $zdjecie->id, $request->tryb);
        $listaRoutName='czywieszLista';
        $nazwaListy='Lista "Czy wiesz"';
        return view('tresc.edycja.czywiesz-edycja', ['czywiesz'=>$czywiesz,
            'nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName,
            'zdjeciaZmiana'=>'Tak'
        ]);
        break;
    case 'Artykuly':
        $watki=Watki::orderBy('tytul', 'asc')->get();
        $artykul=Artykuly::find($request->tresc_id);

        ObrazkiDodawanie::obrazekDodaj($artykul, $request->rodzaj, $plikZdjecia, $zdjecie->id, $request->tryb);

        $galeria=$artykul->galeria;
        $listaRoutName='artykulyLista';
        $nazwaListy='Lista Artykułów';
        return view('tresc.edycja.artykuly-edycja', ['artykul'=>$artykul,
           /* 'watki'=>$watki,
            'galeria'=>$galeria,*/
            'zdjeciaZmiana'=>'Tak',
            'nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName
        ]);

        break;

    case 'Biografia':

        /* */

        break;

    default:
        return 'Brak pozycji zdjecieDodaj';


}
//dd($request);

    }

    public function szukaj(Request $request)
    {
        $szukane=$request->get('szukane');
        $Wyniki=Zdjecia::where('opis', 'like', "%$szukane%")
            ->orWhere('plik', 'like', "%$szukane%")
            ->orWhere('kategoria', 'like', "%$szukane%")
            ->paginate(50);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.zdjecia-lista', ['Wyniki'=>$Wyniki,
            'dodawanie'=>'nie'
        ]);
    }

    public function szukajDodawanie(Request $request)
    {
        $szukane=$request->get('szukane');
        $Wyniki=Zdjecia::where('opis', 'like', "%$szukane%")
            ->orWhere('plik', 'like', "%$szukane%")
            ->paginate(50);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.zdjecia-lista', ['Wyniki'=>$Wyniki,
            'dodawanie'=>'tak',
            'dzial'=>$request->dzial,
            'tresc_id'=>$request->tresc_id,
            'rodzaj'=>$request->rodzaj,
            'tryb'=>$request->tryb
        ]);
    }

}
