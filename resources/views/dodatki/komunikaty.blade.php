
    @if(session('komunikat'))
        <div class="alert alert-primary" id="komunikat" >
        {{ session('komunikat') }}
    </div>
        <script>
            //console.log('Jest')
            setTimeout(function() {
                //console.log('Jest33')
                /*document.getElementById("komunikat").style.visibility = "hidden";*/
                document.getElementById("komunikat").style.display = "none";

            }, 10000);
        </script>
@endif

