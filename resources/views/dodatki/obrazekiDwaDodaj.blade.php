{{--Dodawanie 2 obrazków --}}

<div class="border border-2 rounded-2 p-2 mt-3">
<div class="row mt-3">
    {{--Obrazek 1--}}
    <div class="col-6">
        <div class="tlo-szare8  p-1">

                @php  $dlugosc1 = Str::length($tresc->zdjecie1) @endphp
                @if($dlugosc1>3)

                    <div class="input-group  mt-2">
                        <form action="{{route('zdjecieDodaj')}}" method="POST">
                            @csrf
                            <input type="hidden" name="dzial" value="{{$dzial}}"/>
                            <input type="hidden" name="tresc_id" value="{{$tresc->id}}"/>
                            <input type="hidden" name="zdjecie_id" value="{{$tresc->zdjecie1_id}}"/>
                            <input type="hidden" name="rodzaj" value="Zdjecie1"/>
                            <input type="hidden" name="tryb" value="usuwanie"/>


               {{-- <a href="{{route('zdjeciaDodajDo', ['tresc_id'=>$tresc->id, 'tryb'=>'usuwanie', 'dzial'=>$dzial,'rodzaj'=>'Zdjecie1'])}}" class="btn btn-primary" role="button" aria-pressed="">Usuń zdjęcie 1</a
--}}                <button type="submit" class="btn btn-primary">Usuń zdjęcie 1</button>

</form>
    </div>
                @else
                            <div class="input-group">
                                <form action="{{route('zdjeciaDodajDo')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="dzial" value="{{$dzial}}"/>
                                    <input type="hidden" name="tresc_id" value="{{$tresc->id}}"/>
                                    <input type="hidden" name="rodzaj" value="Zdjecie1"/>
                                    <input type="hidden" name="tryb" value="dodawanie"/>
                    {{--<a href="{{route('zdjeciaDodajDo', ['tresc_id'=>$tresc->id, 'tryb'=>'dodawanie', 'dzial'=>$dzial,'rodzaj'=>'Zdjecie1'])}}" class="btn btn-primary" role="button" aria-pressed="">Dodaj zdjęcie 1</a>--}}
                                    <button type="submit" class="btn btn-primary">Dodaj zdjęcie 1</button>
                                </form>
                            </div>
                                @endif


            @if($dlugosc1>3)
                <a href="{{URL::asset('zdjecia/'.$tresc->zdjecie1)}}" data-lightbox="obrazek1" data-title=""><img src="{{URL::asset('zdjecia/'.$tresc->zdjecie1)}}" class="img-thumbnail" alt=""/></a>

            @endif


            @if($dlugosc1>3)

            {{--<div class="input-group mt-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" >Podpis obrazek1:</span>
                </div>
                <input type="text" class="form-control" name="podpisObrazek1" id="podpisObrazek1" value="{{$tresc->zdjecie1_podpis}}" >
            </div>--}}
                <span class="badge bg-secondary">Podpis obrazka:</span>
                {{$tresc->zdjecie1_podpis}}
            @endif
        </div>
        @if($dlugosc1>3)

        <span class="badge bg-secondary">Opis obrazka:</span>
        {{app\Models\Zdjecia::find($tresc->zdjecie1_id)->opis}}
        @endif
        {{--Obrazek 2--}}
    </div>

    <div class="col-6">
        <div class="tlo-szare8  p-1">

            @php  $dlugosc2 = Str::length($tresc->zdjecie2) @endphp
            @if($dlugosc2>3)

                <div class="input-group  mt-2">
                    <form action="{{route('zdjecieDodaj')}}" method="POST">
                        @csrf
                        <input type="hidden" name="dzial" value="{{$dzial}}"/>
                        <input type="hidden" name="tresc_id" value="{{$tresc->id}}"/>
                        <input type="hidden" name="zdjecie_id" value="{{$tresc->zdjecie2_id}}"/>
                        <input type="hidden" name="rodzaj" value="Zdjecie2"/>
                        <input type="hidden" name="tryb" value="usuwanie"/>


                        {{-- <a href="{{route('zdjeciaDodajDo', ['tresc_id'=>$tresc->id, 'tryb'=>'usuwanie', 'dzial'=>$dzial,'rodzaj'=>'Zdjecie1'])}}" class="btn btn-primary" role="button" aria-pressed="">Usuń zdjęcie 1</a
         --}}                <button type="submit" class="btn btn-primary">Usuń zdjęcie 2</button>

                    </form>
                </div>
            @else
                <div class="input-group">
                    <form action="{{route('zdjeciaDodajDo')}}" method="POST">
                        @csrf
                        <input type="hidden" name="dzial" value="{{$dzial}}"/>
                        <input type="hidden" name="tresc_id" value="{{$tresc->id}}"/>
                        <input type="hidden" name="rodzaj" value="Zdjecie2"/>
                        <input type="hidden" name="tryb" value="dodawanie"/>
                        {{--<a href="{{route('zdjeciaDodajDo', ['tresc_id'=>$tresc->id, 'tryb'=>'dodawanie', 'dzial'=>$dzial,'rodzaj'=>'Zdjecie1'])}}" class="btn btn-primary" role="button" aria-pressed="">Dodaj zdjęcie 1</a>--}}
                        <button type="submit" id="dodaj2" class="btn btn-primary">Dodaj zdjęcie 2</button>
                        <div>Oriantacja pozioma - do "karuzeli" na stronie glównej!</div>
                    </form>

                </div>
            @endif


            @if($dlugosc2>3)
                <a href="{{URL::asset('zdjecia/'.$tresc->zdjecie2)}}" data-lightbox="obrazek2" data-title=""><img src="{{URL::asset('zdjecia/'.$tresc->zdjecie2)}}" class="img-thumbnail" alt=""/></a>

            @endif


            @if($dlugosc2>3)
            {{--<div class="input-group mt-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" >Podpis obrazek2:</span>
                </div>
                <input type="text" class="form-control" name="podpisObrazek1" id="podpisObrazek1" value="{{$tresc->zdjecie2_podpis}}" >


            </div>--}}
                <span class="badge bg-secondary">Podpis obrazka 2:</span>
                {{$tresc->zdjecie2_podpis}}
            @endif

        </div>
        @if($dlugosc2>3)
        <span class="badge bg-secondary">Opis obrazka:</span>
        {{app\Models\Zdjecia::find($tresc->zdjecie2_id)->opis}}
        @endif
    </div>
</div>

</div>


    {{-- Skrypt wywoływany gdy następuje odświerzenie strony po dodaniu/odłączeniu --}}
    @if(isset($zdjeciaZmiana))
        <script>
            // window.location.hash = "#tagi";
            // window.location.hash = '#tagi';
            var tagObszar = document.getElementById("zdjeciaZmiana");
            tagObszar.scrollIntoView();
        </script>
    @endif

