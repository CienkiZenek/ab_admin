@extends('szablon.szablon')
@section('title', 'Plik - edycja')
@section('tresc')


    <form action="{{route('plikEdycjaZapis', $plik->id)}}" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="row mt-5">

            <div class="col-6">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="rodzaj">Typ:</span>
                    </div>
                    <select class="form-control" id="typ" name="typ" aria-label="typ"
                            aria-describedby="typ">
                        <option value="pdf" @if($plik->typ=='pdf') selected @endif>Pdf</option>

                        <option value="word" @if($plik->typ=='word') selected @endif>Word
                        </option>
                        <option value="inny" @if($plik->typ=='inny') selected @endif>Inny</option>

                    </select>
                </div>
            </div>

            <div class="col-6">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="rodzaj">Rodzaj:</span>
                    </div>
                    <select class="form-control" id="rodzaj" name="rodzaj" aria-label="rodzaj"
                            aria-describedby="rodzaj">
                        <option value="zasob" @if($plik->rodzaj=='zasob') selected @endif>Zasób</option>
                        <option value="dokument" @if($plik->rodzaj=='dokument') selected @endif>Dokument</option>
                        <option value="modlitwa" @if($plik->rodzaj=='modlitwa') selected @endif>Modlitwa</option>
                        <option value="ksiazka" @if($plik->rodzaj=='ksiazka') selected @endif>Książka</option>
                        <option value="skan" @if($plik->rodzaj=='skan') selected @endif>Skan</option>
                        <option value="inny" @if($plik->rodzaj=='inny') selected @endif>Inny</option>

                        {{--zasob', 'dokument', 'modlitwa','ksiazka', 'skan', 'inny'--}}
                    </select>
                </div>
            </div>

        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Nazwa pliku:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('nazwa') ? ' is-invalid' : ' ' }}" name="nazwa" id="nazwa" value="{{$plik->nazwa}}" >
                </div>

            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Opis pliku:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('opis') ? ' is-invalid' : ' ' }}" name="opis" id="opis" value="{{$plik->opis}}" >
                </div>

            </div>
        </div>

        <div class="row mt-3">


            <div class="col-12">
                <div class="form-label">Plik edytowany:</div>
                <h5>
                    <a href="{{ URL::asset('pliki/'.$plik->plik)}}" target="_blank">{{Str::remove('pliki/',$plik->plik)}}</a>
                </h5>

            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">

                <div class="input-group  mt-1">

                    <div class="custom-file m-1">
<div class="form-label">
    Wybierz nowy plik:
</div>
                        <input type="file" class="custom-file-input form-control {{ $errors->has('plik') ? ' is-invalid' : '' }}" id="plik" name="plik" lang="pl_Pl" value="">

                    </div>
                </div>
            </div>
        </div>
        @if(Str::length($plik->zdjecie1)>4 || Str::length($plik->zdjecie2)>4)
            @include('dodatki.podpisyObrazki', ['tresc'=>$plik])
        @endif
        <div class="row mt-3">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Aktualizuj</button>

            </div>

        </div>
    </form>

    <div class="mt-4"></div>
    {{-- Dodaj obrazki--}}
    @include('dodatki.obrazekiJedenDodaj', ['dzial'=>'Pliki', 'tresc'=>$plik])

    @if($plik->liczbaDodan==0 )
    <button class="btn btn-danger mt-5" type="button" data-bs-toggle="collapse" data-bs-target="#usuwanie" aria-expanded="false" aria-controls="usuwanie">
        Usuwanie
    </button>
    <div class="collapse" id="usuwanie">
        <div class="mt-4"></div>
        <div class="card card-body col-3 text-center">
            <form action="{{route('plikUsun', $plik->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń plik</button>


            </form>

        </div>
    </div>




    @endif
    <div class="mb-2 md-5"></div>
    @php
        $powiazania=\App\Services\PlikiDodawanie::plikiPowiazania($plik->id, 1000);
    @endphp
@if($powiazania->count()>0)
    <div class="row mt-3 mb-5 ">
        <div class="col-12 mb-3">
            <span class="badge bg-secondary">Plik został załączony do:</span>
        </div>




    @foreach($powiazania as $powiazanie)
        {{-- @php  dd($powiazanie); @endphp--}}
            <div class="col-12"> {{Str::limit($powiazanie->pow_tytul, 70)}} (<i>{{$powiazanie->rodzaj}}</i>, {{$powiazanie->pow_data}}){{----}}</div>
    @endforeach
    </div>

@endif

@endsection
