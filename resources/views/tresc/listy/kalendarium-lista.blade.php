@extends('szablon.szablon')
@section('title', 'kalendarium')
@section('tresc')

    <p class="badge bg-secondary fs-5">
        Kalendarium - lista pozycji
    </p>
    <div class="row mt-2 mb-3">

        <div class="col-6">
            <form action="{{route('kalendariumSzukaj')}}" method="get">
                <div class="input-group">

                    <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Szukaj</button>

                    </div></div>
            </form>
        </div>
        <div class="col-6">
            <a href="{{route('kalendariumNowe')}}" class="btn btn-primary" role="button" aria-pressed="true">Dodaj nową pozycję w kalendarium</a>
        </div>
    </div>
    <div class="row mt-3 mb-3">


        <div class="col-5">
            <form action="{{route('kalendariumPokazMiesiac')}}" method="get">
            <div class="input-group">
                <div class="input-group-prepend">

                    <span class="form-control" id="mies1">Pokaż dla miesiąca:</span>
                </div>


                <select class="form-control" id="mies" name="mies" aria-label="mies" aria-describedby="mies1">
                    <option value="1" @if(request()->get('mies')=='1') selected @endif>Styczeń</option>
                    <option value="2" @if(request()->get('mies')=='2') selected @endif >Luty</option>
                    <option value="3" @if(request()->get('mies')=='3') selected @endif >Marzec</option>
                    <option value="4" @if(request()->get('mies')=='4') selected @endif>Kwiecień</option>
                    <option value="5" @if(request()->get('mies')=='5') selected @endif >Maj</option>
                    <option value="6" @if(request()->get('mies')=='6') selected @endif >Czerwiec</option>
                    <option value="7" @if(request()->get('mies')=='7') selected @endif >Lipiec</option>
                    <option value="8" @if(request()->get('mies')=='8') selected @endif >Sierpień</option>
                    <option value="9" @if(request()->get('mies')=='9') selected @endif >Wrzesień</option>
                    <option value="10" @if(request()->get('mies')=='10') selected @endif >Październik</option>
                    <option value="11" @if(request()->get('mies')=='11') selected @endif >Listopad</option>
                    <option value="12" @if(request()->get('mies')=='12') selected @endif >Grudzień</option>


                </select>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Pokaż</button>

                </div>
            </div>


            </form>
        </div>


        <div class="col-4">

            @if(request()->get('mies')!='')
            <a href="{{route('kalendariumLista')}}" class="btn btn-primary btn-sm" role="button" aria-pressed="">Wszystko chronologicznie</a>
   @endif
    </div>
    </div>



    <div class="list-group row mt3">
    @foreach($Wyniki as $kalendarium)

           <div class="col-12"> <a href="{{ route('kalendariumEdycja', $kalendarium->id) }}" class="list-group-item list-group-item-action">
                   @if($kalendarium->status=='Robocze')
                       <i class="bi  bi-pencil-square fs-3 " style="color: #bb2d3b" title="Robocze"></i>
                   @endif
                   @if($kalendarium->status=='Opublikowane')
                       <i class="bi bi-check-square fs-4 " style="color: forestgreen" title="Opublikowane"></i>
                   @endif

                   {{$kalendarium->data  }} - {{$kalendarium->tytul}}
                   {{--@if($kalendarium->title=='' || $kalendarium->keywords=='' || $kalendarium->description=='')
                       <span style="color: red; font-weight: bold"> SEO!!! </span>
                   @endif--}}
                       @if(Str::length($kalendarium->zdjecie1)>4)
                           <i class="bi bi-image fs-4" style="color: forestgreen" title="Zdjęcie1"></i>
                       @endif
                       @if($kalendarium->pliki->count()>0)

                           <i class="bi bi-file-earmark-arrow-down-fill fs-4" style="color: #a52834" title="Załączony plik"></i>
                       @endif
               </a>


           </div>

    @endforeach
    </div>
  {{-- @include('dodatki.paginacja')--}}
@endsection
