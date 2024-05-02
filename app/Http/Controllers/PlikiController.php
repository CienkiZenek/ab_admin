<?php

namespace App\Http\Controllers;

use App\Models\Pliki;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Services\PlikiDodawanie;

class PlikiController extends Controller
{

    protected function validator($data)
    {
        $walidated = Validator::make($data, [
            'plik' => 'required|file',
            'nazwa'=>'required|min:10',
            'typ'=>'nullable',
            'rodzaj'=>'nullable',
            'opis'=>'nullable'


        ])->validate();
        return $walidated;
    }

    protected function validatorBezPliku($data)
    {
        $walidated = Validator::make($data, [
            'typ'=>'nullable',
            'nazwa'=>'required|min:10',
            'rodzaj'=>'nullable',
            'opis'=>'nullable'


        ])->validate();
        return $walidated;
    }

    public function index()
    {

        $Wyniki=Pliki::orderBy('created_at', 'desc')->paginate(40);
        $Wyniki->map(function ($Wyniki) {
            $Wyniki->liczbaDodan = DB::table('pliki_powiazania')->where('pliki_id', $Wyniki->id)->count();
            return $Wyniki;
        });
        return view('tresc.listy.pliki-lista', ['Wyniki'=>$Wyniki,
                'dodawanie'=>'nie'
            ]

        );

    }
    /*['zasob', 'dokument', 'modlitwa','ksiazka', 'skan', 'inny']*/
    public function indexRodzaj(Request $request)
    {
        if($request->rodzaj=='wszystkie')
        {

          /*  $this->index();*/
            $Wyniki=Pliki::orderBy('created_at', 'desc')->paginate(40);
            $Wyniki->map(function ($Wyniki) {
                $Wyniki->liczbaDodan = DB::table('pliki_powiazania')->where('pliki_id', $Wyniki->id)->count();
                return $Wyniki;
            });
            return view('tresc.listy.pliki-lista', ['Wyniki'=>$Wyniki,
                    'dodawanie'=>'nie'
                ]

            );



        }
        else {
        $Wyniki=Pliki::where('rodzaj',$request->rodzaj)->orderBy('created_at', 'asc')->paginate(40);
            $Wyniki->map(function ($Wyniki) {
                $Wyniki->liczbaDodan = DB::table('pliki_powiazania')->where('pliki_id', $Wyniki->id)->count();
                return $Wyniki;
            });
        return view('tresc.listy.pliki-lista', ['Wyniki'=>$Wyniki,
                'dodawanie'=>'nie',
                'rodzaj'=>$request->rodzaj]
        );
        }
    }


    public function indexRodzajDodawanie(Request $request){
        if($request->rodzaj=='wszystkie')
        {

            /*  $this->index();*/
            $Wyniki=Pliki::orderBy('created_at', 'desc')->paginate(40);
            $Wyniki->map(function ($Wyniki) {
                $Wyniki->liczbaDodan = DB::table('pliki_powiazania')->where('pliki_id', $Wyniki->id)->count();
                return $Wyniki;
            });
            return view('tresc.listy.pliki-lista', ['Wyniki'=>$Wyniki,
                    'dodawanie'=>'tak',
                    'dzial'=>$request->dzial,
                    'tresc_id'=>$request->tresc_id,
                    'rodzaj'=>$request->rodzaj,
                    'tryb'=>$request->tryb

                ]

            );



        }
        else {
            $Wyniki=Pliki::where('rodzaj',$request->rodzaj)->orderBy('created_at', 'asc')->paginate(40);
            $Wyniki->map(function ($Wyniki) {
                $Wyniki->liczbaDodan = DB::table('pliki_powiazania')->where('pliki_id', $Wyniki->id)->count();
                return $Wyniki;
            });
            return view('tresc.listy.pliki-lista', ['Wyniki'=>$Wyniki,
                    'dodawanie'=>'tak',
                    'dzial'=>$request->dzial,
                    'tresc_id'=>$request->tresc_id,
                    'rodzaj'=>$request->rodzaj,
                    'tryb'=>$request->tryb
                ]
            );
        }


    }



