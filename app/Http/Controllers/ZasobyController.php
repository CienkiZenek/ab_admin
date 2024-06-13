<?php

namespace App\Http\Controllers;

use App\Models\Zasoby;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ZasobyController extends Controller
{
    protected function validator($data)
    {
        $walidated = Validator::make($data, [
            'nazwa' => 'required|min:10|unique:zasoby',
            'opis' => 'nullable',
            'tresc' => 'nullable',
            'rodzaj' => 'required',
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
    /*zdjecie1_podpis', 'zdjecie2_podpis', 'zdjecie1_id', 'zdjecie2_id*/
    protected function validatorUpdate($data)
    {
        $walidated = Validator::make($data, [
            'nazwa' => 'required|min:10',
            'opis' => 'nullable',
            'tresc' => 'nullable',
            'rodzaj' => 'required',
            'strona_glowna' => 'nullable',
            'zdjecie_karuzela' => 'nullable',
            'zdjecie_karuzela_podpis' => 'nullable',
            'zdjecie_karuzela_id' => 'nullable',
            'galeria_nazwa' => 'nullable',
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
        $Wyniki=Zasoby::orderBy('created_at', 'desc')->paginate(40);
        return view('tresc.listy.zasoby-lista', compact('Wyniki'));

    }


    public function nowy()
    {
        $listaRoutName='zasobyLista';
        $nazwaListy='"Zdjęcia, dokumenty, książki" - lista';
        return view('tresc.dodawanie.zasoby-dodawanie',['nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName]);
    }

    public function create(Request $request)
    {
        $data = $this->validator($request->all());

        Zasoby::create($data);
        session()->flash('komunikat', 'Nowy zasób został dodany');
        return redirect()->route('zasobyLista');
    }

    public function szukaj(Request $request)
    {

        $szukane=$request->get('szukane');
        $Wyniki=Zasoby::where('nazwa', 'like', "%$szukane%")
            ->OrWhere('opis', 'like', "%$szukane%")
            ->paginate(20);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.zasoby-lista', compact('Wyniki'));
    }


    public function edit($id)
    {
        $zasob = Zasoby::findOrFail($id);
        $listaRoutName='zasobyLista';
        $nazwaListy='"Zdjęcia, dokumenty, książki" - lista';
        return view('tresc.edycja.zasoby-edycja', ['zasob'=>$zasob,
            'nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName
        ]);
    }

    public function update(Request $request, $id)
    {
        $zasob = Zasoby::findOrFail($id);
        $data = $this->validatorUpdate($request->all());
        $zasob->update($data);
        session()->flash('komunikat', 'Zasób został zaktualizowany');
        return redirect()->route('zasobyLista');
    }

    public function destroy($id)
    {
        $zasob = Zasoby::findOrFail($id)->delete();
        session()->flash('komunikat', 'Zasób został usunięty');
        return redirect()->route('zasobyLista');
    }
}
