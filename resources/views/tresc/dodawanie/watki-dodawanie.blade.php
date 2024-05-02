@extends('szablon.szablon')
@section('title', 'Nowy wątek')
@section('tresc')

<div class="row">

</div>
    <form action="{{route('watekNowyZapis')}}" method="POST">
        @csrf

        <div class="wys15"></div>
        <div class="row">





            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Nazwa wątku:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('tytul') ? ' is-invalid' : ' ' }}" name="tytul" id="tytul" value="{{ old('tytul') }}" placeholder="Nazwa wątku..." >
                </div>

            </div>
        </div>



        <div class="wys15"></div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </div>

        </div>
        <div class="wys15"></div>

    </form>

    </div>
</div>




@endsection
