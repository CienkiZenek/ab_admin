{{--Dodawanie obrazka karuzeli--}}

<div class="border border-2 rounded-2 p-2 mt-3">
<div class="row mt-3">
    {{--Obrazek --}}
    <div class="col-6">
        <div class="tlo-szare8  p-1">

                @php  $dlugosc1 = Str::length($tresc->zdjecie_karuzela) @endphp
                @if($dlugosc1>3)

                    <div class="input-group  mt-2">
                        <form action="{{route('zdjecieDodaj')}}" method="POST">
                            @csrf
                            <input type="hidden" name="dzial" value="{{$dzial}}"/>
                            <input type="hidden" name="tresc_id" value="{{$tresc->id}}"/>
                            <input type="hidden" name="zdjecie_id" value="{{$tresc->zdjecie_karuzela_id}}"/>
                            <input type="hidden" name="rodzaj" value="Karuzela"/>
                            <input type="hidden" name="tryb" value="usuwanie"/>


               {{-- <a href="{{route('zdjeciaDodajDo', ['tresc_id'=>$tresc->id, 'tryb'=>'usuwanie', 'dzial'=>$dzial,'rodzaj'=>'Zdjecie1'])}}" class="btn btn-primary" role="button" aria-pressed="">Usuń zdjęcie 1</a
--}}                <button type="submit" class="btn btn-primary">Usuń zdjęcie karuzeli</button>

</form>
    </div>
                @else
                            <div class="input-group">
                                <form action="{{route('zdjeciaDodajDo')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="dzial" value="{{$dzial}}"/>
                                    <input type="hidden" name="tresc_id" value="{{$tresc->id}}"/>
                                    <input type="hidden" name="rodzaj" value="Karuzela"/>
                                    <input type="hidden" name="tryb" value="dodawanie"/>
                    {{--<a href="{{route('zdjeciaDodajDo', ['tresc_id'=>$tresc->id, 'tryb'=>'dodawanie', 'dzial'=>$dzial,'rodzaj'=>'Zdjecie1'])}}" class="btn btn-primary" role="button" aria-pressed="">Dodaj zdjęcie 1</a>--}}
                                    <button type="submit" class="btn btn-primary">Dodaj zdjęcie karuzeli</button>
                                </form>
                            </div>
                                @endif


            @if($dlugosc1>3)
                <a href="{{URL::asset('karuzela/'.$tresc->zdjecie_karuzela)}}" data-lightbox="obrazek1" data-title=""><img src="{{URL::asset('karuzela/'.$tresc->zdjecie_karuzela)}}" style="max-height: 500px"  class="img-thumbnail" alt=""/></a>

            @endif



    </div>


</div>

</div>

{{--Kotwica przydatna prze przełdowywaniu strony przy dodawania/usuwaniu zdjęć--}}
<a href="#zdjecia" id="zdjeciaZmiana">
</a>
    {{-- Skrypt wywoływany gdy następuje odświerzenie strony po dodaniu/odłączeniu --}}
    @if(isset($zdjeciaZmiana))
        <script>
            // window.location.hash = "#tagi";
            // window.location.hash = '#tagi';
            var tagObszar = document.getElementById("zdjeciaZmiana");
            tagObszar.scrollIntoView();
        </script>
    @endif

