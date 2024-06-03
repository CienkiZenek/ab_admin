@extends('szablon.szablon')
@section('title', 'Zdjęcia - lista')
@section('tresc')

    <p class="badge bg-secondary fs-5">
        Lista zdjęć
    </p>
    <div class="row mt-2">
{{--{{$dzial}}<br>
{{$tresc_id}}<br>
        {{$rodzaj}}--}}
        <div class="col-6">

            @if($dodawanie=='nie')
            <form action="{{route('zdjeciaSzukaj')}}" method="get">
                <div class="input-group">

                    <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Szukaj</button>

                    </div></div>
            </form>
            @endif
                @if($dodawanie=='tak')
                    <form action="{{route('zdjeciaSzukajDodawanie')}}" method="post">
                        @csrf

                        <div class="input-group">

                            <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                            <div class="input-group-append">

                                <input type="hidden" name="dzial" value="{{$dzial}}"/>
                                <input type="hidden" name="tresc_id" value="{{$tresc_id}}"/>
                                <input type="hidden" name="rodzaj" value="{{$rodzaj}}"/>
                                <input type="hidden" name="tryb" value="{{$tryb}}"/>

                                <button class="btn btn-outline-secondary" type="submit">Szukaj</button>

                            </div></div>
                    </form>
                @endif


        </div>
        <div class="col-6">
            <a href="{{route('zdjecieNowe')}}" class="btn btn-primary" role="button" aria-pressed="true">Dodaj nowe zdjęcie</a>
        </div>
    </div>

    @if($dodawanie=='nie')
        <div class="row mt-2">
            <div class="col-6">
                <form action="{{route('zdjeciaListaKategoria')}}" method="POST">
                    @csrf
                    {{--<input type="hidden" name="rodzaj" value="{{$rodzaj}}"/>
                    <input type="hidden" name="tryb" value="{{$tryb}}"/>--}}
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="status1">Kategorie zdjęcia:</span>
                        </div>
                        <select class="form-control" id="kategoria" name="kategoria" aria-label="kategoria" aria-describedby="kategoria1">
                            <option value="wszystkie" >Wszystkie kategorie</option>
                            @if(isset($kategoria))

                                <option value="1938_powrot" @if($kategoria=='1938_powrot') selected @endif>1938 powrót relikwii</option>
                                <option value="Gazeta" @if($kategoria=='Gazeta') selected @endif>Gazeta</option>
                                <option value="Dokument" @if($kategoria=='Dokument') selected @endif>Dokument</option>
                                <option value="Ilustracja" @if($kategoria=='Ilustracja') selected @endif>Ilustracja</option>
                                <option value="Informacja" @if($kategoria=='Informacja') selected @endif>Informacja</option>
                                <option value="Kanonizacja_beatyfikacja" @if($kategoria=='Kanonizacja_beatyfikacja') selected @endif>Kanonizacja - beatyfikacja</option>
                                <option value="Karuzela" @if($kategoria=='Karuzela') selected @endif>Karuzela</option>
                                <option value="Meczenstwo" @if($kategoria=='Meczenstwo') selected @endif>Męczenstwo</option>
                                <option value="Male_obrazki" @if($kategoria=='Male_obrazki') selected @endif>Małe obrazki</option>
                                <option value="Miejsca_kultu" @if($kategoria=='Miejsca_kultu') selected @endif>Miejsca kultu</option>
                                <option value="Modlitwa" @if($kategoria=='Modlitwa') selected @endif>Modlitwa</option>
                                <option value="Muzeum" @if($kategoria=='Muzeum') selected @endif>Muzeum</option>
                                <option value="Portret" @if($kategoria=='Portret') selected @endif>Portret/Podobizna</option>
                                <option value="Publikacja" @if($kategoria=='Publikacja') selected @endif>Publikacja</option>
                                <option value="Rakowiecka" @if($kategoria=='Rakowiecka') selected @endif>Rakowiecka</option>
                                <option value="Relikwie" @if($kategoria=='Relikwie') selected @endif>Relikwie</option>
                                <option value="Ryciny" @if($kategoria=='Ryciny') selected @endif>Ryciny/Czarno-białe</option>
                                <option value="Strachocina" @if($kategoria=='Strachocina') selected @endif>Strachocina</option>
                                <option value="Wydarzenie" @if($kategoria=='Wydarzenie') selected @endif>Wydarzenie</option>
                                <option value="Zycie_AB" @if($kategoria=='Zycie_AB') selected @endif>Życie Andrzeja Boboli</option>
                                <option value="Inne" @if($kategoria=='Inne') selected @endif>Inne</option>

                            @else
                                <option value="1938_powrot" >1938 powrót relikwii</option>
                                <option value="Gazeta" >Gazeta</option>
                                <option value="Dokument" >Dokument</option>
                                <option value="Ilustracje" >Ilustracja</option>
                                <option value="Informacja" >Informacja</option>
                                <option value="Kanonizacja_beatyfikacja" >Kanonizacja - beatyfikacja</option>
                                <option value="Karuzela" >Karuzela</option>
                                <option value="Meczenstwo" >Męczeństwo</option>
                                <option value="Male_obrazki" >Małe obrazki</option>
                                <option value="Miejsca_kultu" >Miejsca kultu</option>
                                <option value="Modlitwa" >Modlitwa</option>
                                <option value="Muzeum" >Muzeum</option>
                                <option value="Portret" selected>Portret/Podobizna</option>
                                <option value="Publikacja" >Publikacja</option>
                                <option value="Rakowiecka" >Rakowiecka</option>
                                <option value="Relikwie" >Relikwie</option>
                                <option value="Ryciny" >Ryciny/Czarno-białe</option>
                                <option value="Strachocina" >Strachocina</option>
                                <option value="Wydarzenie" >Wydarzenie</option>
                                <option value="Zycie_AB" >Życie Andrzeja Boboli</option>
                                <option value="Inne" >Inne</option>
                            @endif
                        </select>
                    </div>
            </div>

            <div class="col-6">
                <button type="submit" class="btn btn-primary">Wybierz kategorie zdjęcia</button>
                </form>
            </div>
        </div>
    @endif

    @if($dodawanie=='tak')

        <div class="row mt-2">
            <div class="col-6">
                <form action="{{route('zdjeciaListaKategoriaDodawanie')}}" method="POST">
                    @csrf
                    <input type="hidden" name="dzial" value="{{$dzial}}"/>
                    <input type="hidden" name="tresc_id" value="{{$tresc_id}}"/>
                    <input type="hidden" name="rodzaj" value="{{$rodzaj}}"/>
                    <input type="hidden" name="tryb" value="{{$tryb}}"/>
                    <input type="hidden" name="dodawanie" value="tak"/>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="status1">Kategorie zdjęcia:</span>
                        </div>
                        <select class="form-control" id="kategoria" name="kategoria" aria-label="kategoria" aria-describedby="kategoria1">
                            <option value="wszystkie" >Wszystkie kategorie</option>
                            @if(isset($kategoria))
                                <option value="1938_powrot" @if($kategoria=='1938_powrot') selected @endif>1938 powrót relikwii</option>
                                <option value="Gazeta" @if($kategoria=='Gazeta') selected @endif>Gazeta</option>
                                <option value="Dokument" @if($kategoria=='Dokument') selected @endif>Dokument</option>
                                <option value="Ilustracja" @if($kategoria=='Ilustracja') selected @endif>Ilustracja</option>
                                <option value="Informacja" @if($kategoria=='Informacja') selected @endif>Informacja</option>
                                <option value="Kanonizacja_beatyfikacja" @if($kategoria=='Kanonizacja_beatyfikacja') selected @endif>Kanonizacja - beatyfikacja</option>
                                <option value="Karuzela" @if($kategoria=='Karuzela') selected @endif>Karuzela</option>
                                <option value="Meczenstwo" @if($kategoria=='Meczenstwo') selected @endif>Męczenstwo</option>
                                <option value="Male_obrazki" @if($kategoria=='Male_obrazki') selected @endif>Małe obrazki</option>
                                <option value="Miejsca_kultu" @if($kategoria=='Miejsca_kultu') selected @endif>Miejsca kultu</option>
                                <option value="Modlitwa" @if($kategoria=='Modlitwa') selected @endif>Modlitwa</option>
                                <option value="Muzeum" @if($kategoria=='Muzeum') selected @endif>Muzeum</option>
                                <option value="Portret" @if($kategoria=='Portret') selected @endif>Portret/Podobizna</option>
                                <option value="Publikacja" @if($kategoria=='Publikacja') selected @endif>Publikacja</option>
                                <option value="Rakowiecka" @if($kategoria=='Rakowiecka') selected @endif>Rakowiecka</option>
                                <option value="Relikwie" @if($kategoria=='Relikwie') selected @endif>Relikwie</option>
                                <option value="Ryciny" @if($kategoria=='Ryciny') selected @endif>Ryciny/Czarno-białe</option>
                                <option value="Strachocina" @if($kategoria=='Strachocina') selected @endif>Strachocina</option>
                                <option value="Wydarzenie" @if($kategoria=='Wydarzenie') selected @endif>Wydarzenie</option>
                                <option value="Zycie_AB" @if($kategoria=='Zycie_AB') selected @endif>Życie Andrzeja Boboli</option>
                                <option value="Inne" @if($kategoria=='Inne') selected @endif>Inne</option>

                            @else
                                <option value="1938_powrot" >1938 powrót relikwii</option>
                                <option value="Gazeta" >Gazeta</option>
                                <option value="Dokument" >Dokument</option>
                                <option value="Ilustracje" >Ilustracja</option>
                                <option value="Informacja" >Informacja</option>
                                <option value="Kanonizacja_beatyfikacja" >Kanonizacja - beatyfikacja</option>
                                <option value="Karuzela" >Karuzela</option>
                                <option value="Meczenstwo" >Męczeństwo</option>
                                <option value="Male_obrazki" >Małe obrazki</option>
                                <option value="Miejsca_kultu" >Miejsca kultu</option>
                                <option value="Modlitwa" >Modlitwa</option>
                                <option value="Muzeum" >Muzeum</option>
                                <option value="Portret" selected>Portret/Podobizna</option>
                                <option value="Publikacja" >Publikacja</option>
                                <option value="Rakowiecka" >Rakowiecka</option>
                                <option value="Relikwie" >Relikwie</option>
                                <option value="Ryciny" >Ryciny/Czarno-białe</option>
                                <option value="Strachocina" >Strachocina</option>
                                <option value="Wydarzenie" >Wydarzenie</option>
                                <option value="Zycie_AB" >Życie Andrzeja Boboli</option>
                                <option value="Inne" >Inne</option>
                            @endif
                        </select>
                    </div>
            </div>
            <div class="col-6">
                <button type="submit" class="btn btn-primary">Wybierz kategorie zdjęcia</button>
                </form>
            </div>
        </div>
    @endif


    <div class="row mt-3 mb-3 border-3 bg-light p-2 border border-secondary rounded" >
        <div class="col-3 "><span class="badge bg-secondary">Obrazek</span></div>
        <div class="col-4 "><span class="badge bg-secondary">Opis</span></div>
        <div class="col-4 "><span class="badge bg-secondary">Użycia</span></div>

    </div>

    @foreach($Wyniki as $zdjecie)
        <div class="p-1 mt-1 fs-5" >
            <span class="badge bg-secondary">Plik: {{$zdjecie->plik}}</span>
            </div>

            <div class="row mt-3  border-bottom border-2" >
           <div class="col-3 fs-6">
               <a href="zdjecia/{{$zdjecie->plik}}" data-lightbox="obrazek{{$zdjecie->id}}" data-title="">
                   <img src="zdjecia/{{$zdjecie->plik}}"  class="img-thumbnail" alt="{{$zdjecie->opis}}" style="max-height: 200px"></a>



               @if($dodawanie=='nie')
               <form action="{{route('zdjecieEdycja', $zdjecie->id)}}" method="POST">
                   @csrf
                {{--   <input type="hidden" name="zdjecie_id" value="{{$zdjecie->id}}"/>--}}


                   <button type="submit" class="btn btn-sm btn-primary mb-2">Zmień/Usuń</button>

               </form>
               @endif
           </div>
            <div class="col-3 size20">
                 {{--{{$zdjecie->opis  }} (<b>{{$zdjecie->kategoria}}</b>)</br>--}}
                 {{$zdjecie->opis  }} (<b>{{\App\Services\ObrazkiDodawanie::ludzkaKategoria($zdjecie->kategoria)}}</b>)</br>


            @if($zdjecie->duze=='tak')
                <span class="badge bg-danger text-white">Również duże!</span>
                @endif
                <div><b>Autor:</b> {{$zdjecie->autor}}</div>
            </div>
            <div class=" col-4 size20">
                @php
                    $powiazania=\App\Services\ObrazkiDodawanie::obrazekPowiazania($zdjecie->id,6);
