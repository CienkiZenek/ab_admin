@extends('szablon.szablon')
@section('title', 'Strony internetowe - lista')
@section('tresc')

    <p class="badge bg-secondary fs-5">
        Lista stron internetowych
    </p>
    <div class="row mt-2">

        <div class="col-6">
            <form action="{{route('stronySzukaj')}}" method="get">
                <div class="input-group">

                    <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Szukaj</button>

                    </div></div>
            </form>
        </div>
        <div class="col-6">
            <a href="{{route('stronaNowa')}}" class="btn btn-primary" role="button" aria-pressed="true">Dodaj nową stronę</a>
        </div>
    </div>




    <div class="list-group row mt3">
    @foreach($Wyniki as $strona)

           <div class="col-8 size20"> <a href="{{ route('stronaEdycja', $strona->id) }}" class="list-group-item list-group-item-action">{{$strona->tytul}} </a>


           </div>

    @endforeach
    </div>
   @include('dodatki.paginacja')
@endsection
