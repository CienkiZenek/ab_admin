@extends('szablon.szablon')
@section('title', 'Zdjecie - edycja')
@section('tresc')


    <form action="{{route('zdjecieEdycjaZapis', $zdjecie->id)}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="mt-4"></div>


            <div class="row">
                <div class="col-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="rodzaj1">Kategoria:</span>
                        </div>
                        <select class="form-control" id="rodzaj" name="kategoria" aria-label="kategoria" aria-describedby="rodzaj1">

                            <option value="1938_powrot" @if($zdjecie->kategoria=='1938_powrot') selected @endif>1938 powrót relikwii</option>
                            <option value="Gazeta" @if($zdjecie->kategoria=='Gazeta') selected @endif>Gazeta</option>
                            <option value="Dokument" @if($zdjecie->kategoria=='Dokument') selected @endif>Dokument</option>
                            <option value="Ilustracja" @if($zdjecie->kategoria=='Ilustracja') selected @endif>Ilustracja</option>
                            <option value="Informacja" @if($zdjecie->kategoria=='Informacja') selected @endif>Informacja</option>
                            <option value="Kanonizacja_beatyfikacja" @if($zdjecie->kategoria=='Kanonizacja_beatyfikacja') selected @endif>Kanonizacja - beatyfikacja</option>
                            <option value="Karuzela" @if($zdjecie->kategoria=='Karuzela') selected @endif>Karuzela</option>
                            <option value="Meczenstwo" @if($zdjecie->kategoria=='Meczenstwo') selected @endif>Męczenstwo</option>
                            <option value="Male_obrazki" @if($zdjecie->kategoria=='Male_obrazki') selected @endif>Małe obrazki</option>
                            <option value="Miejsca_kultu" @if($zdjecie->kategoria=='Miejsca_kultu') selected @endif>Miejsca kultu</option>
                            <option value="Modlitwa" @if($zdjecie->kategoria=='Modlitwa') selected @endif>Modlitwa</option>
                            <option value="Muzeum" @if($zdjecie->kategoria=='Muzeum') selected @endif>Muzeum</option>
                            <option value="Portret" @if($zdjecie->kategoria=='Portret') selected @endif>Portret/Podobizna</option>
                            <option value="Publikacja" @if($zdjecie->kategoria=='Publikacja') selected @endif>Publikacja</option>
                            <option value="Rakowiecka" @if($zdjecie->kategoria=='Rakowiecka') selected @endif>Rakowiecka</option>
                            <option value="Relikwie" @if($zdjecie->kategoria=='Relikwie') selected @endif>Relikwie</option>
                            <option value="Ryciny" @if($zdjecie->kategoria=='Ryciny') selected @endif>Ryciny/Czarno-białe</option>
                            <option value="Strachocina" @if($zdjecie->kategoria=='Strachocina') selected @endif>Strachocina</option>
                            <option value="Wydarzenie" @if($zdjecie->kategoria=='Wydarzenie') selected @endif>Wydarzenie</option>
                            <option value="Zycie_AB" @if($zdjecie->kategoria=='Zycie_AB') selected @endif>Życie Andrzeja Boboli</option>
                            <option value="Inne" @if($zdjecie->kategoria=='Inne') selected @endif>Inne</option>


                        </select>
                    </div>


                </div>

                <div class="col-8">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >Autor/Źródło:</span>
                        </div>
                        <input type="text" class="form-control" name="autor" id="autor" value="{{$zdjecie->autor}}" >
                    </div>

                </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Opis:</span>
                    </div>
                    <input type="text" class="form-control" name="opis" id="opis" value="{{$zdjecie->opis}}" >
                </div>

            </div>


        </div>

            <div class="col-12 mt-3">

                <div class="col-7">
                <a href="{{ URL::asset('zdjecia/'.$zdjecie->plik)}}" data-lightbox="obrazek{{$zdjecie->id}}" data-title="">
                    <img src="{{ URL::asset('zdjecia/'.$zdjecie->plik)}}"  class="img-thumbnail" alt="{{$zdjecie->opis}}" style="max-height: 200px"></a>
                </div>
                    <div class="col-5">
                        <div class="form-label">Plik zdjęcia:</div>
                        <h5>
                            {{Str::remove('zdjecia/',$zdjecie->plik)}}
                        </h5>
                    </div>
            </div>


        <div class="col-12 mt-3">

            <div class="input-group  mt-4">
                <div class="custom-file m-1">

                    <input type="file" class="custom-file-input form-control" id="plik" name="plik" lang="pl_Pl" value="">

                </div>
            </div>
        </div>


        <div class="row mt-3">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Aktualizuj</button>

            </div>

        </div>
        </div>
    </form>

