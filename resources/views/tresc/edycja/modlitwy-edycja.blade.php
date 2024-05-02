@extends('szablon.szablon')
@section('title', 'Modlitwy - edycja')
@section('tresc')


    <form action="{{route('modlitwyEdycjaZapis', $modlitwa->id)}}" method="POST">
        @csrf

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Nazwa modlitwy:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('nazwa') ? ' is-invalid' : ' ' }}" name="nazwa" id="nazwa" value="{{$modlitwa->nazwa}}" >
                </div>

            </div>
        </div>
        <div class="row mt-3">
        <div class="col-6">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" >Plik z modlitwą:</span>
                </div>
                <input type="text" class="form-control" name="widok" id="widok" value="{{$modlitwa->widok}}" >
            </div>
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Treść:</span>
                    </div>
                    <textarea class="form-control{{ $errors->has('tresc') ? ' is-invalid' : ' ' }}"  name="tresc" id="tresc"
                              rows="10">{{$modlitwa->tresc}}</textarea>
                </div>

            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Opis:</span>
                    </div>
                    <textarea class="form-control" name="opis" id="opis"
                              rows="4">{{$modlitwa->opis}}</textarea>
                </div>

            </div>
        </div>
        <div class="row mt-3">
        <div class="col-4">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="rodzaj">Na stronie głównej:</span>
                </div>
                <select class="form-control" id="strona_glowna" name="strona_glowna" aria-label="strona_glowna"
                        aria-describedby="strona_glowna">
                    <option value="tak" @if($modlitwa->strona_glowna=='tak') selected @endif>Tak</option>
                    <option value="nie" @if($modlitwa->strona_glowna=='nie') selected @endif>Nie</option>
                </select>
            </div>
        </div>
        </div>

        <div class="row mt-3">

            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Źródło:</span>
                    </div>
                    <input type="text" class="form-control" name="zrodlo_nazwa" id="zrodlo_nazwa" value="{{$modlitwa->zrodlo_nazwa}}" >
                </div>

            </div>
        </div>
        <div class="row mt-3">

            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Źródło (url):</span>
                    </div>
                    <input type="text" class="form-control" name="zrodlo_link" id="zrodlo_link" value="{{$modlitwa->zrodlo_link}}" >
                </div>

            </div>
        </div>


        @include('dodatki.seo', ['tresc'=>$modlitwa])
        @if(Str::length($modlitwa->zdjecie1)>4 || Str::length($modlitwa->zdjecie2)>4)
            @include('dodatki.podpisyObrazki', ['tresc'=>$modlitwa])
        @endif
        <div class="row mt-5 mb-3">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Zapisz</button>

            </div>

        </div>
    </form>
    <div class="mt-4"></div>
    {{-- Dodaj obrazki--}}
    <a href="#zdjecia" id="zdjeciaZmiana">
    </a>
   {{-- @include('dodatki.obrazekiJedenDodaj', ['dzial'=>'Modlitwy', 'tresc'=>$modlitwa])--}}
    @include('dodatki.obrazekiDwaDodaj', ['dzial'=>'Modlitwy', 'tresc'=>$modlitwa])
    {{--Dodaj plik--}}
    @include('dodatki.plikDodaj', ['dzial'=>'Modlitwy', 'tresc'=>$modlitwa])
    {{--Połącz z wątkiem--}}
    @include('dodatki.watekPolacz', ['dzial'=>'Modlitwy', 'tresc'=>$modlitwa])

    <button class="btn btn-danger mt-5" type="button" data-bs-toggle="collapse" data-bs-target="#usuwanie" aria-expanded="false" aria-controls="usuwanie">
        Usuwanie
    </button>
    <div class="collapse" id="usuwanie">

        <div class="card card-body col-3 text-center mt-3">
            <form action="{{route('modlitwymUsun', $modlitwa->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń</button>


            </form>

        </div>
    </div>


    <div class="mt-3 mb-3"></div>




@endsection
