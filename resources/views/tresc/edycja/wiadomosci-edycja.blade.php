@extends('szablon.szablon')
@section('title', 'Wiadomość - edycja')
@section('tresc')

    <form action="{{route('wiadomoscEdycjaZapis', $wiadomosc->id)}}" method="POST">
        @csrf


       <div class="row">
            <div class="col-4">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="rodzaj">Status:</span>
                    </div>
                    <select class="form-control" id="status" name="status" aria-label="status"
                            aria-describedby="status">
                        <option value="Robocza" @if($wiadomosc->status=='Robocza') selected @endif>Robocza</option>
                        <option value="Opublikowana" @if($wiadomosc->status=='Opublikowana') selected @endif>
                            Opublikowana
                        </option>
                        <option value="Zawieszona" @if($wiadomosc->status=='Zawieszona') selected @endif>Zawieszona
                        </option>
                        <option value="Archiwum" @if($wiadomosc->status=='Archiwum') selected @endif>Archiwum</option>

                    </select>
                </div>
            </div>

            <div class="col-4">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="rodzaj">Rodzaj:</span>
                    </div>
                    <select class="form-control" id="rodzaj" name="rodzaj" aria-label="rodzaj"
                            aria-describedby="status">
                        <option value="Wiadomosc" @if($wiadomosc->rodzaj=='Wiadomosc') selected @endif>Wiadomość</option>
                        <option value="Wydarzenie" @if($wiadomosc->rodzaj=='Wydarzenie') selected @endif>Wydarzenie</option>
                        <option value="Strona" @if($wiadomosc->rodzaj=='Strona') selected @endif>
                            Strona
                        </option>
                        <option value="Ogloszenie" @if($wiadomosc->rodzaj=='Ogloszenie') selected @endif>Ogłoszenie
                        </option>
                        <option value="Inna" @if($wiadomosc->rodzaj=='Inna') selected @endif>Inna</option>

                    </select>
                </div>



            </div>

            <div class="col-4">


                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Data:</span>
                    </div>
                    <input type="text" class="form-control" name="data" id="data" value="{{$wiadomosc->data}}"  >
                </div>


            </div>





            </div>
        <div class="row mt-4">
            <div class="col-4">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="rodzaj">Na stronie głównej:</span>
                    </div>
                    <select class="form-control" id="strona_glowna" name="strona_glowna" aria-label="strona_glowna"
                            aria-describedby="status">
                        <option value="tak" @if($wiadomosc->strona_glowna=='tak') selected @endif>Tak</option>
                        <option value="nie" @if($wiadomosc->strona_glowna=='nie') selected @endif>Nie</option>


                    </select>
                </div>


            </div>
            <div class="col-4">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="rodzaj">"Przyklejona":</span>
                    </div>
                    <select class="form-control" id="przyklejona" name="przyklejona" aria-label="przyklejona"
                            aria-describedby="status">
                        <option value="tak" @if($wiadomosc->przyklejona=='tak') selected @endif>Tak</option>
                        <option value="nie" @if($wiadomosc->przyklejona=='nie') selected @endif>Nie</option>


                    </select>
                </div>


            </div>

            </div>


            <div class="row mt-4">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Tytuł:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('tytul') ? ' is-invalid' : '' }}" name="tytul" id="tytul" value="{{$wiadomosc->tytul}}">
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
                              rows="3">{{$wiadomosc->naglowek}}</textarea>
                </div>

            </div>
        </div>

        <div class="row mt-4 mb-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Treść:</span>
                    </div>
                    <textarea class="form-control" name="tresc" id="tresc" rows="16">{{$wiadomosc->tresc}}</textarea>
                </div>

            </div>
        </div>
{{--Formatowanie wyświetlanego tesktu--}}
        @include('dodatki.formatowanie')

        <div class="row mt-3">
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Film (embed):</span>
                    </div>
                    <textarea class="form-control" name="film" id="film" rows="4">{{$wiadomosc->film}}</textarea>
                </div>

            </div>

            <div class="col-6">
                @if(Str::length($wiadomosc->film)>5)
                <div class="ratio ratio-16x9">
                    <iframe
                        src="{!! $wiadomosc->film !!}"
                        title=""
                        allowfullscreen
                    ></iframe>
                </div>
                @endif

            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Film (podpis):</span>
                    </div>
                    <textarea class="form-control" name="film_podpis" id="film_podpis"
                              rows="1">{{$wiadomosc->film_podpis}}</textarea>
                </div>

            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Ramka1:</span>
                    </div>
                    <textarea class="form-control" name="ramka1" id="ramka1" rows="3">{{$wiadomosc->ramka1}}</textarea>
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Ramka2:</span>
                    </div>
                    <textarea class="form-control" name="ramka2" id="ramka2" rows="3">{{$wiadomosc->ramka2}}</textarea>
                </div>

            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Komentarz:</span>
                    </div>
                    <textarea class="form-control" name="komentarz" id="komentarz" rows="3">{{$wiadomosc->komentarz}}</textarea>
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Link (treść):</span>
                    </div>
                    <input type="text" class="form-control" name="link_tresc" id="link_tresc" value="{{$wiadomosc->link_tresc}}">
                </div>
            </div>
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Link (adres):</span>
                    </div>
                    <input type="text" class="form-control" name="link_url" id="link_url" value="{{$wiadomosc->link_url}}">
                </div>
            </div>
            </div>


