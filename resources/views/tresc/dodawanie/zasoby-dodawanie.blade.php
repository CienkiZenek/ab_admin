@extends('szablon.szablon')
@section('title', 'Nowy zasób')
@section('tresc')


    <form action="{{route('zasobNowyZapis')}}"  method="POST">
        @csrf


        <div class="row mt-4">

            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="status1">Rodzaj zasobu:</span>
                    </div>

                    <select class="form-control" id="rodzaj" name="rodzaj" aria-label="rodzaj" aria-describedby="rodzaj1">
                        <option value="wydarzenie" >Wydarzenie</option>
                        <option value="galeria" >Galeria</option>
                        <option value="ksiazka" >Książka</option>
                        <option value="publikacja" >Publikacja</option>
                        <option value="modlitwa" >Modlitwa</option>
                        <option value="dokument" >Dokument</option>
                        <option value="inny" >Inny</option>
{{--['ksiazka', 'galeria', 'modlitwa', 'wydarzenie', 'inny' ]--}}
                    </select>
                </div>
            </div>



        </div>
        <div class="row mt-4">


            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Nazwa zasobu:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('nazwa') ? ' is-invalid' : ' ' }}" name="nazwa" id="nazwa" value="{{ old('nazwa') }}" placeholder="Nazwa zasobu..." >
                </div>

            </div>
        </div>
        <div class="row mt-4">


            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Opis:</span>
                    </div>

                    {{--<input type="text" class="form-control" name="opis" id="opis" value="{{ old('opis') }}" placeholder="Opis zasobu..." >--}}
                    <textarea class="form-control" name="opis" id="opis"
                              rows="7"></textarea>

                </div>

            </div>
        </div>

        <div class="row mt-1">




        </div>



        <div class="row mt-3 mb-3">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </div>

        </div>


    </form>

    </div>
</div>




@endsection
