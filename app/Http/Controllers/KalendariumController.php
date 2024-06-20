<?php

namespace App\Http\Controllers;

use App\Models\Kalendarium;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class KalendariumController extends Controller
{
    protected function validator($data)
    {
        $walidated = Validator::make($data, [
             'tytul' => 'required|min:10',
            'data' => 'required|date',
             'status' => 'required',
             'naglowek' => 'nullable',
             'tresc' => 'nullable',
             'wiecej' => 'nullable',
            'title' => 'nullable',
            'keywords' => 'nullable',
            'description' => 'nullable'

        ])->validate();
        return $walidated;
    }
    protected function validatorUpdate($data)
    {
        $walidated = Validator::make($data, [
            'tytul' => 'required|min:10',
            'data' => 'required|date',
            'status' => 'required',
            'naglowek' => 'nullable',
            'tresc' => 'nullable',
            'wiecej' => 'nullable',
            'title' => 'nullable',
            'keywords' => 'nullable',
            'description' => 'nullable'

        ])->validate();
        return $walidated;
    }

    public function index()
    {
        $Wyniki=Kalendarium::orderBy('data', 'asc')->paginate(40);
        return view('tresc.listy.kalendarium-lista', compact('Wyniki'));

    }
    /*
     * ->groupBy('mies')
     * public function index()
    {
        $Wyniki=Kalendarium::orderBy('data', 'asc')->paginate(20);
        return view('tresc.listy.kalendarium-lista', compact('Wyniki'));

    }*/

    public function pokazMiesiac(Request $request)
    {
        $mies=$request->get('mies');
        /*dd($mies);*/
        $Wyniki=Kalendarium::where('mies', $mies)->orderBy('data', 'asc')->paginate(30);
        return view('tresc.listy.kalendarium-lista', compact('Wyniki'));

    }
/*
 * $Wyniki=Kalendarium::orderBy('data', 'asc')->paginate(20);
        return view('tresc.listy.kalendarium-lista', compact('Wyniki'));
 * */

    public function nowy()
    {
        $listaRoutName='kalendariumLista';
        $nazwaListy=' Kalendarium - lista pozycji';
        return view('tresc.dodawanie.kalendarium-dodawanie',['nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName]);
    }

    public function create(Request $request)
    {
        $data = $this->validator($request->all());

        Kalendarium::create($data);
        session()->flash('komunikat', "Nowy wpis w kalendarium został dodany");
        return redirect()->route('kalendariumLista');
    }

    public function szukaj(Request $request)
    {

        $szukane=$request->get('szukane');
        $Wyniki=Kalendarium::where('tytul', 'like', "%$szukane%")
            ->OrWhere('data', 'like', "%$szukane%")
            ->OrWhere('naglowek', 'like', "%$szukane%")
            ->OrWhere('tresc', 'like', "%$szukane%")
            ->OrWhere('mies_tekst', 'like', "%$szukane%")
            ->OrWhere('dzien', 'like', "%$szukane%")
            ->paginate(30);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.kalendarium-lista', compact('Wyniki'));
    }



    public function edit($id)
    {
        $kalendarium = Kalendarium::findOrFail($id);
        $listaRoutName='kalendariumLista';
        $nazwaListy=' Kalendarium - lista pozycji';
        return view('tresc.edycja.kalendarium-edycja', ['kalendarium'=>$kalendarium,
            'nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName
        ]);
    }

    public function update(Request $request, $id)
    {
        $kalendarium = Kalendarium::findOrFail($id);
        $data = $this->validatorUpdate($request->all());
        $kalendarium->update($data);
        session()->flash('komunikat', "Kalendarium zostało zaktualizowane");
        return redirect()->route('kalendariumLista');
    }

    public function destroy($id)
    {
        $modlitwa = Kalendarium::findOrFail($id)->delete();
        session()->flash('komunikat', "Kalendarium zostało usunięte!");
        return redirect()->route('kalendariumLista');
    }
}
