@extends('szablon.szablon')
@section('title', 'Nowa strona')
@section('tresc')

<div class="row">

</div>
    <form action="{{route('stronaNowaZapis')}}" method="POST">
        @csrf

        <div class="wys15"></div>
        <div class="row">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Tytuł:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('tytul') ? ' is-invalid' : ' ' }}" name="tytul" id="tytul" value="{{ old('tytul') }}" placeholder="Tytuł..." >
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Link:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('link') ? ' is-invalid' : ' ' }}" name="link" id="link" value="{{ old('link') }}" placeholder="Link..." >
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Opis:</span>
                    </div>
                    <textarea class="form-control" name="opis" id="opis" aria-label="opis1:">{{ old('opis') }}</textarea>
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
