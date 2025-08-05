{{--Dodawanie plików --}}

<div class="border border-2 rounded-2 p-2 mt-3">
<div class="row mt-3 mb-3" >
    <div class="col-7 ">
        <h5><span class="badge bg-secondary">Pliki:</span></h5>
    </div>
    <div class="col-5">

        <form action="{{route('plikiDodawanieLista')}}" method="POST">
            @csrf
            <input type="hidden" name="dzial" value="{{$dzial}}"/>
            <input type="hidden" name="tresc_id" value="{{$tresc->id}}"/>
            {{--<input type="hidden" name="rodzaj" value="plik"/>--}}
            {{--<input type="hidden" name="tryb" value="Dodawanie"/>--}}

            <button type="submit" class="btn btn-primary">Załącz plik</button>
        </form>
    </div>

    </div>

       {{-- @php
        //dd($tresc->pliki);

        @endphp--}}

            @if($tresc->pliki->count()>0)

                @foreach($tresc->pliki as $plik)
        <div class="row">
        <div class="col-9 ">
                    <form action="{{route('plikZalaczOdlacz')}}" method="POST">
                        <input id="dzial" name="dzial" type="hidden" value="{{$dzial}}">
                        <input id="tresc_id" name="tresc_id" type="hidden" value="{{$tresc->id}}">
                        <input id="plik_id" name="plik_id" type="hidden" value="{{$plik->id}}">
                        <input type="hidden" name="tryb" value="Odlaczanie"/>
                        @csrf



                        {{Str::limit($plik->nazwa, 40)}} ({{Str::limit($plik->opis, 20)}} --> <b>{{$plik->rodzaj  }}</b>)</div>
        <div class="col-3 ">
                        <button class="btn btn-outline-secondary btn-sm" type="submit" id="dodajPlik">Odłącz plik</button>
            </form>
        </div>

        </div>
                @endforeach

        @endif



</div>

<div class="mt-5"></div>

    {{--
        <div class="col-6">
            <div class="row">
                <div class="col-9">

                <form action="{{route('dodajPlik')}}" method="POST">
                    <input id="tresc_id" name="tresc_id" type="hidden" value="{{$tresc->id}}">
                    <input id="dzial" name="dzial" type="hidden" value="{{$dzial}}">
                    @csrf
                <select class="form-control" id="plik_id" name="plik_id" aria-label="plik_dodaj" aria-describedby="dodaj_Plik">
                    @foreach($pliki as $plik)
                        <option value="{{$plik->id}}"

                                @if($tresc->pliki->contains('id', $plik->id))
                                    disabled
                            @endif
                        >{{Str::limit($plik->opis, 50) }}</option>
                    @endforeach
                </select>
                </div>
                    <div class="col-3">
                    <button class="btn btn-outline-secondary btn-sm" type="submit" id="dodajPlik">Dodaj</button>
                </form>
                </div>
            </div>

        </div>

    </div>
    --}}

{{--<div class="input-group">
    <form action="{{route('plikDodajDo')}}" method="POST">
        @csrf
        <input type="hidden" name="dzial" value="{{$dzial}}"/>
        <input type="hidden" name="tresc_id" value="{{$tresc->id}}"/>
        <input type="hidden" name="rodzaj" value="plik"/>
        <input type="hidden" name="tryb" value="dodawanie"/>
        --}}{{--<a href="{{route('zdjeciaDodajDo', ['tresc_id'=>$tresc->id, 'tryb'=>'dodawanie', 'dzial'=>$dzial,'rodzaj'=>'Zdjecie1'])}}" class="btn btn-primary" role="button" aria-pressed="">Dodaj zdjęcie 1</a>--}}{{--
        <button type="submit" class="btn btn-primary">Załącz plik</button>
    </form>
<div>--}}

{{--Kotwica przydatna prze przełdowywaniu strony przy dodawania plikow--}}
<a href="#pliki" id="plikiLista">
</a>
{{-- Skrypt wywoływany gdy następuje odświerzenie strony po dodaniu/odłączeniu wątku --}}
@if(isset($plikiZmiana))
    <script>

        var tagObszar = document.getElementById("plikiLista");
        tagObszar.scrollIntoView();
    </script>
@endif

{{--koniec Połącz z wątkiem--}}