/*dd($powiazania);*/
                @endphp

                @foreach($powiazania as $powiazanie)
                    <p class="m-0"> {{Str::limit($powiazanie->pow_tytul, 40)}} (<i>{{$powiazanie->rodzaj}}</i>, {{$powiazanie->pow_data}})</p>
                @endforeach

            </div>
                <div class="col-2 size20">
                    {{--<a href="{{route('zdjeciaDodaj')}}" class="btn btn-primary" role="button" aria-pressed="">Dodaj</a>--}}
                    @if($dodawanie=='tak')
                        <form action="{{route('zdjecieDodaj')}}" method="POST">
                        @csrf

                    <input type="hidden" name="dzial" value="{{$dzial}}"/>
                    <input type="hidden" name="tresc_id" value="{{$tresc_id}}"/>
                    <input type="hidden" name="rodzaj" value="{{$rodzaj}}"/>
                    <input type="hidden" name="zdjecie_id" value="{{$zdjecie->id}}"/>
                    <input type="hidden" name="tryb" value="{{$tryb}}"/>
                   {{-- <input type="hidden" name="zdjeci_plik" value="{{$zdjecie->plik}}"/>--}}

                    <button type="submit" class="btn btn-primary">Dodaj</button>

        </form>
                    @endif   </div>

            </div>

    @endforeach

  @include('dodatki.paginacja')

@endsection
