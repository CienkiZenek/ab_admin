<?php

namespace App\Http\Controllers;

use App\Models\Artykuly;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArtykulyController extends Controller
{
    protected function validator($data)
    {
        $walidated = Validator::make($data, [
            'tytul' => 'required|min:10|max:210|unique:artykuly',
            'naglowek'=>'nullable',
            'motto'=>'nullable',
            'motto_podpis'=>'nullable',
            'data'=>'nullable',
            'rodzaj'=>'nullable',
            'autor'=>'nullable',
            'tresc'=>'nullable',
            'spis_tresci'=>'nullable',
            'status'=>'nullable',
            'strona_glowna'=>'nullable',
            'zdjecie_karuzela' => 'nullable',
            'zdjecie_karuzela_podpis' => 'nullable',
            'zdjecie_karuzela_id' => 'nullable',
            'galeria_nazwa' => 'nullable',
            'zdjecie1'=>'nullable',
            'zdjecie2'=>'nullable',
            'zdjecie1_podpis'=>'nullable',
            'zdjecie2_podpis'=>'nullable',
            'zdjecie1_id',
            'zdjecie2_id',
            'ramka1'=>'nullable',
            'ramka2'=>'nullable',
            'komentarz'=>'nullable',
            'cytat1'=>'nullable',
            'cytat2'=>'nullable',
            'cytat3'=>'nullable',
            'cytat4'=>'nullable',
            'title' => 'nullable',
            'keywords' => 'nullable',
            'description' => 'nullable'

        ])->validate();
        return $walidated;
    }
    protected function validatorUpdate($data)
    {
        $walidated = Validator::make($data, [
            'tytul' => 'required|min:10|max:210',
            'naglowek'=>'nullable',
            'motto'=>'nullable',
            'motto_podpis'=>'nullable',
            'data'=>'nullable',
            'rodzaj'=>'nullable',
            'autor'=>'nullable',
            'tresc'=>'nullable',
            'spis_tresci'=>'nullable',
            'status'=>'nullable',
            'strona_glowna'=>'nullable',
            'zdjecie_karuzela' => 'nullable',
            'zdjecie_karuzela_podpis' => 'nullable',
            'zdjecie_karuzela_id' => 'nullable',
            'galeria_nazwa' => 'nullable',
            'zdjecie1_podpis'=>'nullable',
            'zdjecie2_podpis'=>'nullable',
            'zdjecie1_id',
            'zdjecie2_id',
            'ramka1'=>'nullable',
            'ramka2'=>'nullable',
            'komentarz'=>'nullable',
            'cytat1'=>'nullable',
            'cytat2'=>'nullable',
            'cytat3'=>'nullable',
            'cytat4'=>'nullable',
            'title' => 'nullable',
            'keywords' => 'nullable',
            'description' => 'nullable'

        ])->validate();
        return $walidated;
    }
    /*
     * |unique:Artykuly
     * */

    public function index()
    {
        $Wyniki=Artykuly::orderBy('created_at', 'desc')->paginate(30);
        return view('tresc.listy.artykuly-lista', compact('Wyniki'));
    }


    public function nowy()
    {$listaRoutName='artykulyLista';
        $nazwaListy='Lista artykułów';
        return view('tresc.dodawanie.artykuly-dodawanie', ['nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = $this->validator($request->all());
        Artykuly::create($data);
        session()->flash('komunikat', "Nowy artykuł został dodany");
        return redirect()->route('artykulyLista');
    }


    /**
     * Display the specified resource.
     */
    public function szukaj(Request $request)
    {
        $szukane=$request->get('szukane');
        $Wyniki=Artykuly::where('tytul', 'like', "%$szukane%")
            ->orWhere('tresc', 'like', "%$szukane%")
            ->orWhere('naglowek', 'like', "%$szukane%")
            ->orWhere('autor', 'like', "%$szukane%")
            ->orWhere('motto', 'like', "%$szukane%")
            ->orWhere('motto_podpis', 'like', "%$szukane%")
            ->orWhere('ramka1', 'like', "%$szukane%")
            ->orWhere('ramka2', 'like', "%$szukane%")
            ->orWhere('zdjecie1_podpis', 'like', "%$szukane%")
            ->orWhere('zdjecie2_podpis', 'like', "%$szukane%")
            ->paginate(30);

        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.artykuly-lista', compact('Wyniki'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $artykul = Artykuly::whereSlug($slug)->firstOrFail();
        $listaRoutName='artykulyLista';
        $nazwaListy='Lista artykułów';
        return view('tresc.edycja.artykuly-edycja', ['artykul'=>$artykul,
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
        $artykul = Artykuly::findOrFail($id);
        $data = $this->validatorUpdate($request->all());
        $artykul->update($data);
        session()->flash('komunikat', "Artykuł został zaktualizowany!");

        if($request->input('action')=='zapiszWyjdz'){
            return redirect()->route('artykulyLista');}
        else{

            $listaRoutName='artykulyLista';
            $nazwaListy='Lista artykułów';
            return view('tresc.edycja.artykuly-edycja', ['artykul'=>$artykul,
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
        $artykul = Artykuly::findOrFail($id);
        $artykul->delete();
        session()->flash('komunikat', "Artykuł został skasowany");
        return redirect()->route('artykulyLista');
    }

}
