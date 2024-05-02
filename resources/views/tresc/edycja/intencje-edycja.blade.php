@extends('szablon.szablon')
@section('title', 'Intencje, świadectwa - edycja')
@section('tresc')


    <form action="{{route('intencjaEdycjaZapis', $intencja->id)}}" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="row mt-2">

            <div class="col-4">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="rodzaj">Status:</span>
                    </div>
                    <select class="form-control" id="status" name="status" aria-label="status"
                            aria-describedby="status">
                        <option value="Nowa" @if($intencja->status=='Nowa') selected @endif>Nowa</option>
                        <option value="Opublikowana" @if($intencja->status=='Opublikowana') selected @endif>Opublikowana</option>
                        <option value="Archiwum" @if($intencja->status=='Archiwum') selected @endif>Archiwum</option>



                    </select>
                </div>
            </div>
            <div class="col-4">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="rodzaj">Typ:</span>
                    </div>
                    <select class="form-control" id="typ" name="typ" aria-label="typ"
                            aria-describedby="typ">
                        <option value="intencja" @if($intencja->typ=='intencja') selected @endif>Intencja</option>
                        <option value="swiadectwo" @if($intencja->typ=='swiadectwo') selected @endif>Świadectwo</option>




                    </select>
                </div>
            </div>

        </div>

        <div class="row mt-2">

            <div class="col-12">
                {{--<div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Treść nadesłana:</span>
                    </div>--}}
                    <label for="tresc_nadeslana" class="form-label bg-light p-2 border border-1">Treść nadesłana:</label>
                    <div class="fs-6 mt-2 mb-1 bg-light border border-1 p-2" id="tresc_nadeslana">
                    {{$intencja->tresc_nadeslana}}</div>
                </div>

            </div>
            </div>
        <div class="row mt-2">
            <div class="col-12">
                <label for="tresc_opublikowana" class="form-label bg-light p-2 border border-1">Tresc opublikowana:</label>
                {{--<div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Tresc opublikowana:</span>
                    </div>--}}
                    <textarea class="form-control" name="tresc_opublikowana" id="tresc_opublikowana" rows="10">{{$intencja->tresc_opublikowana}}</textarea>
                </div>

            </div>



        <div class="row mt-2">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Zapisz</button>

            </div>

        </div>
    </form>




    <button class="btn btn-danger mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#usuwanie" aria-expanded="false" aria-controls="usuwanie">
        Usuń
    </button>
    <div class="collapse" id="usuwanie">

        <div class="card card-body col-3 text-center mt-4">
            <form action="{{route('intencjaUsun', $intencja->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń</button>


            </form>

        </div>
    </div>


    <div class="mb-5"></div>




@endsection
