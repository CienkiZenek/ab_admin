<?php

namespace App\Http\Controllers;

use App\Models\Listy;
use Illuminate\Http\Request;


class ListyController extends Controller
{

    public function index()
    {
        $Wyniki=Listy::orderBy('created_at', 'desc')->paginate(10);
        return view('tresc.listy.listy-lista', compact('Wyniki'));
    }


    public function edit($id)
    {
        $list = Listy::findOrFail($id);
        $listaRoutName='listyLista';
        $nazwaListy='Listy do redakcji';
        return view('tresc.edycja.listy-edycja', ['list'=>$list,
            'nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName
        ]);
    }

    public function update(Request $request, $id)
    {
        $list = Listy::findOrFail($id);
       // $data = $this->validator($request->all());
        $list->update($request->all());
        session()->flash('komunikat', "Status listu zmieniony!");
        return redirect()->route('listyLista');
    }
    public function destroy($id)
    {
        $list = Listy::findOrFail($id)->delete();
        session()->flash('komunikat', "List został usunięty!");
        return redirect()->route('listyLista');
    }

    public function szukaj(Request $request)
    {

        $szukane=$request->get('szukane');
        $Wyniki=Listy::where('tresc', 'like', "%$szukane%")->paginate(10);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.listy-lista', compact('Wyniki'));
    }
}
