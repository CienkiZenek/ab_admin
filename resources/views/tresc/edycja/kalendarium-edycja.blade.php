@extends('szablon.szablon')
@section('title', 'Kalendarium - edycja')
@section('tresc')


    <form action="{{route('kalendariumEdycjaZapis', $kalendarium->id)}}" method="POST">
        @csrf

        <div class="row mt-3">

            <div class="col-5">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Data:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('data') ? ' is-invalid' : ' ' }}" name="data" id="data" readonly  value="{{$kalendarium->data}}" >
                </div>

            </div>
            <div class="col-4">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="rodzaj">Status:</span>
                    </div>
                    <select class="form-control" id="status" name="status" aria-label="status"
                            aria-describedby="status">
                        <option value="Robocze" @if($kalendarium->status=='Robocze') selected @endif>Robocze</option>
                        <option value="Opublikowane" @if($kalendarium->status=='Opublikowane') selected @endif>
                            Opublikowane
                        </option>

                    </select>
                </div>
            </div>

        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Tytuł:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('tytul') ? ' is-invalid' : ' ' }}" name="tytul" id="tytul" value="{{$kalendarium->tytul}}" >
                </div>

            </div>
        </div>
        <div>{{ '<a href="" class="text-warning"> </a>'   }}</div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nagłówek:</span>
                    </div>
                    <textarea class="form-control" name="opis" id="opis"
                              rows="3">{{$kalendarium->naglowek}}</textarea>
                </div>

            </div>
        </div>


        <div class="row mt-4">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Treść:</span>
                    </div>
                    <textarea class="form-control"  name="tresc" id="tresc"
                              rows="4">{{$kalendarium->tresc}}</textarea>
                </div>

            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Więcej (opcjonalnie):</span>
                    </div>
                    <textarea class="form-control"  name="wiecej" id="wiecej"
                              rows="4">{{$kalendarium->wiecej}}</textarea>
                </div>

            </div>
        </div>



       {{-- @include('dodatki.seo', ['tresc'=>$kalendarium])--}}

        <div class="row mt-5 mb-3">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Zapisz</button>

            </div>

        </div>
    </form>
    <div class="mt-4"></div>
    {{-- Dodaj obrazki--}}
    @include('dodatki.obrazekiJedenDodaj', ['dzial'=>'Kalendarium', 'tresc'=>$kalendarium])
    {{--Dodaj plik--}}
    @include('dodatki.plikDodaj', ['dzial'=>'Kalendarium', 'tresc'=>$kalendarium])

    <button class="btn btn-danger mt-5" type="button" data-bs-toggle="collapse" data-bs-target="#usuwanie" aria-expanded="false" aria-controls="usuwanie">
        Usuwanie
    </button>
    <div class="collapse" id="usuwanie">

        <div class="card card-body col-3 text-center mt-3">
            <form action="{{route('kalendariumUsun', $kalendarium->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń</button>


            </form>

        </div>
    </div>


    <div class="mt-3 mb-3"></div>




@endsection
