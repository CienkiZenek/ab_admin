@extends('szablon.szablon')
@section('title', 'Nowy plik')
@section('tresc')


    <form action="{{route('plikNowyZapis')}}" enctype="multipart/form-data" method="POST">
        @csrf


        <div class="row mt-4">

            <div class="col-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="status1">Typ pliku:</span>
                    </div>

                    <select class="form-control" id="typ" name="typ" aria-label="typ" aria-describedby="typ1">
                        <option value="pdf" >Pdf</option>
                        <option value="word" >Word</option>
                        <option value="inny" >Inny</option>
                    </select>
                </div>
            </div>

            <div class="col-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="status1">Typ pliku:</span>
                    </div>

                    <select class="form-control" id="rodzaj" name="rodzaj" aria-label="rodzaj" aria-describedby="rodzaj1">
                        <option value="zasob" >Zasób</option>
                        <option value="dokument" >Dokument</option>
                        <option value="ksiazka" >Książka</option>
                        <option value="skan" >Skan</option>
                        <option value="inny" >Inny</option>
                        {{--zasob', 'dokument', 'modlitwa','ksiazka', 'skan', 'inny'--}}
                    </select>
                </div>
            </div>

        </div>
        <div class="row mt-4">


            <div class="col-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Nazwa pliku:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('nazwa') ? ' is-invalid' : '' }}" name="nazwa" id="nazwa" value="" placeholder="Nazwa pliku..." >
                </div>

            </div>
        </div>
        <div class="row mt-4">


            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Opis pliku:</span>
                    </div>
                    <input type="text" class="form-control" name="opis" id="opis" value="{{ old('opis') }}" placeholder="Opis pliku..." >
                </div>

            </div>
        </div>

        <div class="row mt-1">



        <div class="col-12">

            <div class="input-group  mt-4">

                <div class="custom-file m-1">

                    <input type="file" class="custom-file-input form-control{{ $errors->has('plik') ? ' is-invalid' : '' }}" id="plik" name="plik" lang="pl_Pl" value="">

                </div>
            </div>
        </div>
        </div>



        <div class="row mt-3">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </div>

        </div>
        <div class="wys15"></div>

    </form>

    </div>
</div>




@endsection
