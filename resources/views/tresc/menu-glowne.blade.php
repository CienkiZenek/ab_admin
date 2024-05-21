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

            <a href="{{route('wiadomosciLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Aktualności
                <span class="badge bg-warning text-white" title="Wszystkie">{{\App\Models\Wiadomosci::all()->count()}}</span>/<span class="badge bg-danger text-white" title="Robocze">{{\App\Models\Wiadomosci::where('status','Robocza')->count()}}</span>
            </a>
            <a href="{{route('artykulyLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Artykuły
                <span class="badge bg-warning text-white" title="Wszystkie">{{\App\Models\Artykuly::all()->count()}}</span>/<span class="badge bg-danger text-white" title="Robocze">{{\App\Models\Artykuly::where('status','Roboczy')->count()}}</span>
            </a>

            <a href="{{route('zasobyLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Zdjęcia, dokumenty, książki
                <span class="badge bg-warning text-white" title="Wszystkie">{{\App\Models\Zasoby::all()->count()}}</span>
            </a>
        </div>
        </div>



    <div class="row mb-2" >
        <div class="btn-group btn-group-lg " role="group" aria-label="...">

            <a href="{{route('czywieszLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Czy wiesz że...?
                <span class="badge bg-warning text-white" title="Wszystkie">{{\App\Models\Czywiesz::all()->count()}}</span>
            </a>
            <a href="{{route('cytatLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Cytat dnia
                <span class="badge bg-warning text-white" title="Wszystkie">{{\App\Models\Cytat::all()->count()}}</span>
            </a>

        </div>
    </div>

    <div class="row mb-2" >
        <div class="btn-group btn-group-lg " role="group" aria-label="...">



            <a href="{{route('kalendariumLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Kalendarium
                <span class="badge bg-warning text-white" title="Wszystkie">{{\App\Models\Kalendarium::all()->count()}}</span>
            </a>
            <a href="{{route('modlitwyLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Modlitwy
                <span class="badge bg-warning text-white" title="Wszystkie">{{\App\Models\Modlitwy::all()->count()}}</span>
            </a>
            <a href="{{route('filmyLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Filmy
                <span class="badge bg-warning text-white" title="Wszystkie">{{\App\Models\Filmy::all()->count()}}</span>
            </a>
        </div>
    </div>


    <div class="row mb-2" >
        <div class="btn-group btn-group-lg " role="group" aria-label="...">
            <a href="{{route('zdjeciaListaDodane')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Zdjęcia (biblioteka)
                <span class="badge bg-warning text-white" title="Wszystkie">{{\App\Models\Zdjecia::all()->count()}}</span></a>
            <a href="{{route('plikiLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Pliki (biblioteka)
                <span class="badge bg-warning text-white" title="Wszystkie">{{\App\Models\Pliki::all()->count()}}</span></a>
        </div>
    </div>
            <div class="row mb-2" >
            <div class="btn-group btn-group-lg " role="group" aria-label="...">

                <a href="{{route('biogramLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Biogram
                    <span class="badge bg-warning text-white"v>{{\App\Models\Biogram::all()->count()}}</span>
                </a>
                <a href="{{route('watkiLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Wątki
                    <span class="badge bg-warning text-white" title="Wszystkie">{{\App\Models\Watki::all()->count()}}</span></a>
            </div>
            </div>
    <div class="row mb-2" >
        <div class="btn-group btn-group-lg " role="group" aria-label="...">
            <a href="{{route('intencjeLista')}}"  class="btn btn-primary btn-sm" role="button" aria-pressed="">Intencje i świadectwa
                <span class="badge bg-warning text-white" title="Wszystkie">{{\App\Models\Intencje::all()->count()}}</span>/<span class="badge bg-danger text-white" title="Nowe">{{\App\Models\Intencje::where('status','Nowa')->count()}}</span>
            </a>
            <a href="{{route('listyLista')}}"  class="btn btn-primary btn-sm" role="button" aria-pressed="">Listy
                <span class="badge bg-danger text-white" title="Nowe">{{\App\Models\Listy::where('status','Nowy')->count()}}</span>/<span class="badge bg-info text-dark" title="Zrobić">{{\App\Models\Listy::where('status','Zrobic')->count()}}</span>
            </a>


        </div>
    </div>

    {{--<div class="row mb-2" >
        <div class="btn-group btn-group-lg " role="group" aria-label="...">
            <a href="{{route('biogafiaLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Biografia
                <span class="badge bg-warning text-white">{{\App\Models\Biografia::all()->count()}}</span>
            </a>
        </div>
    </div>--}}


        </div>










@endsection
