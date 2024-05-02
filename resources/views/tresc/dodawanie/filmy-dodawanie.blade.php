@extends('szablon.szablon')
@section('title', 'Nowy film')
@section('tresc')

    <form action="{{route('filmNowyZapis')}}" method="POST">
        @csrf

        <div class="row mt-1">
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Tytuł filmu:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('tytul') ? ' is-invalid' : ' ' }}" name="tytul" id="tytul" value="{{ old('tytul') }}" placeholder="Tytuł filmu..." >
                </div>

            </div>

            <div class="col-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="status1">Rodzaj filmu:</span>
                    </div>


                    <select class="form-control" id="rodzaj" name="rodzaj" aria-label="rodzaj" aria-describedby="rodzaj1">
                        <option value="Obcy" >Obcy</option>
                        <option value="Wlasny" >Własny</option>


                    </select>
                </div>

            </div>


        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Opis:</span>
                    </div>
                    <textarea class="form-control" name="opis" id="opis" aria-label="Opis filmu:">{{ old('opis') }}</textarea>
                </div>

            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Kod film:</span>
                    </div>
                    <textarea class="form-control{{ $errors->has('film_kod') ? ' is-invalid' : ' ' }}" name="film_kod" id="film_kod" aria-label="Kod Filmu:">{{ old('film_kod') }}</textarea>
                </div>
            </div>
        </div>


        <div class="row mt-5 mb-4">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </div>

        </div>


    </form>

    </div>
</div>




@endsection
