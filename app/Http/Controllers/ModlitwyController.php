<?php

namespace App\Http\Controllers;

use App\Models\Modlitwy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModlitwyController extends Controller
{
    protected function validator($data)
    {
        $walidated = Validator::make($data, [
            'nazwa' => 'required|min:10|unique:modlitwy',
            'tresc' => 'nullable',
            'opis' => 'nullable',
            'zrodlo_nazwa' => 'nullable',
            'zrodlo_link' => 'nullable',
            'title' => 'nullable',
            'keywords' => 'nullable',
            'description' => 'nullable'

        ])->validate();
        return $walidated;
    }

    protected function validatorUpdate($data)
    {
        $walidated = Validator::make($data, [
            'nazwa' => 'required|min:10',
            'tresc' => 'nullable',
            'widok' => 'nullable',
            'opis' => 'nullable',
            'strona_glowna' => 'nullable',
            'zdjecie_karuzela' => 'nullable',
            'zdjecie_karuzela_podpis' => 'nullable',
            'zdjecie_karuzela_id' => 'nullable',
            'zrodlo_nazwa' => 'nullable',
            'zrodlo_link' => 'nullable',
            'zdjecie1_podpis' => 'nullable',
            'zdjecie2_podpis' => 'nullable',
            'zdjecie1_id' => 'nullable',
            'zdjecie2_id' => 'nullable',
            'title' => 'nullable',
            'keywords' => 'nullable',
            'description' => 'nullable'

        ])->validate();
        return $walidated;
    }
    public function index()
    {
        $Wyniki=Modlitwy::orderBy('created_at', 'desc')->paginate(40);
        return view('tresc.listy.modlitwy-lista', compact('Wyniki'));

    }


    public function nowy()
    {
        $listaRoutName='modlitwyLista';
        $nazwaListy='Lista modlitw';
        return view('tresc.dodawanie.modlitwy-dodawanie',['nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName]);
    }

    public function create(Request $request)
    {
        $data = $this->validator($request->all());

        Modlitwy::create($data);
        session()->flash('komunikat', "Nowa modlitwa została dodana");
        return redirect()->route('modlitwyLista');
    }

    public function szukaj(Request $request)
    {

        $szukane=$request->get('szukane');
        $Wyniki=Modlitwy::where('nazwa', 'like', "%$szukane%")
            ->OrWhere('tresc', 'like', "%$szukane%")
            ->OrWhere('opis', 'like', "%$szukane%")
            ->OrWhere('zrodlo_nazwa', 'like', "%$szukane%")
            ->OrWhere('zrodlo_link', 'like', "%$szukane%")
            ->paginate(20);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.modlitwy-lista', compact('Wyniki'));
    }


    public function edit($id)
    {
        $modlitwa = Modlitwy::findOrFail($id);
        $listaRoutName='modlitwyLista';
        $nazwaListy='Lista modlitw';
        return view('tresc.edycja.modlitwy-edycja', ['modlitwa'=>$modlitwa,
            'nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName
        ]);
    }

    public function update(Request $request, $id)
    {
        $modlitwa = Modlitwy::findOrFail($id);
        $data = $this->validatorUpdate($request->all());
        $modlitwa->update($data);
        session()->flash('komunikat', "Modlitwa została zaktualizowana");
        return redirect()->route('modlitwyLista');
    }

    public function destroy($id)
    {
        $modlitwa = Modlitwy::findOrFail($id)->delete();
        session()->flash('komunikat', "Modlitwa została usunięta!");
        return redirect()->route('modlitwyLista');
    }

}