    public function szukaj(Request $request)
    {

        $szukane=$request->get('szukane');
        $Wyniki=Pliki::where('opis', 'like', "%$szukane%")
            ->orWhere('plik', 'like', "%$szukane%")
            ->orWhere('typ', 'like', "%$szukane%")
            ->orWhere('rodzaj', 'like', "%$szukane%")
            ->paginate(30);

        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.pliki-lista',['Wyniki'=>$Wyniki,
            'dodawanie'=>'nie'
        ]);
    }
    public function szukajDodawanie(Request $request)
    {
        $szukane=$request->get('szukane');
        $Wyniki=Pliki::where('opis', 'like', "%$szukane%")
            ->orWhere('plik', 'like', "%$szukane%")
            ->orWhere('typ', 'like', "%$szukane%")
            ->orWhere('rodzaj', 'like', "%$szukane%")
            ->paginate(10);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.pliki-lista', ['Wyniki'=>$Wyniki,
            'dodawanie'=>'tak',
            'dzial'=>$request->dzial,
            'tresc_id'=>$request->tresc_id,
            'rodzaj'=>$request->rodzaj,
            'tryb'=>$request->tryb
        ]);
    }


    public function nowy()
    {
        $listaRoutName='plikiLista';
        $nazwaListy='Lista plików';
        return view('tresc.dodawanie.pliki-dodawanie',['nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName]);
    }

    public function create(Request $request)
    {
        //dd($request);
       // $data = $this->validator($request->all());
        $data=$request->all();
        //dd($request->all());
        $path = $request->file('plik')->storeAs(
            'pliki', $request->file('plik')->getClientOriginalName()
        );
        $data['plik']=$request->file('plik')->getClientOriginalName();
        /*$data['plik']=$path;*/

        Pliki::create($data);
        session()->flash('komunikat', "Nowe plik został dodany");
        return redirect()->route('plikiLista');
    }


    public function edit($id)
    {
        $plik = Pliki::findOrFail($id);
        $plik->liczbaDodan = DB::table('pliki_powiazania')->where('pliki_id', $plik->id)->count();
        $listaRoutName='plikiLista';
        $nazwaListy='Lista plików';
        return view('tresc.edycja.pliki-edycja', ['plik'=>$plik,
            'nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $plik=Pliki::findOrFail($id);
        $data = $this->validatorBezPliku($request->all());

        //$data =$request->all();

        $listaRoutName='plikiLista';
        $nazwaListy='Lista plików';

        if(isset($data['plik'])) {
            $path = $request->file('plik')->storeAs(
                'pliki', $request->file('plik')->getClientOriginalName()
            );
            $data['plik'] = $request->file('plik')->getClientOriginalName();
            /*$data['plik'] = $path;*/
        }

        $plik->update($data);
        session()->flash('komunikat', "Plik zostało zaktualizowane!");
        /*return view('tresc.edycja.pliki-edycja', ['plik'=>$plik,
                'nazwaListy'=>$nazwaListy,
                'listaRoutName'=>$listaRoutName
            ]
        );*/
        return redirect()->route('plikiLista');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $plik = Pliki::findOrFail($id);
        $plik->delete();
        Storage::delete($plik->plik);
        session()->flash('komunikat', "Plik został usunięty");
        return redirect()->route('plikiLista');
    }


    // Dodawanie plików. Funkcja wywołuje z widoku wiadomości/artykulu/bio itp -> lista plików do dodania
    //pojawia się po wybraniu przycisku "dodaj plik" w "Wiadomosci", "Artykule" itp

    public function plikiDodawanieLista(Request $request)
    {
       // dd($request->tresc_id);
        $dzial=$request->dzial;
      /*  $rodzaj=$request->rodzaj;*/
        $tresc_id=$request->tresc_id;

        // wyszukanie plikow dodanych, do tego działu (artykuł, wiadomośc itp...)
        // od kolekcji wszsytich plikow odjąc kolekcję zdjęć pliki dla danej waidomości i tylko ją wyświatlać
        // zdjęcia do tej publikacji:


        $Wyniki= PlikiDodawanie::plikiMozliweDlaPublikacji($dzial, $tresc_id);

        if($Wyniki->isNotEmpty()){
            $Wyniki=$Wyniki->toQuery()->paginate(20);

            return view('tresc.listy.pliki-lista', ['Wyniki'=>$Wyniki,
                'dzial'=>$dzial,
                'tresc_id'=>$tresc_id,
                'dodawanie'=>'tak'
            ]);
        }

        $infoSystemowe="Brak plików do dodania!";
        return view('dodatki.informacjeSystemowe', ['infoSystemowe'=>$infoSystemowe]);

    }

    /*np:
     * dzial" => "wiadomosci"
     * tresc
     * tresc_id" => "3" // id wiadomości
     * "rodzaj" => "Zdjecie2"
     * "zdjecie_id" => "1" // id wybranego zdjęcia
     * */

    // włściwe dodawanie plików
    public function plikZalaczOdlacz(Request $request){
      return  PlikiDodawanie::plikZalaczOdlacz($request->dzial, $request->tryb, $request->tresc_id, $request->plik_id);

      /*switch ($request->dzial){

            case 'Wiadomosci':
                $watki=Watki::orderBy('tytul', 'asc')->get();
                $pliki=Pliki::orderBy('opis', 'asc')->get();
                $wiadomosc = Wiadomosci::findOrFail($request->tresc_id);

                if($request->tryb=='Zalaczanie'){
                $wiadomosc->pliki()->attach($request->plik_id);
                }
                else {
                    $wiadomosc->pliki()->detach($request->plik_id);
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
                $modlitwa = Modlitwy::findOrFail($request->tresc_id);


                if($request->tryb=='Zalaczanie'){
                    $modlitwa->pliki()->attach($request->plik_id);
                }
                else {
                    $modlitwa->pliki()->detach($request->plik_id);
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

                break;

            case 'Zasoby':

                break;

            case 'Kalendarium':

                break;

        }
*/
    }





}
