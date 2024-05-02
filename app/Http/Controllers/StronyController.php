<?php

namespace App\Http\Controllers;


use App\Models\Strony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StronyController extends Controller
{
    protected function validator($data)
    {
        $walidated = Validator::make($data, [
            'tytul' => 'required|min:10',
            'link' => 'required|url',
            'opis' => 'nullable'

        ])->validate();
        return $walidated;
    }

    public function index()
    {
        $Wyniki=Strony::orderBy('created_at', 'desc')->paginate(10);
        return view('tresc.listy.strony-lista', compact('Wyniki'));

    }


    public function nowy()
    {
        $listaRoutName='stronyLista';
        $nazwaListy='Lista stron internetowych';
        return view('tresc.dodawanie.strony-dodawanie',['nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName]);
    }

    public function create(Request $request)
    {
        $data = $this->validator($request->all());

        Strony::create($data);
        session()->flash('komunikat', "Nowa strona została dodana");
        return redirect()->route('stronyLista');
    }

    public function szukaj(Request $request)
    {

        $szukane=$request->get('szukane');
        $Wyniki=Strony::where('tytul', 'like', "%$szukane%")
            ->OrWhere('opis', 'like', "%$szukane%")
            ->OrWhere('link', 'like', "%$szukane%")
            ->paginate(10);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.strony-lista', compact('Wyniki'));
    }


    public function edit($id)
    {
        $strona = Strony::findOrFail($id);
        $listaRoutName='stronyLista';
        $nazwaListy='Lista stron internetowych';
        return view('tresc.edycja.strony-edycja', ['strona'=>$strona,
            'nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName
        ]);
    }

    public function update(Request $request, $id)
    {
        $strona = Strony::findOrFail($id);
        $data = $this->validator($request->all());
        $strona->update($data);
        session()->flash('komunikat', "Strona została zaktualizowana");
        return redirect()->route('stronyLista');
    }

    public function destroy($id)
    {
        $strona = Strony::findOrFail($id)->delete();
        session()->flash('komunikat', "Strona została usunięta!");
        return redirect()->route('stronyLista');
    }


}
