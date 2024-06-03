@extends('szablon.szablon')
@section('title', 'Intencje i świadectwa')
@section('tresc')

    <p class="badge bg-secondary fs-5">
        Intencje i świadectwa
    </p>
    <div class="row mt-2">

        <div class="col-6">
            <form action="{{route('intencjeSzukaj')}}" method="get">
                <div class="input-group">

                    <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Szukaj</button>

                    </div></div>
            </form>
        </div>
    </div>




    <div class="list-group row mt3">
    @foreach($Wyniki as $intencja)

           <div class="col-12"> <a href="{{ route('intencjaEdycja', $intencja->id) }}" class="list-group-item list-group-item-action">
                   @if($intencja->status=='Archiwum')
                       <i class="bi bi-window-stack fs-4" style="color: orange" title="Archiwum"></i>
                   @endif
                       @if($intencja->status=='Opublikowana')
                           <i class="bi bi-check-square fs-4" style="color: forestgreen" title="Opublikowana"></i>
                       @endif
                       @if($intencja->status=='Nowa')
                           <i class="bi bi-arrow-90deg-right fs-4" style="color: red" title="Nowa"></i>
                       @endif

                   {{Str::limit($intencja->tresc_nadeslana, 90)  }} </a>


           </div>

    @endforeach
    </div>
   @include('dodatki.paginacja')
@endsection