<div class="mt-4 row">
    <div class="col-6">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Autor:</span>
            </div>
            <input type="text" class="form-control" name="autor" id="autor" value="{{$wiadomosc->autor}}">
        </div>
</div>
    <div class="col-6">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Źródlo:</span>
            </div>
            <input type="text" class="form-control" name="zrodlo" id="zrodlo" value="{{$wiadomosc->zrodlo}}">
        </div>
    </div>
</div>

        @include('dodatki.seo', ['tresc'=>$wiadomosc])

        @if(Str::length($wiadomosc->zdjecie1)>4 || Str::length($wiadomosc->zdjecie2)>4)
        @include('dodatki.podpisyObrazki', ['tresc'=>$wiadomosc])
        @endif

        <div class="row mt-4">
            <div class="col-2">

                <button type="submit" name="action" value="zapisz" class="btn btn-primary">Zapisz</button>
            </div>
            <div class="col-3">
                <button type="submit" name="action" value="zapiszWyjdz" class="btn btn-primary">Zapisz i wyjdź</button>
            </div>
            <div class="col-4">    {{--<button type="submit" name="action" value="podgladWiadomosci" class="btn btn-primary">Podgląd wiadomości</button>--}}

                <a href="http://{{config('AdminBobola.url_glowny')}}/o15ui3j5i99ew/wiadomosc/{{$wiadomosc->slug}}" class="btn btn-primary btn-sm" role="button" target="_blank" aria-pressed="">Podgląd wiadomości

                </a>
            </div>
        </div>



    </form>
    <div class="row mt-4" >

        <div class="col-3  alert alert-dark small" >Dodano: {{$wiadomosc->created_at->format('Y.m.d')}}</div>
        <div class="col-3  alert alert-dark small">Zmieniono: {{$wiadomosc->updated_at->format('Y.m.d')}}</div>
    </div>

    <div class="mt-3"></div>
    {{-- Dodaj obrazki--}}
   @include('dodatki.obrazekiDwaDodaj', ['dzial'=>'Wiadomosci', 'tresc'=>$wiadomosc])
    {{-- Dodaj galerie--}}
    @include('dodatki.galeriaDodaj', ['dzial'=>'Wiadomosci', 'tresc'=>$wiadomosc])
    {{--Połącz z wątkiem--}}
    @include('dodatki.watekPolacz', ['dzial'=>'Wiadomosci', 'tresc'=>$wiadomosc])
    {{--Dodaj plik--}}
    @include('dodatki.plikDodaj', ['dzial'=>'Wiadomosci', 'tresc'=>$wiadomosc])



    {{--<div class="mt-4 mb-4"></div>--}}

{{-- przycisk usuwania widoczny tylko, gdy do wiadomośąci nie są załczone żadne wątkim zdjęcia i pliki--}}


    @if($wiadomosc->pliki->count()==0 && $wiadomosc->watki->count()==0 && $wiadomosc->zdjecia->count()==0)
    <button class="btn btn-danger mb-4 mt-5" type="button" data-bs-toggle="collapse" data-bs-target="#usuwanie"
            aria-expanded="false" aria-controls="usuwanie">
        Usuwanie
    </button>
    <div class="collapse mb-3" id="usuwanie">
        <div class="wys20"></div>
        <div class="card card-body col-3 text-center">
            <form action="{{route('wiadomoscUsun', $wiadomosc->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń wiadomość</button>


            </form>

        </div>
    </div>
    @endif


@endsection
