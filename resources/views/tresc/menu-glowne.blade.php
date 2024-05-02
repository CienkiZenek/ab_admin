@extends('szablon.szablon')
@section('title', 'Panel redakcyjny - menu')
@section('tresc')



    <div class="row mt-2 mb-2" >

        <div class="col-1" >

        </div>
        <div class="col-6 bg-secondary text-white rounded-2" >
            AndrzejBobola.info - panel redakcyjny
        </div>

    </div>



    <div class="row mb-2" >
        <div class="btn-group btn-group-lg " role="group" aria-label="...">
            <a href="{{route('wiadomosciLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Wiadomości
                <span class="badge bg-warning text-white">{{\App\Models\Wiadomosci::all()->count()}}</span></a>
            {{--<span class="position-absolute top-50 start-0 translate-middle badge rounded-pill bg-warning">
   99+
  </span>--}}
            <a href="{{route('artykulyLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Artykuły
                <span class="badge bg-warning text-white">{{\App\Models\Artykuly::all()->count()}}</span>
            </a>




            <a href="{{route('zdjeciaListaDodane')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Zdjęcia
                <span class="badge bg-warning text-white">{{\App\Models\Zdjecia::all()->count()}}</span></a>
            <a href="{{route('plikiLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Pliki
                <span class="badge bg-warning text-white">{{\App\Models\Pliki::all()->count()}}</span></a>

        </div>

        </div>

        <div class="row mb-2" >
            <div class="btn-group btn-group-lg " role="group" aria-label="...">
                <a href="{{route('biogafiaLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Biografia
                    <span class="badge bg-warning text-white">{{\App\Models\Biografia::all()->count()}}</span>
                </a>

                <a href="{{route('kalendariumLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Kalendarium
                    <span class="badge bg-warning text-white">{{\App\Models\Kalendarium::all()->count()}}</span>
                </a>
                <a href="{{route('czywieszLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Czy wiesz że...
                    <span class="badge bg-warning text-white">{{\App\Models\Czywiesz::all()->count()}}</span>
                </a>
                <a href="{{route('zasobyLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Zasoby
                    <span class="badge bg-warning text-white">{{\App\Models\Zasoby::all()->count()}}</span>
                </a>


            </div>
            </div>

            <div class="row mb-2" >
            <div class="btn-group btn-group-lg " role="group" aria-label="...">
                <a href="{{route('watkiLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Wątki
                    <span class="badge bg-warning text-white">{{\App\Models\Watki::all()->count()}}</span></a>

                <a href="{{route('biogramLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Biogram
                    <span class="badge bg-warning text-white">{{\App\Models\Biogram::all()->count()}}</span>
                </a>
               {{-- <a href="{{route('stronyLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Strony
                <span class="badge bg-warning text-white">{{\App\Models\Strony::all()->count()}}</span>
                </a>--}}
                <a href="{{route('modlitwyLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Modlitwy
                    <span class="badge bg-warning text-white">{{\App\Models\Modlitwy::all()->count()}}</span>
                </a>

            </div>
            </div>

    <div class="row mb-2" >
            <div class="btn-group btn-group-lg " role="group" aria-label="...">
                <a href="{{route('cytatLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Cytat dnia
                    <span class="badge bg-warning text-white">{{\App\Models\Cytat::all()->count()}}</span>
                </a>
                <a href="{{route('filmyLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Filmy
                    <span class="badge bg-warning text-white">{{\App\Models\Filmy::all()->count()}}</span>
                </a>
                <a href="{{route('ksiegarnieLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Książka - gdzie kupić
                    <span class="badge bg-warning text-white">{{\App\Models\Ksiegarnie::all()->count()}}</span>
                </a>



            </div>
            </div>
    <div class="row mb-2" >
        <div class="btn-group btn-group-lg " role="group" aria-label="...">
            <a href="{{route('intencjeLista')}}"  class="btn btn-primary btn-sm" role="button" aria-pressed="">Intencje i świadectwa
                <span class="badge bg-danger text-white">{{\App\Models\Intencje::where('status','Nowa')->count()}}</span>
            </a>
            <a href="{{route('listyLista')}}"  class="btn btn-primary btn-sm" role="button" aria-pressed="">Listy
                <span class="badge bg-danger text-white">{{\App\Models\Listy::where('status','Nowy')->count()}}</span>/<span class="badge bg-info text-dark">{{\App\Models\Listy::where('status','Zrobic')->count()}}</span>
            </a>


        </div>
    </div>

        </div>
<div class="wys40"></div>
<div class="wys40"></div>
<div class="wys40"></div>
<div class="wys40"></div>
<div class="wys40"></div>









@endsection
