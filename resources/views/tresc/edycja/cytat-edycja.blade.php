@extends('szablon.szablon')
@section('title', '"Cytat dnia" - edycja')
@section('tresc')


    <form action="{{route('cytatEdycjaZapis', $cytat->id)}}" method="POST">
        @csrf

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Podpis:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('podpis') ? ' is-invalid' : ' ' }}" name="podpis" id="podpis" value="{{$cytat->podpis}}" >
                </div>

            </div>
        </div>


        <div class="row mt-4">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Treść:</span>
                    </div>
                    <textarea class="form-control{{ $errors->has('tresc') ? ' is-invalid' : ' ' }}" name="tresc" id="tresc"
                              rows="6">{{$cytat->tresc}}</textarea>
                </div>

            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Zapisz</button>

            </div>

        </div>
    </form>

<div class="mt-4"></div>

    <button class="btn btn-danger mt-5" type="button" data-bs-toggle="collapse" data-bs-target="#usuwanie" aria-expanded="false" aria-controls="usuwanie">
        Usuwanie
    </button>
    <div class="collapse" id="usuwanie">

        <div class="card card-body col-3 text-center mt-3">
            <form action="{{route('cytatUsun', $cytat->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń</button>


            </form>

        </div>
    </div>


    <div class="mt-3 mb-3"></div>




@endsection
