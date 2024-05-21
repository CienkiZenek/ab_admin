<?php

namespace App\Http\Controllers;


use App\Models\Pliki;
use App\Models\Watki;
use App\Models\Modlitwy;
use App\Models\Zasoby;
use App\Models\Filmy;
use App\Models\Wiadomosci;
use App\Models\Biografia;
use App\Models\Artykuly;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class WatkiController extends Controller
{


    protected function validator($data)
    {
        $walidated = Validator::make($data, [
            'tytul' => 'required|min:5'
        ])->validate();
        return $walidated;
    }

    public function index()
    {
        $Wyniki=Watki::orderBy('tytul', 'asc')->paginate(40);
        return view('tresc.listy.watki-lista', compact('Wyniki'));

    }


    public function nowy()
    {
        $listaRoutName='watkiLista';
        $nazwaListy='Lista wątków';
        return view('tresc.dodawanie.watki-dodawanie',['nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName]);
    }

    public function create(Request $request)
    {
                $data = $this->validator($request->all());

        Watki::create($data);
        session()->flash('komunikat', "Nowy wątek został dodany");
        return redirect()->route('watkiLista');
    }

    public function szukaj(Request $request)
    {

       $szukane=$request->get('szukane');
       $Wyniki=Watki::where('tytul', 'like', "%$szukane%")->paginate(20);
       $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.watki-lista', compact('Wyniki'));
    }


    public function edit($slug)
    {
        $watek = Watki::whereSlug($slug)->firstOrFail();
        $listaRoutName='watkiLista';
        $nazwaListy='Lista wątków';
        return view('tresc.edycja.watki-edycja', ['watek'=>$watek,
        'nazwaListy'=>$nazwaListy,
                'listaRoutName'=>$listaRoutName
        ]);
    }

    public function update(Request $request, $id)
    {
        $watek = Watki::findOrFail($id);
        $data = $this->validator($request->all());
       $watek->update($data);
        session()->flash('komunikat', "Wątek został zaktualizowany!");
        return redirect()->route('watkiLista');
    }

    public function destroy($id)
    {
        $watek = Watki::findOrFail($id)->delete();
        session()->flash('komunikat', "Wątek został usunięty!");
        return redirect()->route('watkiLista');
    }

    public function polaczWatek(Request $request){

        //dd($request->dzial);
        $watki=Watki::orderBy('tytul', 'asc')->get();
        $pliki=Pliki::orderBy('opis', 'asc')->get();

              switch ($request->dzial){

            case 'Wiadomosci':
                $wiadomosc = Wiadomosci::findOrFail($request->tresc_id);
                $wiadomosc->watki()->attach($request->watek_id);
                $listaRoutName='wiadomosciLista';
                $nazwaListy='Lista wiadomości';
                $galeria=$wiadomosc->galeria;
                return view('tresc.edycja.wiadomosci-edycja', ['wiadomosc'=>$wiadomosc,
                    'watki'=>$watki,
                    'pliki'=>$pliki,
                    'galeria'=>$galeria,
                    'nazwaListy'=>$nazwaListy,
                    'listaRoutName'=>$listaRoutName,
                    'watkiZmiana'=>'Tak'
                ]);
                break;
                  case 'Modlitwy':
                      $modlitwa = Modlitwy::findOrFail($request->tresc_id);
                      $modlitwa->watki()->attach($request->watek_id);
                      $listaRoutName='modlitwyLista';
                      $nazwaListy='Lista modlitw';
                      return view('tresc.edycja.modlitwy-edycja', ['modlitwa'=>$modlitwa,
                          'nazwaListy'=>$nazwaListy,
                          'listaRoutName'=>$listaRoutName,
                          'watkiZmiana'=>'Tak'
                      ]);

                      break;
                  case 'Zasoby':
                      $zasob = Zasoby::findOrFail($request->tresc_id);
                      $zasob->watki()->attach($request->watek_id);
                      $listaRoutName='zasobyLista';
                      $nazwaListy='"Zdjęcia, dokumenty, książki" - lista';
                      return view('tresc.edycja.zasoby-edycja', ['zasob'=>$zasob,
                          'nazwaListy'=>$nazwaListy,
                          'listaRoutName'=>$listaRoutName,
                          'watkiZmiana'=>'Tak'
                      ]);

                      break;
                  case 'Filmy':
                     // dd($request);
                      $film = Filmy::findOrFail($request->tresc_id);
                      $film->watki()->attach($request->watek_id);
                      $listaRoutName='filmyLista';
                      $nazwaListy='Lista filmów';
                      return view('tresc.edycja.filmy-edycja', ['film'=>$film,
                          'nazwaListy'=>$nazwaListy,
                          'listaRoutName'=>$listaRoutName,
                          'watkiZmiana'=>'Tak'
                      ]);
                      break;

                  case 'Artykuly':
                      //dd($request->dzial);
                      $artykul = Artykuly::findOrFail($request->tresc_id);
                      $artykul->watki()->attach($request->watek_id);
                      $listaRoutName='artykulyLista';
                      $nazwaListy='Lista artykułów';
                      $galeria=$artykul->galeria;
                      return view('tresc.edycja.artykuly-edycja', ['artykul'=>$artykul,
                          /*'watki'=>$watki,
                          'pliki'=>$pliki,
                          'galeria'=>$galeria,*/
                          'nazwaListy'=>$nazwaListy,
                          'listaRoutName'=>$listaRoutName,
                          'watkiZmiana'=>'Tak'
                      ]);

                      break;

                  case 'Biografia':

                      break;
        }

    }
    public function odlaczWatek(Request $request){

        $watki=Watki::orderBy('tytul', 'asc')->get();
        $pliki=Pliki::orderBy('opis', 'asc')->get();
        switch ($request->dzial){

            case 'Wiadomosci':
                $wiadomosc = Wiadomosci::findOrFail($request->tresc_id);
                //dd($request->watek_id);
                $wiadomosc->watki()->detach($request->watek_id);
                $listaRoutName='wiadomosciLista';
                $nazwaListy='Lista wiadomości';
                return view('tresc.edycja.wiadomosci-edycja', ['wiadomosc'=>$wiadomosc,
                    'watki'=>$watki,
                    'pliki'=>$pliki,
                    'nazwaListy'=>$nazwaListy,
                    'listaRoutName'=>$listaRoutName,
                    'watkiZmiana'=>'Tak'
                ]);
                break;
            case 'Modlitwy':
                $modlitwa = Modlitwy::findOrFail($request->tresc_id);
                $modlitwa->watki()->detach($request->watek_id);
                $listaRoutName='modlitwyLista';
                $nazwaListy='Lista modlitw';
                return view('tresc.edycja.modlitwy-edycja', ['modlitwa'=>$modlitwa,
                    'nazwaListy'=>$nazwaListy,
                    'listaRoutName'=>$listaRoutName,
                    'watkiZmiana'=>'Tak'
                ]);

                break;
            case 'Zasoby':
                $zasob = Zasoby::findOrFail($request->tresc_id);
                $zasob->watki()->detach($request->watek_id);
                $listaRoutName='zasobyLista';
                $nazwaListy='"Zdjęcia, dokumenty, książki" - lista';
                return view('tresc.edycja.zasoby-edycja', ['zasob'=>$zasob,
                    'nazwaListy'=>$nazwaListy,
                    'listaRoutName'=>$listaRoutName,
                    'watkiZmiana'=>'Tak'
                ]);

                break;
            case 'Filmy':
                $film = Filmy::findOrFail($request->tresc_id);
                $film->watki()->detach($request->watek_id);
                $listaRoutName='filmyLista';
                $nazwaListy='Lista filmów';
                return view('tresc.edycja.filmy-edycja', ['film'=>$film,
                    'nazwaListy'=>$nazwaListy,
                    'listaRoutName'=>$listaRoutName,
                    'watkiZmiana'=>'Tak'
                ]);
                break;



            case 'Artykuly':
//dd($request->dzial);
                $artykul = Artykuly::findOrFail($request->tresc_id);
                $artykul->watki()->detach($request->watek_id);
                $listaRoutName='artykulyLista';
                $nazwaListy='Lista artykułów';
                $galeria=$artykul->galeria;
                return view('tresc.edycja.artykuly-edycja', ['artykul'=>$artykul,
                    /*'watki'=>$watki,
                    'pliki'=>$pliki,
                    'galeria'=>$galeria,*/
                    'nazwaListy'=>$nazwaListy,
                    'listaRoutName'=>$listaRoutName,
                    'watkiZmiana'=>'Tak'
                ]);
                break;

            case 'Biografia':

                break;
        }
    }

}
