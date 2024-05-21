<?php

namespace App\Http\Controllers;

use App\Models\Pliki;
use App\Models\Watki;
use App\Models\Wiadomosci;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WiadomosciController extends Controller
{
    protected function validator($data)
    {
        $walidated = Validator::make($data, [
            'tytul' => 'required|min:10|max:210|unique:wiadomosci',
            'naglowek'=>'nullable',
            'data'=>'nullable',
            'rodzaj'=>'nullable',
            'autor'=>'nullable',
            'tresc'=>'nullable',
            'status'=>'nullable',
            'strona_glowna'=>'nullable',
            'przyklejona'=>'nullable',
            'link_tresc'=>'nullable',
            'link_url'=>'nullable',
            'zdjecie1'=>'nullable|image|max:4096',
            'zdjecie2'=>'nullable|image|max:4096',
            'zdjecie1_podpis'=>'nullable',
            'zdjecie2_podpis'=>'nullable',
            'zdjecie1_id'=>'nullable',
            'zdjecie2_id'=>'nullable',
            'ramka1'=>'nullable',
            'ramka2'=>'nullable',
            'komentarz'=>'nullable',
            'film'=>'nullable',
            'film_podpis'=>'nullable',
            'title' => 'nullable',
            'keywords' => 'nullable',
            'description' => 'nullable'

        ])->validate();
        return $walidated;
    }
    protected function validatorUpdate($data)
    {
        $walidated = Validator::make($data, [
            'tytul' => 'required|min:6|max:210|',
            'naglowek'=>'nullable',
            'data'=>'nullable',
            'rodzaj'=>'nullable',
            'autor'=>'nullable',
            'zrodlo'=>'nullable',
            'komentarz'=>'nullable',
            'tresc'=>'nullable',
            'status'=>'nullable',
            'strona_glowna'=>'nullable',
            'przyklejona'=>'nullable',
            'link_tresc'=>'nullable',
            'link_url'=>'nullable',
            'link_nofollow'=>'nullable',
            'zdjecie1'=>'nullable|image|max:4096',
            'zdjecie2'=>'nullable|image|max:4096',
            'zdjecie1_podpis'=>'nullable',
            'zdjecie2_podpis'=>'nullable',
            'zdjecie1_id'=>'nullable',
            'zdjecie2_id'=>'nullable',
            'ramka1'=>'nullable',
            'ramka2'=>'nullable',
            'film'=>'nullable',
            'film_podpis'=>'nullable',
            'title' => 'nullable',
            'keywords' => 'nullable',
            'description' => 'nullable'

        ])->validate();
        return $walidated;
    }
/*
 * |unique:wiadomosci
 * */

    public function index()
    {
        $Wyniki=Wiadomosci::orderBy('created_at', 'desc')->paginate(50);
        return view('tresc.listy.wiadomosci-lista', compact('Wyniki'));
    }


    public function nowa()
    {$listaRoutName='wiadomosciLista';
        $nazwaListy='Lista aktualności';
        return view('tresc.dodawanie.wiadomosci-dodawanie', ['nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = $this->validator($request->all());
        Wiadomosci::create($data);
        session()->flash('komunikat', "Nowa wiadomość została dodana");
        return redirect()->route('wiadomosciLista');
    }


    /**
     * Display the specified resource.
     */
    public function szukaj(Request $request)
    {
        $szukane=$request->get('szukane');
        $Wyniki=Wiadomosci::where('tytul', 'like', "%$szukane%")
            ->orWhere('tresc', 'like', "%$szukane%")
            ->orWhere('naglowek', 'like', "%$szukane%")
            ->orWhere('autor', 'like', "%$szukane%")
            ->orWhere('komentarz', 'like', "%$szukane%")
            ->orWhere('ramka1', 'like', "%$szukane%")
            ->orWhere('ramka2', 'like', "%$szukane%")
            ->orWhere('film_podpis', 'like', "%$szukane%")
            ->orWhere('zdjecie1_podpis', 'like', "%$szukane%")
            ->orWhere('zdjecie2_podpis', 'like', "%$szukane%")
            ->paginate(30);

        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.wiadomosci-lista', compact('Wyniki'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $wiadomosc = Wiadomosci::whereSlug($slug)->firstOrFail();
        $listaRoutName='wiadomosciLista';
        $nazwaListy='Lista aktualności';
        return view('tresc.edycja.wiadomosci-edycja', ['wiadomosc'=>$wiadomosc,
            'nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //dd($request->input('action'));
        $wiadomosc = Wiadomosci::findOrFail($id);
        $data = $this->validatorUpdate($request->all());
        $wiadomosc->update($data);
        session()->flash('komunikat', "Wiadomość została zaktualizowana!");

        if($request->input('action')=='zapiszWyjdz'){
        return redirect()->route('wiadomosciLista');}
        else{

            $listaRoutName='wiadomosciLista';
            $nazwaListy='Lista aktualności';
            return view('tresc.edycja.wiadomosci-edycja', ['wiadomosc'=>$wiadomosc,
                'nazwaListy'=>$nazwaListy,
                'listaRoutName'=>$listaRoutName

            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $wiadomosc = Wiadomosci::findOrFail($id);
        $wiadomosc->delete();
        session()->flash('komunikat', "Wiadomość została skasowana");
        return redirect()->route('wiadomosciLista');
    }


}
