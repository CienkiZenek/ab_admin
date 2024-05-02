@extends('szablon.szablon')
@section('title', 'Nowa wiadomość')
@section('tresc')

<div class="row">

</div>
    <form action="{{route('wiadomoscNowaZapis')}}" method="POST">
        @csrf

        <div class="row mt-4">
<div class="col-4">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="status1">Status:</span>
        </div>


        <select class="form-control" id="status" name="status" aria-label="status" aria-describedby="status1">
            <option value="Robocza" >Robocza</option>
            <option value="Opublikowana" >Opublikowana</option>
            <option value="Zawieszona" >Zawieszona</option>
            <option value="Archiwum" >Archiwum</option>

        </select>
    </div>
    <input type="hidden" name="strona_glowna" value="nie" />
    <input type="hidden" name="data" value="{{date("Y-m-d")}}" />


</div>
            <div class="col-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="status1">Rodzaj:</span>
                    </div>


                    <select class="form-control" id="rodzaj" name="rodzaj" aria-label="rodzaj" aria-describedby="rodzaj1">
                        <option value="Wiadomosc" >Wiadomość</option>
                        <option value="Wydarzenie" >Wydarzenie</option>
                        <option value="Strona" >Strona</option>
                        <option value="Ogloszenie" >Ogłoszenie</option>
                        <option value="Inna" >Inna</option>

                    </select>
                </div>

            </div>


            <div class="col-4">


                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >Data:</span>
                        </div>
                        <input type="text" class="form-control" name="data" id="data" value="{{ Today()->format('Y-m-d') }}"  >
                    </div>


        </div>

        </div>


        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Tytuł:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('tytul') ? ' is-invalid' : '' }}" name="tytul" id="tytul" value="{{ old('tytul') }}" placeholder="Tytuł..." >
                </div>
            </div>
        </div>


        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Nagłówek:</span>
                    </div>
                    <textarea class="form-control" name="naglowek" id="naglowek" aria-label="Nagłówek:">{{ old('naglowek') }}</textarea>
                </div>

            </div>
        </div>


        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Treść:</span>
                    </div>
                    <textarea class="form-control" rows="10" name="tresc" id="tresc" aria-label="Treść:">{{ old('trec') }}</textarea>
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Film:</span>
                    </div>
                    <textarea class="form-control" name="ramka1" id="ramka1" aria-label="Ramka 1:">{{ old('film') }}</textarea>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Film - podpis:</span>
                    </div>
                    <input type="text" class="form-control" name="film_podpis" id="film_podpis" value="{{ old('film_podpis') }}" placeholder="Film - podpis/opis..." >
                </div>
            </div>
        </div>





        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Ramka 1:</span>
                    </div>
                    <textarea class="form-control" name="ramka1" id="ramka1" aria-label="Ramka 1:">{{ old('ramka1') }}</textarea>
                </div>

            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Ramka 2:</span>
                    </div>
                    <textarea class="form-control" name="ramka2" id="ramka2" aria-label="Ramka 2:">{{ old('ramka2') }}</textarea>
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Link (treść):</span>
                    </div>
                    <input type="text" class="form-control" name="link_tresc" id="link_tresc" value="{{ old('link_tresc') }}" placeholder="Treść linku..." >
                </div>
            </div>

            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Link (adres):</span>
                    </div>
                    <input type="text" class="form-control" name="link_url" id="link_url" value="{{ old('link_url') }}" placeholder="Adres linku..." >
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-7">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Autor:</span>
                    </div>
                    <input type="text" class="form-control" name="autor" id="autor" value="{{ old('autor') }}" placeholder="Autor..." >
                </div>
            </div>
        </div>


        <div class="row mt-3">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </div>

        </div>
        <div class="wys40"></div>

    </form>

    </div>
</div>




@endsection
