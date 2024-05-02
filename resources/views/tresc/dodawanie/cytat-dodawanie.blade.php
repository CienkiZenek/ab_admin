@extends('szablon.szablon')
@section('title', '"Cytat dnia" - dodawanie')
@section('tresc')

<div class="row">

</div>
    <form action="{{route('cytatNowyZapis')}}" method="POST">
        @csrf

        <div class="row mt-4">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Podpis:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('podpis') ? ' is-invalid' : ' ' }}" name="podpis" id="podpis" value="{{ old('podpis') }}" placeholder="Podpis/Źródło cytatu..." >
                </div>

            </div>
        </div>



        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Treść:</span>
                    </div>
                    <textarea class="form-control{{ $errors->has('tresc') ? ' is-invalid' : ' ' }}" name="tresc" id="tresc" rows="5" aria-label="tresc1:">{{ old('tresc') }}</textarea>
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
