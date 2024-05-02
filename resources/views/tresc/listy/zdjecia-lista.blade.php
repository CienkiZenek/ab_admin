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
                            <option value="Portret" @if($kategoria=='Portret') selected @endif>Portret</option>
                                <option value="Informacja" @if($kategoria=='Informacja') selected @endif>Informacja</option>
                                <option value="Dokument" @if($kategoria=='Dokument') selected @endif>Dokument</option>
                                <option value="Publikacja" @if($kategoria=='Publikacja') selected @endif>Publikacja</option>
                                <option value="Wydarzenie" @if($kategoria=='Wydarzenie') selected @endif>Wydarzenie</option>
                                <option value="Strachocina" @if($kategoria=='Strachocina') selected @endif>Strachocina</option>
                                <option value="Rakowiecka" @if($kategoria=='Rakowiecka') selected @endif>Rakowiecka</option>
                                <option value="Muzeum" @if($kategoria=='Muzeum') selected @endif>Muzeum</option>
                                <option value="Meczenstwo" @if($kategoria=='Meczenstwo') selected @endif>Męczeństwo</option>
                                <option value="Inne" @if($kategoria=='Inne') selected @endif>Inne</option>
                            @else
                                <option value="Portret" >Portret</option>
                                <option value="Informacja" >Informacja</option>
                                <option value="Dokument" >Dokument</option>
                                <option value="Publikacja" >Publikacja</option>
                                <option value="Wydarzenie" >Wydarzenie</option>
                                <option value="Strachocina" >Strachocina</option>
                                <option value="Rakowiecka" >Rakowiecka</option>
                                <option value="Muzeum" >Muzeum</option>
                                <option value="Meczenstwo" >Męczeństwo</option>
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
                                <option value="Portret" @if($kategoria=='Portret') selected @endif>Portret</option>
                                <option value="Informacja" @if($kategoria=='Informacja') selected @endif>Informacja</option>
                                <option value="Dokument" @if($kategoria=='Dokument') selected @endif>Dokument</option>
                                <option value="Publikacja" @if($kategoria=='Publikacja') selected @endif>Publikacja</option>
                                <option value="Wydarzenie" @if($kategoria=='Wydarzenie') selected @endif>Wydarzenie</option>
                                <option value="Strachocina" @if($kategoria=='Strachocina') selected @endif>Strachocina</option>
                                <option value="Rakowiecka" @if($kategoria=='Rakowiecka') selected @endif>Rakowiecka</option>
                                <option value="Muzeum" @if($kategoria=='Muzeum') selected @endif>Muzeum</option>
                                <option value="Meczenstwo" @if($kategoria=='Meczenstwo') selected @endif>Męczeństwo</option>
                                <option value="Inne" @if($kategoria=='Inne') selected @endif>Inne</option>
                            @else
                                <option value="Portret" >Portret</option>
                                <option value="Informacja" >Informacja</option>
                                <option value="Dokument" >Dokument</option>
                                <option value="Publikacja" >Publikacja</option>
                                <option value="Wydarzenie" >Wydarzenie</option>
                                <option value="Strachocina" >Strachocina</option>
                                <option value="Rakowiecka" >Rakowiecka</option>
                                <option value="Muzeum" >Muzeum</option>
                                <option value="Meczenstwo" >Męczeństwo</option>
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
                 {{$zdjecie->opis  }} (<b>{{$zdjecie->kategoria  }}</b>)

            </div>
            <div class="col-4 size20">
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
