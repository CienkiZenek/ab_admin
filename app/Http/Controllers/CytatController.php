<?php

namespace App\Http\Controllers;

use App\Models\Cytat;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CytatController extends Controller
{
    protected function validator($data)
    {
        $walidated = Validator::make($data, [
            'podpis' => 'required|min:10|',
            'tresc' => 'required|min:30',


        ])->validate();
        return $walidated;
    }


    public function index()
    {
        $Wyniki=Cytat::orderBy('created_at', 'desc')->paginate(10);
        return view('tresc.listy.cytat-lista', compact('Wyniki'));

    }


    public function nowy()
    {
        $listaRoutName='cytatLista';
        $nazwaListy='Lista "Cytatów dnia"';
        return view('tresc.dodawanie.cytat-dodawanie',['nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName]);
    }

    public function create(Request $request)
    {
        $data = $this->validator($request->all());

        Cytat::create($data);
        session()->flash('komunikat', 'Nowe "Cytat dnia" został dodany');
        return redirect()->route('cytatLista');
    }

    public function szukaj(Request $request)
    {

        $szukane=$request->get('szukane');
        $Wyniki=Cytat::where('podpis', 'like', "%$szukane%")
            ->OrWhere('tresc', 'like', "%$szukane%")
            ->paginate(10);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.cytat-lista', compact('Wyniki'));
    }


    public function edit($id)
    {
        $cytat = Cytat::findOrFail($id);
        $listaRoutName='cytatLista';
        $nazwaListy='Lista "Cytatów dnia"';
        return view('tresc.edycja.cytat-edycja', ['cytat'=>$cytat,
            'nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName
        ]);
    }

    public function update(Request $request, $id)
    {
        $cytat = Cytat::findOrFail($id);
        $data = $this->validator($request->all());
        $cytat->update($data);
        session()->flash('komunikat', '"Cytat dnia" został zaktualizowany');
        return redirect()->route('cytatLista');
    }

    public function destroy($id)
    {
        $cytat = Cytat::findOrFail($id)->delete();
        session()->flash('komunikat', 'Cytat został usunięty!');
        return redirect()->route('cytatLista');
    }
}
