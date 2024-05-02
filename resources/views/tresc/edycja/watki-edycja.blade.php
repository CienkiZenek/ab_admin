@extends('szablon.szablon')
@section('title', 'Wątki - edycja')
@section('tresc')


    <form action="{{route('watekEdycjaZapis', $watek->id)}}" method="POST">
        @csrf

        <div class="row mt-5">


            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Wątek:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('tytul') ? 'is-invalid' : ' ' }}" name="tytul" id="tytul" value="{{$watek->tytul}}" >
                </div>

            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Aktualizuj</button>

            </div>

        </div>
    </form>

    <div class="wys40"></div>
    <div class="wys40"></div>

    @if($watek->wiadomosc->count()==0)
    <button class="btn btn-danger mt-5" type="button" data-bs-toggle="collapse" data-bs-target="#usuwanie" aria-expanded="false" aria-controls="usuwanie">
        Usuwanie
    </button>
    <div class="collapse" id="usuwanie">
        <div class="wys20"></div>
        <div class="card card-body col-3 text-center">
            <form action="{{route('watekUsun', $watek->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń wątek</button>


            </form>

        </div>
    </div>


    <div class="wys20 mb-3"></div>

    @endif


@endsection
