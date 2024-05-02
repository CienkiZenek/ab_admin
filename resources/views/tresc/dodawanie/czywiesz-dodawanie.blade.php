@extends('szablon.szablon')
@section('title', '"Czy wiesz, że..." - dodawanie')
@section('tresc')

<div class="row">

</div>
    <form action="{{route('czywieszNoweZapis')}}" method="POST">
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
                        <span class="input-group-text" >Treść:</span>
                    </div>
                    <textarea class="form-control{{ $errors->has('tresc') ? ' is-invalid' : ' ' }}" name="tresc" id="tresc" aria-label="tresc1:">{{ old('tresc') }}</textarea>
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
