@extends('szablon.szablon')
@section('title', 'Biogram - pozycje')
@section('tresc')

    <p class="badge bg-secondary fs-5">
        Biogram - lista pozycji
    </p>
    <div class="row mt-2">

        <div class="col-6">
            <form action="{{route('biogramSzukaj')}}" method="get">
                <div class="input-group">

                    <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Szukaj</button>

                    </div></div>
            </form>
        </div>
        <div class="col-6">
            <a href="{{route('biogramNowy')}}" class="btn btn-primary" role="button" aria-pressed="true">Dodaj nową pozycję</a>
        </div>
    </div>




    <div class="list-group row mt3">
    @foreach($Wyniki as $biogram)

           <div class="col-12 size20"> <a href="{{ route('biogramEdycja', $biogram->id) }}" class="list-group-item list-group-item-action">({{$biogram->kolejnosc}})
                   <strong>{{$biogram->rok}}</strong>, <strong>{{$biogram->dzien_mies}}</strong> {{Str::limit($biogram->tresc, 70)}} </a>


           </div>

    @endforeach
    </div>
   @include('dodatki.paginacja')
@endsection
