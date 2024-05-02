@extends('szablon.szablon')
@section('title', 'Filmy - lista')
@section('tresc')

    <p class="badge bg-secondary fs-5">
        Lista filmów
    </p>
    <div class="row mt-2">

        <div class="col-6">
            <form action="{{route('filmySzukaj')}}" method="get">
                <div class="input-group">

                    <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Szukaj</button>

                    </div></div>
            </form>
        </div>
        <div class="col-6">
            <a href="{{route('filmNowy')}}" class="btn btn-primary" role="button" aria-pressed="true">Dodaj nowy film</a>
        </div>
    </div>




    <div class="list-group row mt3">
    @foreach($Wyniki as $film)

           <div class="col-8 size20"> <a href="{{ route('filmEdycja', $film->id) }}" class="list-group-item list-group-item-action">{{$film->tytul  }}
                   @if($film->title=='' || $film->keywords=='' || $film->description=='')
                       <span style="color: red; font-weight: bold"> SEO!!! </span>
                   @endif</a>


           </div>

    @endforeach
    </div>
   @include('dodatki.paginacja')
@endsection
