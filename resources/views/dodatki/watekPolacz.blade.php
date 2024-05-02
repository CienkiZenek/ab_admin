{{--łaczenie z wątkiem --}}
<div class="border border-2 rounded-2 p-2  mt-3">
<div class="row mt-3 mb-5" >
    <div class="col-12 mb-3">
        <h5><span class="badge bg-secondary">Wątki: {{--<i>{{$tresc->tytul}}</i>--}}</span></h5>
    </div>

    <div class="col-6 ">

            @if($tresc->watki->count()>0)
<div class="row">
                @foreach($tresc->watki as $watek)
        <div class="col-9 ">
                    <form action="{{route('odlaczWatek')}}" method="POST">
                        <input id="tresc_id" name="tresc_id" type="hidden" value="{{$tresc->id}}">
                        <input id="dzial" name="dzial" type="hidden" value="{{$dzial}}">
                        <input id="watek_id" name="watek_id" type="hidden" value="{{$watek->id}}">
                        @csrf



                        {{Str::limit($watek->tytul, 50)}}</div>
        <div class="col-3  border-bottom">
                        <button class="btn btn-outline-secondary btn-sm" type="submit" id="dodajWantek">Usuń</button>
                        </form>
        </div>

                @endforeach
    </div>
        @endif

    </div>


    <div class="col-6">
        <div class="row">
            <div class="col-9">

            <form action="{{route('polaczWatek')}}" method="POST">
                <input id="tresc_id" name="tresc_id" type="hidden" value="{{$tresc->id}}">
                <input id="dzial" name="dzial" type="hidden" value="{{$dzial}}">
                @csrf
                @php
                    $watki=App\Models\Watki::orderBy('tytul', 'asc')->get();
                @endphp

            <select class="form-control" id="watek_id" name="watek_id" aria-label="watek_dodaj" aria-describedby="dodaj_Watek">
                @foreach($watki as $watek)
                    <option value="{{$watek->id}}"
                            @if($tresc->watki->contains('id', $watek->id))
                                disabled
                        @endif
                    >{{Str::limit($watek->tytul, 50)}}</option>
                @endforeach
            </select>
            </div>
                <div class="col-3">
                <button class="btn btn-outline-secondary btn-sm" type="submit" id="dodajWantek">Dodaj</button>

            </form>
            </div>








        </div>

    </div>

</div>
</div>

{{--Kotwica przydatna prze przełdowywaniu strony przy dodawania tagów--}}
<a href="#watki" id="watkiLista">
</a>
{{-- Skrypt wywoływany gdy następuje odświerzenie strony po dodaniu/odłączeniu wątku --}}
@if(isset($watkiZmiana))
    <script>
        // window.location.hash = "#tagi";
        // window.location.hash = '#tagi';
        var tagObszar = document.getElementById("watkiLista");
        tagObszar.scrollIntoView();
    </script>
@endif

{{--koniec Połącz z wątkiem--}}
