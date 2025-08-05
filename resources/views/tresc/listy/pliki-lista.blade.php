@extends('szablon.szablon')
@section('title', 'Pliki - lista')
@section('tresc')

    <p class="badge bg-secondary fs-5">
        Lista plików
    </p>
    <div class="row mt-2">

        <div class="col-6">
            @if($dodawanie=='nie')
            <form action="{{route('plikiSzukaj')}}" method="get">
                <div class="input-group">

                    <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Szukaj</button>

                    </div></div>
            </form>
            @endif
            @if($dodawanie=='tak')

                    <form action="{{route('plikSzukajDodawanie')}}" method="post">
                        @csrf

                        <div class="input-group">

                            <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                            <div class="input-group-append">

                                <input type="hidden" name="dzial" value="{{$dzial}}"/>
                                <input type="hidden" name="tresc_id" value="{{$tresc_id}}"/>
                               {{-- <input type="hidden" name="rodzaj" value="{{$rodzaj}}"/>--}}
                                {{--<input type="hidden" name="tryb" value="{{$tryb}}"/>--}}

                                <button class="btn btn-outline-secondary" type="submit">Szukaj</button>

                            </div></div>
                    </form>
                @endif
        </div>
        <div class="col-6">
            @if($dodawanie=='nie')
            <a href="{{route('plikNowy')}}" class="btn btn-primary" role="button" aria-pressed="true">Dodaj nowy plik</a>
            @endif
        </div>
    </div>


{{--
 <input type="hidden" name="dzial" value="{{$dzial}}"/>
                        <input type="hidden" name="tresc_id" value="{{$tresc_id}}"/>
--}}
    @if($dodawanie=='nie')
        <div class="row mt-2">


            <div class="col-6">
                <form action="{{route('plikiListaRodzaj')}}" method="POST">
                    @csrf




                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="status1">Rodzaj pliku:</span>
                        </div>

                        <select class="form-control" id="rodzaj" name="rodzaj" aria-label="rodzaj" aria-describedby="rodzaj1">
                            <option value="wszystkie" >Wszystkie rodzaje</option>
                            @if(isset($rodzaj))

                            <option value="zasob" @if($rodzaj=='zasob') selected @endif>Zasób</option>
                            <option value="dokument" @if($rodzaj=='dokument') selected @endif>Dokument</option>
                            <option value="ksiazka" @if($rodzaj=='ksiazka') selected @endif>Książka</option>
                            <option value="skan" @if($rodzaj=='skan') selected @endif>Skan</option>
                            <option value="inny" @if($rodzaj=='inny') selected @endif>Inny</option>
                            @else
                                <option value="zasob">Zasób</option>
                                <option value="dokument" >Dokument</option>
                                <option value="ksiazka" >Książka</option>
                                <option value="skan" >Skan</option>
                                <option value="inny" >Inny</option>

                            @endif



                        </select>
                    </div>

            </div>

            <div class="col-6">
                <button type="submit" class="btn btn-primary">Wybierz rodzaj plików</button>

                </form>
            </div>



                    </div>

    @endif

    @if($dodawanie=='tak')

                <div class="row mt-2">


            <div class="col-6">
                <form action="{{route('plikiListaRodzajDodawanie')}}" method="POST">
                    @csrf

                    <input type="hidden" name="dzial" value="{{$dzial}}"/>
                    <input type="hidden" name="tresc_id" value="{{$tresc_id}}"/>
                    {{--<input type="hidden" name="rodzaj" value="{{$rodzaj}}"/>--}}
                    <input type="hidden" name="dodawanie" value="tak"/>


                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="status1">Rodzaj pliku:</span>
                        </div>

                        <select class="form-control" id="rodzaj" name="rodzaj" aria-label="rodzaj" aria-describedby="rodzaj1">
                            <option value="wszystkie" >Wszystkie rodzaje</option>
                            @if(isset($rodzaj))

                                <option value="zasob" @if($rodzaj=='zasob') selected @endif>Zasób</option>
                                <option value="dokument" @if($rodzaj=='dokument') selected @endif>Dokument</option>
                                <option value="ksiazka" @if($rodzaj=='ksiazka') selected @endif>Książka</option>
                                <option value="skan" @if($rodzaj=='skan') selected @endif>Skan</option>
                                <option value="inny" @if($rodzaj=='inny') selected @endif>Inny</option>
                            @else
                                <option value="zasob">Zasób</option>
                                <option value="dokument" >Dokument</option>
                                <option value="ksiazka" >Książka</option>
                                <option value="skan" >Skan</option>
                                <option value="inny" >Inny</option>

                            @endif



                        </select>
                    </div>

            </div>

            <div class="col-6">
                <button type="submit" class="btn btn-primary">Wybierz rodzaj plików</button>

                </form>
            </div>



        </div>

    @endif






    <div class="row mt-3 mb-3 border-3 bg-light p-2 border border-secondary rounded" >

        <div class="col-5 "><span class="badge bg-secondary">Tytuł/Opis pliku</span></div>
        <div class="col-5 "><span class="badge bg-secondary">Użycia</span></div>

    </div>
    @foreach($Wyniki as $plik)

        <div class="row mt-3  border-bottom border-3" >
            <div class="col-5 size20">


                {{$plik->nazwa }} / {{$plik->opis }} (<b>{{$plik->rodzaj  }}</b>)
                @if($dodawanie=='nie')
                    <form action="{{route('plikEdycja', $plik->id)}}" method="POST">
                        @csrf



                    <br><button type="submit" class="btn btn-sm btn-primary mb-2">Zmień/Usuń</button>

                    </form>
                @endif
            </div>


            <div class="col-5 size20">
                @php
                    $powiazania=\App\Services\PlikiDodawanie::plikiPowiazania($plik->id, 6);
/*dd($powiazania);*/
                @endphp

                @foreach($powiazania as $powiazanie)
                   {{-- @php  dd($powiazanie); @endphp--}}
                    <p class="m-0"> {{Str::limit($powiazanie->pow_tytul, 40)}} ( <i>{{$powiazanie->rodzaj}}</i>, {{$powiazanie->pow_data}}){{----}}</p>
                  @endforeach

              </div>
              <div class="col-2 size20">

                  @if($dodawanie=='tak')
                      <form action="{{route('plikZalaczOdlacz')}}" method="POST">
                          @csrf

                          <input type="hidden" name="dzial" value="{{$dzial}}"/>
                          <input type="hidden" name="tresc_id" value="{{$tresc_id}}"/>
                          <input type="hidden" name="plik_id" value="{{$plik->id}}"/>
                          {{--<input type="hidden" name="rodzaj" value="{{$rodzaj}}"/>--}}
                          <input type="hidden" name="tryb" value="Zalaczanie"/>


                          <button type="submit" class="btn btn-primary">Dodaj</button>

                      </form>
                  @endif   </div>

          </div>

      @endforeach

     @include('dodatki.paginacja')
  @endsection
