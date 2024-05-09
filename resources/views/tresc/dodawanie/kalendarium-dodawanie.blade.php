@extends('szablon.szablon')
@section('title', 'Kalendarium - nowy wpis')
@section('tresc')

<div class="row">

</div>
    <form action="{{route('kalendariumNoweZapis')}}" method="POST">
        @csrf

        <div class="row mt-3">
            <div class="col-5">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Data (YYYY-mm-dd):</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('data') ? ' is-invalid' : ' ' }}" name="data" id="data" value="{{ old('data') }}" placeholder="Data..." >
                </div>

            </div>

            <div class="col-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="status1">Status:</span>
                    </div>


                    <select class="form-control{{ $errors->has('status') ? ' is-invalid' : ' ' }}" id="status" name="status" aria-label="status" aria-describedby="status1">
                        <option value="Robocze" >Robocze</option>
                        <option value="Opublikowane" >Opublikowane</option>


                    </select>
                </div>



            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Tytuł:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('tytul') ? ' is-invalid' : ' ' }}" name="tytul" id="tytul" value="{{ old('tytul') }}" placeholder="Tytuł..." >
                </div>

            </div>
        </div>


        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Nagłówek:</span>
                    </div>
                    <textarea class="form-control" rows="3" name="naglowek" id="naglowek" aria-label="naglowek1:">{{ old('naglowek') }}</textarea>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Treść:</span>
                    </div>
                    <textarea class="form-control" rows="5" name="tresc" id="tresc" aria-label="tresc1:">{{ old('tresc') }}</textarea>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </div>

        </div>
        <div class="mb-4"></div>

    </form>

    </div>
</div>




@endsection
