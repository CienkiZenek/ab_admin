@extends('szablon.szablon')
@section('title', 'Biogram - nowa pozycja')
@section('tresc')

<div class="row">

</div>
    <form action="{{route('biogramNowyZapis')}}" method="POST">
        @csrf
        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Treść:</span>
                    </div>
                    <textarea class="form-control{{ $errors->has('tresc') ? ' is-invalid' : ' ' }}"  rows="10" name="tresc" id="tresc" aria-label="opis1:">{{ old('tresc') }}</textarea>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Kolejność:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('kolejnosc') ? ' is-invalid' : ' ' }}" name="kolejnosc" id="kolejnosc" value="{{ old('kolejnosc') }}" placeholder="Numer porządkowania..." >
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Rok/Lata:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('rok') ? ' is-invalid' : ' ' }}" name="rok" id="rok" value="{{ old('rok') }}" placeholder="Rok..." >
                </div>
            </div>

            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Dzień i miesiąc (opcjonalnie):</span>
                    </div>
                    <input type="text" class="form-control" name="dzien_mies" id="dzien_mies" value="{{ old('dzien_mies') }}" placeholder="Dzień i miesiąc..." >
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </div>

        </div>
        <div class="mb-4"></div>

    </form>

    </div>
</div>




@endsection
