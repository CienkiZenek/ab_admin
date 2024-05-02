@extends('szablon.szablon')
@section('title', 'Nowy artykuł')
@section('tresc')

<div class="row">

</div>
    <form action="{{route('artykulNowyZapis')}}" method="POST">
        @csrf

        <div class="row mt-4">
<div class="col-4">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="status1">Status:</span>
        </div>


        <select class="form-control" id="status" name="status" aria-label="status" aria-describedby="status1">
            <option value="Roboczy" >Roboczy</option>
            <option value="Opublikowany" >Opublikowany</option>


        </select>
    </div>
    <input type="hidden" name="strona_glowna" value="nie" />
    <input type="hidden" name="data" value="{{date("Y-m-d")}}" />


</div>
            <div class="col-4">


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
            <div class="col-7">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Motto:</span>
                    </div>
                    <input type="text" class="form-control" name="motto" id="motto" value="{{ old('motto') }}" placeholder="Motto..." >
                </div>
            </div>
            <div class="col-5">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Motto (podpis):</span>
                    </div>
                    <input type="text" class="form-control" name="motto_podpis" id="motto_podpis" value="{{ old('motto_podpis') }}" placeholder="Motto (podpis)..." >
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
