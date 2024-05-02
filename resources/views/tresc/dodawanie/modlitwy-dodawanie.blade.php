@extends('szablon.szablon')
@section('title', 'Nowa modlitwa')
@section('tresc')

<div class="row">

</div>
    <form action="{{route('modlitwaNowaZapis')}}" method="POST">
        @csrf

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Nazwa:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('nazwa') ? ' is-invalid' : ' ' }}" name="nazwa" id="nazwa" value="{{ old('nazwa') }}" placeholder="Nazwa..." >
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
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Źródło:</span>
                    </div>
                    <input type="text" class="form-control" name="zrodlo_nazwa" id="zrodlo_nazwa" value="{{ old('zrodlo_nazwa') }}" placeholder="Źródło..." >
                </div>

            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Źródło (url):</span>
                    </div>
                    <input type="text" class="form-control" name="zrodlo_link" id="zrodlo_link" value="{{ old('zrodlo_link') }}" placeholder="Źródło (url)..." >
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
