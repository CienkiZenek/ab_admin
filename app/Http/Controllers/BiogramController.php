<?php

namespace App\Http\Controllers;

use App\Models\Biogram;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BiogramController extends Controller
{
    protected function validator($data)
    {
        $walidated = Validator::make($data, [
            'tresc' => 'required|min:20',
            'kolejnosc' => 'required|numeric',
            'rok' => 'required',
            'dzien_mies' => 'nullable'


        ])->validate();
        return $walidated;
    }

    public function index()
    {
        $Wyniki=Biogram::orderBy('kolejnosc', 'asc')->paginate(60);
        return view('tresc.listy.biogram-lista', compact('Wyniki'));

    }


    public function nowy()
    {
        $listaRoutName='biogramLista';
        $nazwaListy='Biogram - lista pozycji';
        return view('tresc.dodawanie.biogram-dodawanie',['nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName]);
    }

    public function create(Request $request)
    {
        $data = $this->validator($request->all());

        Biogram::create($data);
        session()->flash('komunikat', "Nowa pozycja w biogramie została dodana");
        return redirect()->route('biogramLista');
    }

    public function szukaj(Request $request)
    {

        $szukane=$request->get('szukane');
        $Wyniki=Biogram::where('tresc', 'like', "%$szukane%")
            ->paginate(20);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.biogram-lista', compact('Wyniki'));
    }


    public function edit($id)
    {
        $biogram = Biogram::findOrFail($id);
        $listaRoutName='biogramLista';
        $nazwaListy='Biogram - lista pozycji';
        return view('tresc.edycja.biogram-edycja', ['biogram'=>$biogram,
            'nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName
        ]);
    }

    public function update(Request $request, $id)
    {
        $biogram = Biogram::findOrFail($id);
        $data = $this->validator($request->all());
        $biogram->update($data);
        session()->flash('komunikat', "Pozycja w biogramie została zaktualizowana");
        return redirect()->route('biogramLista');
    }

    public function destroy($id)
    {
        $strona = Biogram::findOrFail($id)->delete();
        session()->flash('komunikat', "Pozycja w biogramie została usunięta!");
        return redirect()->route('biogramLista');
    }
}
