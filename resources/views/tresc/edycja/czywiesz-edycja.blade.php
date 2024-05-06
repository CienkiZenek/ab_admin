@extends('szablon.szablon')
@section('title', '"Czy wiesz, że..." - edycja')
@section('tresc')


    <form action="{{route('czywieszEdycjaZapis', $czywiesz->id)}}" method="POST">
        @csrf

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Tytuł:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('tytul') ? ' is-invalid' : ' ' }}" name="tytul" id="tytul" value="{{$czywiesz->tytul}}" >
                </div>

            </div>
        </div>


        <div class="row mt-4">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Treść:</span>
                    </div>
                    <textarea class="form-control{{ $errors->has('tresc') ? ' is-invalid' : ' ' }}" name="tresc" id="tresc"
                              rows="6">{{$czywiesz->tresc}}</textarea>
                </div>

            </div>
        </div>

        {{--<div class="row mt-4">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Więcej (opcjonalnie):</span>
                    </div>
                    <textarea class="form-control"  name="wiecej" id="wiecej"
                              rows="6">{{$czywiesz->wiecej}}</textarea>
                </div>

            </div>
        </div>--}}

       {{-- @include('dodatki.seo', ['tresc'=>$czywiesz])--}}

        {{--@if(Str::length($czywiesz->zdjecie1)>4 || Str::length($czywiesz->zdjecie2)>4)
            @include('dodatki.podpisyObrazki', ['tresc'=>$czywiesz])
        @endif--}}

        <div class="row mt-5">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Zapisz</button>

            </div>

        </div>
    </form>

<div class="mt-4"></div>
    {{-- Dodaj obrazki--}}
   {{-- @include('dodatki.obrazekiDwaDodaj', ['dzial'=>'Czywiesz', 'tresc'=>$czywiesz])--}}
    {{--Dodaj plik--}}
    {{--@include('dodatki.plikDodaj', ['dzial'=>'Czywiesz', 'tresc'=>$czywiesz])--}}

    <button class="btn btn-danger mt-5" type="button" data-bs-toggle="collapse" data-bs-target="#usuwanie" aria-expanded="false" aria-controls="usuwanie">
        Usuwanie
    </button>
    <div class="collapse" id="usuwanie">

        <div class="card card-body col-3 text-center mt-3">
            <form action="{{route('czywieszUsun', $czywiesz->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń</button>


            </form>

        </div>
    </div>


    <div class="mt-3 mb-3"></div>




@endsection
