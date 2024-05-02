@extends('szablon.szablon')
@section('title', 'Zasób - edycja')
@section('tresc')

    <form action="{{route('zasobEdycjaZapis', $zasob->id)}}" method="POST">
        @csrf
        <div class="row mt-3">
            <div class="col-4">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="rodzaj">Rodzaj zasobu:</span>
                    </div>
                    <select class="form-control" id="rodzaj" name="rodzaj" aria-label="rodzaj"
                            aria-describedby="rodzaj">
                        <option value="wydarzenie" @if($zasob->rodzaj=='wydarzenie') selected @endif>Wydarzenie</option>
                        <option value="dokument" @if($zasob->rodzaj=='dokument') selected @endif>Dokument</option>
                        <option value="ksiazka" @if($zasob->rodzaj=='ksiazka') selected @endif>Książka</option>
                        <option value="galeria" @if($zasob->rodzaj=='galeria') selected @endif>Galeria</option>
                        <option value="modlitwa" @if($zasob->rodzaj=='modlitwa') selected @endif>Modlitwa</option>
                        <option value="publikacja" @if($zasob->rodzaj=='publikacja') selected @endif>Publikacja</option>
                        <option value="inny" @if($zasob->rodzaj=='inny') selected @endif>Inny</option>
                        {{--['ksiazka', 'galeria', 'modlitwa', 'wydarzenie', 'inny' ])--}}
                    </select>
                </div>
            </div>

            <div class="col-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="rodzaj">Na stronie głównej:</span>
                    </div>
                    <select class="form-control" id="strona_glowna" name="strona_glowna" aria-label="strona_glowna"
                            aria-describedby="strona_glowna">
                        <option value="tak" @if($zasob->strona_glowna=='tak') selected @endif>Tak</option>
                        <option value="nie" @if($zasob->strona_glowna=='nie') selected @endif>Nie</option>
                    </select>
                </div>
            </div>

        </div>


        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nazwa zasobu:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('nazwa') ? ' is-invalid' : ' ' }}"
                           name="nazwa" id="nazwa" value="{{$zasob->nazwa}}">
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Opis zasobu:</span>
                    </div>
                    <input type="text" class="form-control" name="opis" id="opis" value="{{$zasob->opis}}">
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Treść zasobu:</span>
                    </div>
                    <textarea class="form-control" name="tresc" id="tresc" rows="14">{{$zasob->tresc}}</textarea>
                </div>

            </div>
        </div>

        @include('dodatki.seo', ['tresc'=>$zasob])

        @if(Str::length($zasob->zdjecie1)>4 || Str::length($zasob->zdjecie2)>4)
            @include('dodatki.podpisyObrazki', ['tresc'=>$zasob])
        @endif
        <div class="row mt-5">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Zapisz</button>

            </div>

        </div>
    </form>

    <div class="mt-4"></div>
    {{-- Dodaj obrazki--}}
    @include('dodatki.obrazekiDwaDodaj', ['dzial'=>'Zasoby', 'tresc'=>$zasob])
    {{-- Dodaj galerie--}}
    @include('dodatki.galeriaDodaj', ['dzial'=>'Zasoby', 'tresc'=>$zasob])
    {{--Dodaj plik--}}
    @include('dodatki.plikDodaj', ['dzial'=>'Zasoby', 'tresc'=>$zasob])
    {{--Połącz z wątkiem--}}
    @include('dodatki.watekPolacz', ['dzial'=>'Zasoby', 'tresc'=>$zasob])

    <button class="btn btn-danger mt-5" type="button" data-bs-toggle="collapse" data-bs-target="#usuwanie"
            aria-expanded="false" aria-controls="usuwanie">
        Usuwanie
    </button>
    <div class="collapse" id="usuwanie">

        <div class="card card-body col-3 text-center mt-3">
            <form action="{{route('zasobyUsun', $zasob->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń</button>


            </form>

        </div>
    </div>


    <div class="mt-3 mb-3"></div>

@endsection
