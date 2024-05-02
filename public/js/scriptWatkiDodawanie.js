
$(document).ready(function () {

 //   console.log('Watki')




// funkcja dodawania wątków do wiadomości

/*

$(document).on('click', '#dodajWantek', function () {
    var watek_id=$("#watek_id").val();
    var tresc_id=$("#tresc_id").val();
    var dzial=$("#dzial").val();
    console.log("Wątek start");
    console.log(watek_id);
    console.log(tresc_id);
    console.log(dzial);

    $.ajax({
        type:'get',
        url:'/polaczWatek',
        data:{'watek_id':watek_id, 'tresc_id':tresc_id, 'dzial':dzial},

        success:function (data) {
            window.open("/poWatek/"+tresc_id,"_self")
            console.log("Wątek dodany!");

        }
        ,
        error:function () {
        }
    });


})
// funkcja odłączania wątków od wiadomości
$(document).on('click', '.usunWatekWiadomosc', function () {
    var watek_id=this.id;
    var wiadomosc_id=$("#wiadomosc_id").val();
    //console.log("sssssssss");
    $.ajax({
        type:'get',
        url:'/watekUsunWiadomosc',
        data:{'watek_id':watek_id, 'wiadomosc_id':wiadomosc_id},
        success:function (data) {

            window.open("/wiadomoscPoWatek/"+wiadomosc_id,"_self")
            console.log("Wątek usunięty!");


        },
        error:function () {
        }
    });


})


*/



//koniec $(document).ready
})
