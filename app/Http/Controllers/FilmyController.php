<?php

namespace App\Http\Controllers;

use App\Models\Filmy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FilmyController extends Controller
{

    protected function validator($data)
    {
        $walidated = Validator::make($data, [
            'tytul' => 'required|min:5|unique:filmy',
            'film_kod' => 'required|min:20',
            'rodzaj'=>'nullable',
            'opis' => 'nullable',
            'kanal' => 'nullable',
            'kanal_url' => 'nullable',
            'title' => 'nullable',
            'keywords' => 'nullable',
            'description' => 'nullable'

        ])->validate();
        return $walidated;
    }
    protected function validatorUpdate($data)
    {
        $walidated = Validator::make($data, [
            'tytul' => 'required|min:5',
            'film_kod' => 'required|min:20',
            'rodzaj'=>'nullable',
            'opis' => 'nullable',
            'kanal' => 'nullable',
            'kanal_url' => 'nullable',
            'title' => 'nullable',
            'keywords' => 'nullable',
            'description' => 'nullable'

        ])->validate();
        return $walidated;
    }

    public function index()
    {
        $Wyniki=Filmy::orderBy('created_at', 'desc')->paginate(40);
        return view('tresc.listy.filmy-lista', compact('Wyniki'));

    }


    public function nowy()
    {
        $listaRoutName='filmyLista';
        $nazwaListy='Lista filmów';
        return view('tresc.dodawanie.filmy-dodawanie',['nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName]);
    }

    public function create(Request $request)
    {
        $data = $this->validator($request->all());

        Filmy::create($data);
        session()->flash('komunikat', "Nowy film został dodany");
        return redirect()->route('filmyLista');
    }

    public function szukaj(Request $request)
    {

        $szukane=$request->get('szukane');
        $Wyniki=Filmy::where('tytul', 'like', "%$szukane%")
            ->OrWhere('opis', 'like', "%$szukane%")
            ->paginate(20);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.filmy-lista', compact('Wyniki'));
    }


    public function edit($id)
    {
        $film = Filmy::findOrFail($id);
        $listaRoutName='filmyLista';
        $nazwaListy='Lista filmów';
        return view('tresc.edycja.filmy-edycja', ['film'=>$film,
            'nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName
        ]);
    }

    public function update(Request $request, $id)
    {
        $watek = Filmy::findOrFail($id);
        $data = $this->validatorUpdate($request->all());
        $watek->update($data);
        session()->flash('komunikat', "Film został zaktualizowany!");
        return redirect()->route('filmyLista');
    }

    public function destroy($id)
    {
        $film = Filmy::findOrFail($id)->delete();
        session()->flash('komunikat', "Film został usunięty!");
        return redirect()->route('filmyLista');
    }



}
