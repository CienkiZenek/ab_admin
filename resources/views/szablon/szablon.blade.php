<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Panel redakcyjny')</title>
    <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap-css/bootstrap-reboot.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap-css/bootstrap.min.css')}}">
    {{-- <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap-css/bootstrap-grid.min.css')}}">--}}
    <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap-css/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/css/lightbox.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/css/fonty.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/css/styleAdmin.css')}}">
    {{--<link rel="stylesheet" href="{{ URL::asset('/richtext/richtext.min.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
--}}
</head>
<body>
{{--
Święty Michale Archaniele,
 wspomagaj nas w walce, a przeciw niegodziwości
  i zasadzkom złego ducha bądź naszą obroną.
   Oby go Bóg pogromić raczył, pokornie o to prosimy,
    a Ty, Wodzu niebieskich zastępów, szatana i inne
     duchy złe, które na zgubę dusz ludzkich po tym
      świecie krążą, mocą Bożą strąć do piekła. Amen.
--}}
<div class="container " id="zawartoscGlowna">
    @include('dodatki.komunikaty')

    @if (!isset($menuGlowne))
        <div class="row mt-4 mb-4 bg-info rounded-2 p-2">
        <div class="col-2 ">
    <span class="badge bg-warning fs-6 text-dark"><a href="{{route('MenuGlowne')}}" class="link-dark text-decoration-none">Menu główne
</a></span>
        </div>


            <div class="col-2 ">
                @if(isset($listaRoutName))

                    @if(isset($listaRoutName))


                        <span class="badge bg-warning fs-6 text-dark"><a href="{{route($listaRoutName)}}" class="link-dark text-decoration-none">{{$nazwaListy}}
</a></span>

                    @endif
                    @endif
            </div>

            @if(isset($tryb_edycji_zdjecia))
                <div class="col-2 ">
                <span class="badge bg-warning fs-6 text-dark"><a href="{{route('zdjecieNowe')}}" class="link-dark text-decoration-none">Dodaj nowe zdjęcie
</a></span>
        </div>
            @endif



        </div>
    @endif





    <div>
        @yield('tresc')
    </div>



</div>
<div class="container">
<div class="tlo-szare1 text-center row mt-5">
    <div class="col-2 fs-6 fw-lighter">Wersja: {{ config('AdminBobola.wersja') }}</div>
    <div class="col-8 text-center ">&reg; RedakcjaAndrzejBobola.info 2024 </div>
    <div class="col-2"></div>
</div>
</div>

{{--<footer class="bg-secondary row text-white mt-auto py-2">


    <div class="col-2 fs-6 fw-lighter">Wersja: {{ config('AdminBobola.wersja') }}</div>
    <div class="col-8 text-center ">&reg; AndrzejBobola.info 2024 </div>
    <div class="col-2"></div>


</footer>--}}

<button onclick="bottomFunction()" id="btnDol" title="Do dołu">Do dołu</button>
<button onclick="topFunction()" id="myBtn" title="Do góry">Do góry</button>
<div id="menuGlowneDol" class="">
    <span  class="badge bg-warning text-dark"><a href="{{route('MenuGlowne')}}" class="link-dark ">Menu główne
</a></span>
</div>

</body>

<script src="{{ URL::asset('/js/jquery-3.7.1.min.js')}}"></script>
<script src="{{ URL::asset('/js/bootstrap-js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ URL::asset('/js/scriptsWspolneAdmin.js')}}"></script>
<script src="{{ URL::asset('/js/lightbox.js')}}"></script>
{{--<script src="{{ URL::asset('/richtext/jquery.richtext.js')}}"></script>--}}

{{--<script src="{{ asset('/js/scriptWatkiDodawanie.js')}}"></script>--}}

</html>
