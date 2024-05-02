<?php

namespace App\Http\Controllers;

use App\Models\Intencje;
use Illuminate\Http\Request;

class IntencjeController extends Controller
{

    public function index()
    {
        $Wyniki=Intencje::orderBy('created_at', 'desc')->paginate(10);
        return view('tresc.listy.intencje-lista', compact('Wyniki'));
    }


    public function edit($id)
    {
        $intencja = Intencje::findOrFail($id);
        $listaRoutName='intencjeLista';
        $nazwaListy='Intencje i świadectwa';
        return view('tresc.edycja.intencje-edycja', ['intencja'=>$intencja,
            'nazwaListy'=>$nazwaListy,
            'listaRoutName'=>$listaRoutName
        ]);
    }

    public function update(Request $request, $id)
    {
        $intencja = Intencje::findOrFail($id);
        // $data = $this->validator($request->all());
        $intencja->update($request->all());
        session()->flash('komunikat', "Status intencji zmieniony!");
        return redirect()->route('intencjeLista');
    }
    public function destroy($id)
    {
        $intencja = Intencje::findOrFail($id)->delete();
        session()->flash('komunikat', "Usunięto intencja/świadectwo!");
        return redirect()->route('intencjeLista');
    }

    public function szukaj(Request $request)
    {

        $szukane=$request->get('szukane');
        $Wyniki=Intencje::where('tresc_nadeslana', 'like', "%$szukane%")
            ->orWhere('tresc_opublikowana', 'like', "%$szukane%")
                ->paginate(10);
        $Wyniki->appends(['szukane'=>$szukane]);
        return view('tresc.listy.intencje-lista', compact('Wyniki'));
    }
}
