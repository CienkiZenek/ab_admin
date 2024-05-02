@extends('szablon.szablon')
@section('title', 'Strony internetowe - edycja')
@section('tresc')


    <form action="{{route('stronaEdycjaZapis', $strona->id)}}" method="POST">
        @csrf

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Tytuł strony:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('tytul') ? ' is-invalid' : ' ' }}" name="tytul" id="tytul" value="{{$strona->tytul}}" >
                </div>

            </div>
        </div>

        <div class="row mt-3">

            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Link (url):</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('link') ? ' is-invalid' : ' ' }}" name="link" id="link" value="{{$strona->link}}" >
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
                              rows="6">{{$strona->opis}}</textarea>
                </div>

            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Zapisz</button>

            </div>

        </div>
    </form>

    <div class="mt-4"></div>
    {{-- Dodaj obrazki--}}
    @include('dodatki.obrazekiJedenDodaj', ['dzial'=>'Strony', 'tresc'=>$strona])


    <button class="btn btn-danger mt-5" type="button" data-bs-toggle="collapse" data-bs-target="#usuwanie" aria-expanded="false" aria-controls="usuwanie">
        Usuwanie
    </button>
    <div class="collapse" id="usuwanie">

        <div class="card card-body col-3 text-center mt-3">
            <form action="{{route('stronaUsun', $strona->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń</button>


            </form>

        </div>
    </div>


    <div class="mt-3 mb-3"></div>




@endsection
