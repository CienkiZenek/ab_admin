@extends('szablon.szablon')
@section('title', 'Filmy - edycja')
@section('tresc')


    <form action="{{route('filmEdycjaZapis', $film->id)}}" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="row mt-2">
            <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Tytuł:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('tytul') ? ' is-invalid' : ' ' }}" name="tytul" id="tytul" value="{{$film->tytul}}">
                </div>
            </div>


            <div class="col-4">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="rodzaj">Rodzaj:</span>
                    </div>
                    <select class="form-control" id="rodzaj" name="rodzaj" aria-label="rodzaj"
                            aria-describedby="rodzaj">
                        <option value="Obcy" @if($film->rodzaj=='Obcy') selected @endif>Obcy</option>
                        <option value="Wlasny" @if($film->rodzaj=='Wlasny') selected @endif>Własny</option>

                    </select>
                </div>
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Opis:</span>
                    </div>
                    <textarea class="form-control" name="opis" id="opis" rows="3">{{$film->opis}}</textarea>
                </div>

            </div>
            <div class="row mt-2">
                <div class="col-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Kanał:</span>
                        </div>
                        <input type="text" class="form-control" name="kanal" id="kanal" value="{{$film->kanal}}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Kanał (url):</span>
                        </div>
                        <input type="text" class="form-control" name="kanal_url" id="kanal_url" value="{{$film->kanal_url}}">
                    </div>
                </div>

            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Kod filmu (embed):</span>
                    </div>
                    <textarea class="form-control{{ $errors->has('film_kod') ? ' is-invalid' : ' ' }}" name="film_kod" id="film_kod" rows="4">{{$film->film_kod}}</textarea>
                </div>

            </div>

            <div class="col-6">
                <div class="ratio ratio-16x9">
                    <iframe
                        src="{{$film->film_kod}}"
                        title=""
                        allowfullscreen
                    ></iframe>
                </div>
              {{--  {!! $film->film_kod !!}--}}

            </div>
        </div>
        <div class="col-12 mb-2">
            https://www.youtube.com/embed/
        </div>

        @include('dodatki.seo', ['tresc'=>$film])
        <div class="row mt-2">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Zapisz</button>

            </div>

        </div>
    </form>
    {{--Połącz z wątkiem--}}
    @include('dodatki.watekPolacz', ['dzial'=>'Filmy', 'tresc'=>$film])

    <button class="btn btn-danger mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#usuwanie" aria-expanded="false" aria-controls="usuwanie">
        Usuń
    </button>
    <div class="collapse" id="usuwanie">

        <div class="card card-body col-3 text-center mt-4">
            <form action="{{route('filmUsun', $film->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń</button>


            </form>

        </div>
    </div>


    <div class="mb-5"></div>




@endsection
