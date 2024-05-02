<?php

namespace App\Http\Controllers;

use App\Models\Czywiesz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CzywieszController extends Controller
{

    protected function validator($data)
    {
        $walidated = Validator::make($data, [
            'tytul' => 'required|min:10|unique:czywiesz',
            'tresc' => 'required|min:20',
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
            'tresc' => 'required|min:20',
            'wiecej' => 'nullable',
            'title' => 'nullable',
            'keywords' => 'nullable',
            'description' => 'nullable'

        ])->validate();
        return $walidated;
    }

    public function index()
    {
        $Wyniki=Czywiesz::orderBy('created_at', 'desc')->paginate(10);
        return view('tresc.listy.czywiesz-lista', compact('Wyniki'));

    }


    public function nowy()
    {
        $listaRoutName='czywieszLista';
        $nazwaListy='Lista "Czy wiesz"';
        return view('tresc.dodawanie.czywiesz-dodawanie',['nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName]);
    }

    public function create(Request $request)
    {
        $data = $this->validator($request->all());

        Czywiesz::create($data);
        session()->flash('komunikat', 'Nowe "Czy wiesz" zostało dodane');
        return redirect()->route('czywieszLista');
    }

    public function szukaj(Request $request)
    {

        $szukane=$request->get('szukane');
        $Wyniki=Czywiesz::where('tytul', 'like', "%$szukane%")
            ->OrWhere('tresc', 'like', "%$szukane%")
            ->paginate(10);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.czywiesz-lista', compact('Wyniki'));
    }


    public function edit($id)
    {
        $czywiesz = Czywiesz::findOrFail($id);
        $listaRoutName='czywieszLista';
        $nazwaListy='Lista "Czy wiesz"';
        return view('tresc.edycja.czywiesz-edycja', ['czywiesz'=>$czywiesz,
            'nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName
        ]);
    }

    public function update(Request $request, $id)
    {
        $strona = Czywiesz::findOrFail($id);
        $data = $this->validatorUpdate($request->all());
        $strona->update($data);
        session()->flash('komunikat', '"Czy wiesz" zostało zaktualizowane');
        return redirect()->route('czywieszLista');
    }

    public function destroy($id)
    {
        $strona = Czywiesz::findOrFail($id)->delete();
        session()->flash('komunikat', '"Czy wiesz" zostało usunięte!');
        return redirect()->route('czywieszLista');
    }


}
