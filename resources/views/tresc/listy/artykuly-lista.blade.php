@extends('szablon.szablon')
@section('title', 'Artykuły - lista')
@section('tresc')

    <p class="badge bg-secondary fs-5">
        Lista artykułów (wszystkich: {{\App\Models\Artykuly::all()->count()}}, opublikowanych:
        {{\App\Models\Artykuly::where('status','Opublikowany')->count()}},
        roboczych: {{\App\Models\Artykuly::where('status','Roboczy')->count()}}):
    </p>
    <div class="row mt-2">

        <div class="col-6">
            <form action="{{route('artykulySzukaj')}}" method="get">
                <div class="input-group">

                    <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Szukaj</button>

                    </div></div>
            </form>
        </div>
        <div class="col-6">
            <a href="{{route('artykulNowy')}}" class="btn btn-primary" role="button" aria-pressed="true">Dodaj nowy artykuł</a>
        </div>
    </div>




    <div class="list-group row mt3">
    @foreach($Wyniki as $artykul)

           <div class="col-12 size20"> <a href="{{ route('artykulEdycja', $artykul->slug) }}" class="list-group-item list-group-item-action">


                   @if($artykul->status=='Roboczy')
                       <i class="bi  bi-pencil-square fs-3 " style="color: #bb2d3b" title="Roboczy"></i>
                   @endif
                       @if($artykul->status=='Opublikowany')
                           <i class="bi bi-check-square fs-4 " style="color: forestgreen" title="Opublikowany"></i>
                       @endif



                   {{$artykul->tytul  }}
 ({{$artykul->data}}), <span class="text-success" title="Rodzaj wiadomości:">{{$artykul->rodzaj}}</span>

                       @if(Str::length($artykul->zdjecie1)>4)
                           <i class="bi bi-image fs-4" style="color: forestgreen" title="Zdjęcie1"></i>
                       @endif
                   @if($artykul->strona_glowna=='tak')
                   <i class="bi bi-window-split fs-4 " style="color: red" title="Na stronie głównej"></i>
                   @endif

                   @if(Str::length($artykul->zdjecie2)>4)
                   <i class="bi bi-image fs-4" style="color: #d63384" title="Zdjęcie2 na głównej!"></i>
                   @endif

                       @if($artykul->title=='' || $artykul->keywords=='' || $artykul->description=='')
                           <span style="color: red; font-weight: bold"> SEO!!! </span>
                       @endif
               </a>
           </div>

    @endforeach
    </div>
   @include('dodatki.paginacja')
@endsection

