// funkcja samowywołując
(function(){


// koniec funkcji samowywołujacej


})();



// Funkcja skrolowania do góry

// When the user scrolls down 20px from the top of the document, show the button --> https://www.w3schools.com/howto/howto_js_scroll_to_top.asp
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    //console.log(document.body.scrollHeight);
    //console.log(document.body.scrollTop + 200)
  // console.log(document.documentElement.scrollTop + 1000)
  //  console.log(document.body.scrollHeight)

    if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {

        document.getElementById("myBtn").style.display = "block";
        document.getElementById("menuGlowneDol").style.display = "block";
        document.getElementById("btnDol").style.display = "none";

    } else {
        document.getElementById("myBtn").style.display = "none";
        document.getElementById("menuGlowneDol").style.display = "none";
        document.getElementById("btnDol").style.display = "block";
    }

    if (document.body.scrollTop + 1200 > document.body.scrollHeight || document.documentElement.scrollTop + 1200 > document.body.scrollHeight) {

      // console.log('Nie ma')
      // document.getElementById("btnDol").style.display = "none";
    } else {
      //  console.log('Jest')
      //  document.getElementById("btnDol").style.display = "block";
    }


}


// When the user clicks on the button, scroll to the top of the document
function topFunction() {

    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
   // console.log('Jest')
   // document.getElementById("btnDol").style.display = "block";
}

function bottomFunction() {

    window.scrollTo(0,document.body.scrollHeight);
   // document.getElementById("btnDol").style.display = "none";

}

/*setTimeout(function() {
    document.getElementById("komunikat").visibility = "hidden";

}, 20000);*/

/*
document.getElementById("toastbtn").onclick = function() {
    var toastElList = [].slice.call(document.querySelectorAll('.toast'))
    var toastList = toastElList.map(function(toastEl) {
        return new bootstrap.Toast(toastEl)
    })
    toastList.forEach(toast => toast.show())
}*/

/*$(document).ready(function() {
    $('.edytor1').richText();
    //console.log('Jest')
});*/
