@extends('szablon.szablon')
@section('title', 'List do redakcji - edycja')
@section('tresc')


    <form action="{{route('listEdycjaZapis', $list->id)}}" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="row mt-2">

            <div class="col-4">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="rodzaj">Status:</span>
                    </div>
                    <select class="form-control" id="status" name="status" aria-label="status"
                            aria-describedby="status">
                        <option value="Nowy" @if($list->status=='Nowy') selected @endif>Nowy</option>
                        <option value="Zakonczony" @if($list->status=='Zakonczony') selected @endif>Zakończony</option>
                        <option value="Zrobic" @if($list->status=='Zrobic') selected @endif>Zrobić</option>



                    </select>
                </div>
            </div>

        </div>

        <div class="row mt-2">

            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Treść listu:</span>
                    </div>
                    <div class="fs-6 mt-2 mb-1 bg-light border border-1 p-2">
                    {{$list->tresc}}</div>
                </div>

            </div>
        </div>


        <div class="row mt-2">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Zapisz status</button>

            </div>

        </div>
    </form>




    <button class="btn btn-danger mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#usuwanie" aria-expanded="false" aria-controls="usuwanie">
        Usuń list
    </button>
    <div class="collapse" id="usuwanie">

        <div class="card card-body col-3 text-center mt-4">
            <form action="{{route('listUsun', $list->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń list</button>


            </form>

        </div>
    </div>


    <div class="mb-5"></div>




@endsection
