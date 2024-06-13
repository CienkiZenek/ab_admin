@extends('szablon.szablon')
@section('title', 'Artykuł - edycja')
@section('tresc')

    <form action="{{route('artykulEdycjaZapis', $artykul->id)}}" method="POST">
        @csrf


       <div class="row">
            <div class="col-4">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="rodzaj">Status:</span>
                    </div>
                    <select class="form-control" id="status" name="status" aria-label="status"
                            aria-describedby="status">
                        <option value="Roboczy" @if($artykul->status=='Roboczy') selected @endif>Roboczy</option>
                        <option value="Opublikowany" @if($artykul->status=='Opublikowany') selected @endif>
                            Opublikowany
                        </option>
                         </select>
                </div>
            </div>

            <div class="col-4">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="rodzaj">Na stronie głównej:</span>
                    </div>
                    <select class="form-control" id="strona_glowna" name="strona_glowna" aria-label="strona_glowna"
                            aria-describedby="status">
                        <option value="tak" @if($artykul->strona_glowna=='tak') selected @endif>Tak</option>
                        <option value="nie" @if($artykul->strona_glowna=='nie') selected @endif>Nie</option>


                    </select>
                </div>



            </div>

            <div class="col-4">


                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Data:</span>
                    </div>
                    <input type="text" class="form-control" name="data" id="data" value="{{$artykul->data}}"  >
                </div>


            </div>





            </div>

            <div class="row mt-4">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Tytuł:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('tytul') ? ' is-invalid' : '' }}" name="tytul" id="tytul" value="{{$artykul->tytul}}">
                </div>
            </div>
        </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nagłówek:</span>
                    </div>
                    <textarea class="form-control " name="naglowek" id="naglowek"
                              rows="3">{{$artykul->naglowek}}</textarea>
                </div>

            </div>
        </div>

        <div class="row mt-4 mb-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Treść:</span>
                    </div>
                    <textarea class="form-control" name="tresc" id="tresc" rows="16">{{$artykul->tresc}}</textarea>
                </div>

            </div>
        </div>
{{--Formatowanie wyświetlanego tesktu--}}
        @include('dodatki.formatowanie')


        <div class="row mt-4">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Ramka1:</span>
                    </div>
                    <textarea class="form-control" name="ramka1" id="ramka1" rows="3">{{$artykul->ramka1}}</textarea>
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Ramka2:</span>
                    </div>
                    <textarea class="form-control" name="ramka2" id="ramka2" rows="3">{{$artykul->ramka2}}</textarea>
                </div>

            </div>
        </div>
        <div class="row mt-3">

        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Spis treści:</span>
                    </div>
                    <textarea class="form-control" name="spis_tresci" id="spis_tresci" rows="5">{{$artykul->spis_tresci}}</textarea>
                </div>

            </div>
        </div>
        <div class="mt-4 row">
            <div class="col-7">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Motto:</span>
                    </div>
                    <input type="text" class="form-control" name="motto" id="motto" value="{{$artykul->motto}}">
                </div>
            </div>
            <div class="col-5">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Motto (podpis):</span>
                    </div>
                    <input type="text" class="form-control" name="motto_podpis" id="motto_podpis" value="{{$artykul->motto_podpis}}">
                </div>
            </div>
        </div>


<div class="mt-4 row">
    <div class="col-6">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Autor:</span>
            </div>
            <input type="text" class="form-control" name="autor" id="autor" value="{{$artykul->autor}}">
        </div>
</div>
    <div class="col-6">

</div>
</div>
        @if($artykul->galeria->count()>0)
            @include('dodatki.nazwaGalerii', ['tresc'=>$artykul])
        @endif
        @include('dodatki.seo', ['tresc'=>$artykul])

        @if(Str::length($artykul->zdjecie1)>4 || Str::length($artykul->zdjecie2)>4)
        @include('dodatki.podpisyObrazki', ['tresc'=>$artykul])
        @endif

        <div class="row mt-4">
            <div class="col-2">

                <button type="submit" name="action" value="zapisz" class="btn btn-primary">Zapisz</button>
            </div>
            <div class="col-3">
                <button type="submit" name="action" value="zapiszWyjdz" class="btn btn-primary">Zapisz i wyjdź</button>
            </div>
            <div class="col-4">
                {{--<button type="submit" name="action" value="podgladWiadomosci" class="btn btn-primary">Podgląd wiadomości</button>--}}

                <a href="http://{{config('AdminBobola.url_glowny')}}/o15ui3j5i99ew/artykul/{{$artykul->slug}}" class="btn btn-primary btn-sm" role="button" target="_blank" aria-pressed="">Podgląd artykułu

                </a>
            </div>
        </div>



    </form>


    <div class="row mt-4" >

        <div class="col-3  alert alert-dark small" >Dodano: {{$artykul->created_at->format('Y.m.d')}}</div>
        <div class="col-3  alert alert-dark small">Zmieniono: {{$artykul->updated_at->format('Y.m.d')}}</div>
    </div>

    <div class="mt-3"></div>
    {{-- Dodaj obrazki--}}
   @include('dodatki.obrazekiDwaDodaj', ['dzial'=>'Artykuly', 'tresc'=>$artykul])
    {{-- Obrazek karuzeli dodawanie--}}
    @if($artykul->strona_glowna=='tak')
        @include('dodatki.obrazekKaruzelaDodaj', ['dzial'=>'Artykuly','tresc'=>$artykul])
    @endif
    {{-- Dodaj galerie--}}
    @include('dodatki.galeriaDodaj', ['dzial'=>'Artykuly', 'tresc'=>$artykul])
    {{--Połącz z wątkiem--}}
    @include('dodatki.watekPolacz', ['dzial'=>'Artykuly', 'tresc'=>$artykul])
    {{--Dodaj plik--}}
    @include('dodatki.plikDodaj', ['dzial'=>'Artykuly', 'tresc'=>$artykul])



    {{--<div class="mt-4 mb-4"></div>--}}

{{-- przycisk usuwania widoczny tylko, gdy do wiadomośąci nie są załczone żadne wątkim zdjęcia i pliki--}}


    @if($artykul->pliki->count()==0 && $artykul->watki->count()==0 && $artykul->zdjecia->count()==0)
    <button class="btn btn-danger mb-4 mt-5" type="button" data-bs-toggle="collapse" data-bs-target="#usuwanie"
            aria-expanded="false" aria-controls="usuwanie">
        Usuwanie
    </button>
    <div class="collapse mb-3 mt-3" id="usuwanie">

        <div class="card card-body col-3 text-center">
            <form action="{{route('artykulUsun', $artykul->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń artykuł</button>


            </form>

        </div>
    </div>
    @endif


@endsection
