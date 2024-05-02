@extends('szablon.szablon')
@section('title', 'Modlitwy - lista')
@section('tresc')

    <p class="badge bg-secondary fs-5">
        Lista modlitw
    </p>
    <div class="row mt-2">

        <div class="col-6">
            <form action="{{route('modlitwySzukaj')}}" method="get">
                <div class="input-group">

                    <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Szukaj</button>

                    </div></div>
            </form>
        </div>
        <div class="col-6">
            <a href="{{route('modlitwaNowa')}}" class="btn btn-primary" role="button" aria-pressed="true">Dodaj nową modlitwę</a>
        </div>
    </div>




    <div class="list-group row mt3">
    @foreach($Wyniki as $modlitwa)

           <div class="col-8 size20"> <a href="{{ route('modlitwyEdycja', $modlitwa->id) }}" class="list-group-item list-group-item-action">{{$modlitwa->nazwa}}

                   @if(Str::length($modlitwa->zdjecie1)>4)
                       <i class="bi bi-image fs-4" style="color: forestgreen" title="Zdjęcie1"></i>
                   @endif
                   @if($modlitwa->strona_glowna=='tak')
                       <i class="bi bi-window-split fs-4 " style="color: red" title="Na stronie głównej"></i>
                   @endif

                   @if(Str::length($modlitwa->zdjecie2)>4)
                       <i class="bi bi-image fs-4" style="color: #d63384" title="Zdjęcie2 na głównej!"></i>
                   @endif

                   @if($modlitwa->title=='' || $modlitwa->keywords=='' || $modlitwa->description=='')
                       <span style="color: red; font-weight: bold"> SEO!!! </span>
                   @endif
               </a>


           </div>

    @endforeach
    </div>
   @include('dodatki.paginacja')
@endsection
