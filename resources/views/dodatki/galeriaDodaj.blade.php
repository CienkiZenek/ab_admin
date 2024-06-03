{{--Dodawanie Galerii obrazków--}}
<div class="border border-2 rounded-2 p-2 mt-3">
<div class="row mt-3">
    <div class="col-5">
        <form action="{{route('zdjeciaDodajDo')}}" method="POST">
            @csrf
            <input type="hidden" name="dzial" value="{{$dzial}}"/>
            <input type="hidden" name="tresc_id" value="{{$tresc->id}}"/>
            <input type="hidden" name="rodzaj" value="Galeria"/>
            <input type="hidden" name="tryb" value="dodawanie"/>

            <button type="submit" class="btn btn-primary">Dodaj zdjęcie do galerii</button>
        </form>

    </div>
    <div class="col-7"></div>

    @if($tresc->galeria->count()>0)
    <div class="row mt-3">
        @php
            //dd($galeria);
        @endphp

    @foreach($tresc->galeria as $zdjecie)
            <div class="col-3">
                <a href="{{URL::asset('zdjecia/'.$zdjecie->plik)}}" data-lightbox="galeria" data-title=""><img src="{{URL::asset('zdjecia/'.$zdjecie->plik)}}"  style="max-height: 500px" class="img-thumbnail" alt=""/></a>
                <form action="{{route('zdjecieDodaj')}}" method="POST">
                    @csrf
                    <input type="hidden" name="dzial" value="{{$dzial}}"/>
                    <input type="hidden" name="tresc_id" value="{{$tresc->id}}"/>
                    <input type="hidden" name="zdjecie_id" value="{{$zdjecie->id}}"/>
                    <input type="hidden" name="rodzaj" value="Galeria"/>
                    <input type="hidden" name="tryb" value="usuwanie"/>


                              <button type="submit" class="btn btn-primary">Usuń zdjęcie z galerii</button>

                </form>
        </div>

    @endforeach

</div>
    @endif
    {{--Kotwica przydatna prze przełdowywaniu strony przy dodawania/usuwaniu zdjęć--}}
    <a href="#zdjecia" id="zdjeciaZmiana">
    </a>
    {{-- Skrypt wywoływany gdy następuje odświerzenie strony po dodaniu/odłączeniu wątku --}}
    @if(isset($zdjeciaZmiana))
        <script>
            // window.location.hash = "#tagi";
            // window.location.hash = '#tagi';
            var tagObszar = document.getElementById("zdjeciaZmiana");
            tagObszar.scrollIntoView();
        </script>
    @endif
</div>
</div>
