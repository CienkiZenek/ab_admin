<?php

namespace App\Http\Controllers;

use App\Models\Ksiegarnie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KsiegarnieController extends Controller
{
    protected function validator($data)
    {
        $walidated = Validator::make($data, [
            'nazwa' => 'required|min:5',
            'link' => 'required|url',
            'opis' => 'nullable',
            'dostepna'=>'nullable'

        ])->validate();
        return $walidated;
    }

    public function index()
    {
        $Wyniki=Ksiegarnie::orderBy('created_at', 'desc')->paginate(10);
        return view('tresc.listy.ksiegarnie-lista', compact('Wyniki'));

    }


    public function nowy()
    {
        $listaRoutName='ksiegarnieLista';
        $nazwaListy='Lista księgarnii';
        return view('tresc.dodawanie.ksiegarnie-dodawanie',['nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName]);
    }

    public function create(Request $request)
    {
        $data = $this->validator($request->all());

        Ksiegarnie::create($data);
        session()->flash('komunikat', "Nowa ksiegarnia została dodana");
        return redirect()->route('ksiegarnieLista');
    }

    public function szukaj(Request $request)
    {

        $szukane=$request->get('szukane');
        $Wyniki=Ksiegarnie::where('nazwa', 'like', "%$szukane%")
            ->OrWhere('opis', 'like', "%$szukane%")
            ->OrWhere('link', 'like', "%$szukane%")
            ->paginate(10);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.ksiegarnie-lista', compact('Wyniki'));
    }


    public function edit($id)
    {
        $ksiegarnia = Ksiegarnie::findOrFail($id);
        $listaRoutName='ksiegarnieLista';
        $nazwaListy='Lista księgarnii';
        return view('tresc.edycja.ksiegarnie-edycja', ['ksiegarnia'=>$ksiegarnia,
            'nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName
        ]);
    }

    public function update(Request $request, $id)
    {
        $ksiegarnia = Ksiegarnie::findOrFail($id);
        $data = $this->validator($request->all());
        $ksiegarnia->update($data);
        session()->flash('komunikat', "Księgarnia została zaktualizowana");
        return redirect()->route('ksiegarnieLista');
    }

    public function destroy($id)
    {
        $strona = Ksiegarnie::findOrFail($id)->delete();
        session()->flash('komunikat', "Księgarnia została usunięta!");
        return redirect()->route('ksiegarnieLista');
    }

}
