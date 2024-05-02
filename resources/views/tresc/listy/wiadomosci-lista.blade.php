@extends('szablon.szablon')
@section('title', 'Wiadomości - lista')
@section('tresc')

    <p class="badge bg-secondary fs-5">
        Lista wiadomosci (wszystkich: {{\App\Models\Wiadomosci::all()->count()}}, opublikowanych:
        {{\App\Models\Wiadomosci::where('status','Opublikowana')->count()}},
        roboczych: {{\App\Models\Wiadomosci::where('status','Robocza')->count()}}):
    </p>
    <div class="row mt-2">

        <div class="col-6">
            <form action="{{route('wiadomosciSzukaj')}}" method="get">
                <div class="input-group">

                    <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Szukaj</button>

                    </div></div>
            </form>
        </div>
        <div class="col-6">
            <a href="{{route('wiadomoscNowa')}}" class="btn btn-primary" role="button" aria-pressed="true">Dodaj nową wiadomość</a>
        </div>
    </div>




    <div class="list-group row mt3">
    @foreach($Wyniki as $wiadomosc)

           <div class="col-12 size20"> <a href="{{ route('wiadomoscEdycja', $wiadomosc->slug) }}" class="list-group-item list-group-item-action">


                   @if($wiadomosc->status=='Robocza')
                       <i class="bi  bi-pencil-square fs-3 " style="color: #bb2d3b" title="Robocza"></i>
                   @endif
                       @if($wiadomosc->status=='Opublikowana')
                           <i class="bi bi-check-square fs-4 " style="color: forestgreen" title="Opublikowana"></i>
                       @endif
                       @if($wiadomosc->przyklejona=='tak')
                           <i class="bi bi-pin-angle-fill fs-4 text-warning" style="color: forestgreen" title="Przyklejona"></i>
                       @endif


                   {{$wiadomosc->tytul  }}
 ({{$wiadomosc->data}}), <span class="text-success" title="Rodzaj wiadomości:">{{$wiadomosc->rodzaj}}</span>

                       @if(Str::length($wiadomosc->zdjecie1)>4)
                           <i class="bi bi-image fs-4" style="color: forestgreen" title="Zdjęcie1"></i>
                       @endif
                   @if($wiadomosc->strona_glowna=='tak')
                   <i class="bi bi-window-split fs-4 " style="color: red" title="Na stronie głównej"></i>
                   @endif

                   @if(Str::length($wiadomosc->zdjecie2)>4)
                   <i class="bi bi-image fs-4" style="color: #d63384" title="Zdjęcie2 na głównej!"></i>
                   @endif

                       @if($wiadomosc->title=='' || $wiadomosc->keywords=='' || $wiadomosc->description=='')
                           <span style="color: red; font-weight: bold"> SEO!!! </span>
                       @endif
               </a>
           </div>

    @endforeach
    </div>
   @include('dodatki.paginacja')
@endsection

