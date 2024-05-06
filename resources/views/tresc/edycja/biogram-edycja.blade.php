@extends('szablon.szablon')
@section('title', 'Biogram - edycja')
@section('tresc')


    <form action="{{route('biogramEdycjaZapis', $biogram->id)}}" method="POST">
        @csrf
        <div class="row mt-4">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Treść:</span>
                    </div>
                    <textarea class="form-control{{ $errors->has('tresc') ? ' is-invalid' : ' ' }}" name="tresc" id="tresc"
                              rows="6">{{$biogram->tresc}}</textarea>
                </div>

            </div>
        </div>

        <div class="row mt-3">

            <div class="col-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Kolejność:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('kolejnosc') ? ' is-invalid' : ' ' }}" name="kolejnosc" id="kolejnosc" value="{{$biogram->kolejnosc}}" >
                </div>

            </div>
        </div>
        <div class="row mt-3">
            <div class="col-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Rok/Lata:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('rok') ? ' is-invalid' : ' ' }}" name="rok" id="rok" value="{{$biogram->rok}}">
                </div>
            </div>
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Dzień i miesiąc (opcjonalnie):</span>
                    </div>
                    <input type="text" class="form-control" name="dzien_mies" id="dzien_mies" value="{{$biogram->dzien_mies}}">
                </div>
            </div>
        </div>



        <div class="row mt-5">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Zapisz</button>

            </div>

        </div>
    </form>

    <button class="btn btn-danger mt-5" type="button" data-bs-toggle="collapse" data-bs-target="#usuwanie" aria-expanded="false" aria-controls="usuwanie">
        Usuwanie
    </button>
    <div class="collapse" id="usuwanie">

        <div class="card card-body col-3 text-center mt-3">
            <form action="{{route('biogramUsun', $biogram->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń</button>


            </form>

        </div>
    </div>


    <div class="mt-3 mb-3"></div>




@endsection
