@extends('szablon.szablon')
@section('title', 'Listy do redakcji')
@section('tresc')

    <p class="badge bg-secondary fs-5">
        List do redakcji
    </p>
    <div class="row mt-2">

        <div class="col-6">
            <form action="{{route('listySzukaj')}}" method="get">
                <div class="input-group">

                    <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Szukaj</button>

                    </div></div>
            </form>
        </div>
    </div>




    <div class="list-group row mt3">
    @foreach($Wyniki as $list)

           <div class="col-12"> <a href="{{ route('listEdycja', $list->id) }}" class="list-group-item list-group-item-action">
                   @if($list->status=='Zrobic')
                       <i class="bi bi-arrows-expand-vertical fs-4 " style="color: orange" title="Robocza"></i>
                   @endif
                       @if($list->status=='Zakonczony')
                           <i class="bi bi-check-square fs-4 " style="color: forestgreen" title="Zakonczony"></i>
                       @endif
                       @if($list->status=='Nowy')
                           <i class="bi bi-arrow-90deg-right fs-4 " style="color: red" title="Nowy"></i>
                       @endif

                   {{Str::limit($list->tresc, 90)  }} </a>


           </div>

    @endforeach
    </div>
   @include('dodatki.paginacja')
@endsection