<div class="mt-4 mb-3">Duża wersja zdjęcia:</div>




@if(Str::length($zdjecie->plik_duze)>4)
        <div class="col-12 mt-3">

            <div class="col-7">
                <a href="{{ URL::asset('zdjecia/'.$zdjecie->plik_duze)}}" data-lightbox="obrazek{{$zdjecie->id}}" data-title="">
                    <img src="{{ URL::asset('zdjecia/'.$zdjecie->plik_duze)}}"  class="img-thumbnail" style="max-height: 200px"></a>
            </div>
            <div class="col-5">
                <div class="form-label">Plik dużego zdjęcia:</div>
                <h5>
                    {{Str::remove('zdjecia/',$zdjecie->plik_duze)}}
                </h5>
            </div>
        </div>

        @endif
    <form action="{{route('zdjecieDuzeZapis', $zdjecie->id)}}" enctype="multipart/form-data" method="POST">
        @csrf
        <input type="hidden" name="plik" value="{{$zdjecie->plik}}"/>
        <input type="hidden" name="kategoria" value="{{$zdjecie->kategoria}}"/>
        <input type="hidden" name="opis" value="{{$zdjecie->opis}}"/>
        <input type="hidden" name="duze" value="{{$zdjecie->duze}}"/>
        <input type="hidden" name="autor" value="{{$zdjecie->autor}}"/>

        <div class="col-12 mt-3">

            <div class="input-group  mt-4">
                <div class="custom-file m-1">

                    <input type="file" class="custom-file-input form-control" id="plik_duze" name="plik_duze" lang="pl_Pl" value="">

                </div>
            </div>
        </div>


        <div class="row mt-3">
            <div class="col-12">

                <button type="submit" class="btn btn-primary">Dodaj/Aktualizuj duże zdjęcie</button>

            </div>

        </div>

    </form>


    @if($zdjecie->liczbaDodan==0 )
    <button class="btn btn-danger mt-5" type="button" data-bs-toggle="collapse" data-bs-target="#usuwanie" aria-expanded="false" aria-controls="usuwanie">
        Usuwanie
    </button>
    <div class="collapse" id="usuwanie">
        <div class="mt-4"></div>
        <div class="card card-body col-3 text-center">
            <form action="{{route('zdjecieUsun', $zdjecie->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń zdjęcie</button>


            </form>

        </div>
    </div>

    @endif
    <div class="mb-2 md-5"></div>

    @php
        $powiazania=\App\Services\ObrazkiDodawanie::obrazekPowiazania($zdjecie->id, 1000);
    @endphp
    @if($powiazania->count()>0)
        <div class="row mt-3 mb-5 ">
            <div class="col-12 mb-3">
                <span class="badge bg-secondary">Zdjęcie zostało dodane do:</span>
            </div>




            @foreach($powiazania as $powiazanie)

                <div class="col-12"> {{Str::limit($powiazanie->pow_tytul, 70)}} (<i>{{$powiazanie->rodzaj}}</i>, {{$powiazanie->pow_data}})</div>
            @endforeach
        </div>

    @endif




@endsection
