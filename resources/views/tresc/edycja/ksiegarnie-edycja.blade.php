@extends('szablon.szablon')
@section('title', 'Księgarnie internetowe - edycja')
@section('tresc')


    <form action="{{route('ksiegarniaEdycjaZapis', $ksiegarnia->id)}}" method="POST">
        @csrf

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Nazwa księgarnii:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('nazwa') ? 'is-invalid' : ' ' }}" name="nazwa" id="nazwa" value="{{$ksiegarnia->nazwa}}" >
                </div>

            </div>
        </div>

        <div class="row mt-3">

            <div class="col-9">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Link (url):</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('link') ? 'is-invalid' : ' ' }}" name="link" id="link" value="{{$ksiegarnia->link}}" >
                </div>

            </div>

            <div class="col-3">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="rodzaj">Dostępna:</span>
                    </div>
                    <select class="form-control" id="dostepna" name="dostepna" aria-label="dostepna"
                            aria-describedby="dostepna">
                        <option value="tak" @if($ksiegarnia->dostepna=='tak') selected @endif>Tak</option>
                        <option value="nie" @if($ksiegarnia->dostepna=='nie') selected @endif>Nie</option>


                    </select>
                </div>


            </div>
        </div>


        <div class="row mt-4">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Opis:</span>
                    </div>
                    <textarea class="form-control" name="opis" id="opis"
                              rows="6">{{$ksiegarnia->opis}}</textarea>
                </div>

            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Zapisz</button>

            </div>

        </div>
    </form>


    <button class="btn btn-danger mt-4" type="button" data-bs-toggle="collapse" data-bs-target="#usuwanie" aria-expanded="false" aria-controls="usuwanie">
        Usuwanie
    </button>
    <div class="collapse" id="usuwanie">

        <div class="card card-body col-3 text-center mt-3">
            <form action="{{route('ksiegarniaUsun', $ksiegarnia->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń</button>


            </form>

        </div>
    </div>


    <div class="mt-4 mb-3"></div>




@endsection
