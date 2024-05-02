@extends('szablon.szablon')
@section('title', 'Nowe zdjęcie')
@section('tresc')

<div class="row">

</div>
    <form action="{{route('zdjecieNoweZapis')}}" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="row mt-3">
            <div class="col-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="status1">Kategoria:</span>
                    </div>

                    <select class="form-control" id="kategoria" name="kategoria" aria-label="kategoria" aria-describedby="kategoria1">
                        <option value="Portret" >Portret</option>
                        <option value="Informacja" >Informacja</option>
                        <option value="Dokument" >Dokument</option>
                        <option value="Publikacja" >Publikacja</option>
                        <option value="Gazeta" >Gazeta</option>
                        <option value="Wydarzenie" >Wydarzenie</option>
                        <option value="Strachocina" >Strachocina</option>
                        <option value="Rakowiecka" >Rakowiecka</option>
                        <option value="Muzeum" >Muzeum</option>
                        <option value="Meczenstwo" >Męczeństwo</option>
                       <option value="Inne" >Inne</option>
                    </select>
                </div>


            </div>

            <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Autor/Źródło:</span>
                    </div>
                    <input type="text" class="form-control" name="autor" id="autor" value="{{ old('autor') }}" placeholder="Autor/Źródło zdjęcia..." >
                </div>

            </div>
            </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Opis zdjęcia:</span>
                    </div>
                    <input type="text" class="form-control" name="opis" id="opis" value="{{ old('opis') }}" placeholder="Opis zdjęcia..." >
                </div>

            </div>
        </div>

        </div>


          <div class="row">
            <div class="col-12">

                <div class="input-group  mt-4">
                    {{--<div class="input-group-prepend">
                        <span class="input-group-text" >Dodaj zdjęcie</span>
                    </div>--}}
                    <div class="custom-file m-1">

                        <input type="file" class="custom-file-input form-control {{ $errors->has('plik') ? ' is-invalid' : '' }}" id="plik" name="plik" lang="pl_Pl" value="">

                    </div>
                </div>
            </div>
        </div>




        <div class="row mt-3 mb-4">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </div>

        </div>


    </form>

    </div>
</div>




@endsection