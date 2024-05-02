<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WiadomosciController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\WatkiController;
use App\Http\Controllers\ZdjeciaController;
use App\Http\Controllers\PlikiController;
use App\Http\Controllers\ListyController;
use App\Http\Controllers\IntencjeController;
use App\Http\Controllers\FilmyController;
use App\Http\Controllers\StronyController;
use App\Http\Controllers\KsiegarnieController;
use App\Http\Controllers\BiogramController;
use App\Http\Controllers\ModlitwyController;
use App\Http\Controllers\KalendariumController;
use App\Http\Controllers\CzywieszController;
use App\Http\Controllers\ZasobyController;
use App\Http\Controllers\CytatController;
use App\Http\Controllers\ArtykulyController;
use App\Http\Controllers\BiografiaController;
use App\Models\Wiadomosci;
use App\Models\Zdjecia;

Route::get('/', [MenuController::class, 'menuglowne'])->name('MenuGlowne');

/*Route::get('/', function () {
    return view('tresc.menu-glowne')->name('menuGlowne');
});*/


/*Stary wzorzec
Route::get('/WiadomosciNowe', function () {
    return view('tresc.dodawanie.Wiadomosci-dodawanie');
})->name('WiadomosciNowe');
Route::post('/WiadomosciZapisNowe', 'WiadomosciController@create')->name('WiadomosciZapisNowe');
Route::get('/listaUzytkownikow', [UsersController::class, 'index']);  */

/* Wiadomosci*/

Route::get('/wiadomosciLista', [WiadomosciController::class, 'index'])->name('wiadomosciLista');
// dodawanie nowych - formularz
Route::get('/wiadomoscNowa', [WiadomosciController::class, 'nowa'])->name('wiadomoscNowa');
// dodawanie nowych - zapis
Route::post('/wiadomoscNowaZapis', [WiadomosciController::class, 'create'])->name('wiadomoscNowaZapis');
// Pojedyńczy - edycja
Route::get('/wiadomoscEdycja/{id}', [WiadomosciController::class, 'edit'])->name('wiadomoscEdycja');
// Aktualizacja - zapis
Route::post('/wiadomoscEdycjaZapis/{id}', [WiadomosciController::class, 'update'])->name('wiadomoscEdycjaZapis');
// Szukanie na liście
Route::get('/wiadomosciSzukaj', [WiadomosciController::class, 'szukaj'])->name('wiadomosciSzukaj');
// Usuwanie
Route::delete('/wiadomoscUsun/{id}', [WiadomosciController::class, 'destroy'])->name('wiadomoscUsun');

/* Wiadomosci - koniec*/


/* Watki*/
// lista wszystkich wątków
Route::get('/watkiLista', [WatkiController::class, 'index'])->name('watkiLista');

// dodawanie nowych - formularz
Route::get('/watekNowy', [WatkiController::class, 'nowy'])->name('watekNowy');
// dodawanie nowych - zapis
Route::post('/watekNowyZapis', [WatkiController::class, 'create'])->name('watekNowyZapis');
// Pojedyńczy - edycja
Route::get('/watekEdycja/{id}', [WatkiController::class, 'edit'])->name('watekEdycja');
// Aktualizacja - zapis
Route::post('/watekEdycjaZapis/{id}', [WatkiController::class, 'update'])->name('watekEdycjaZapis');
// Szukanie na liście
Route::get('/watkiSzukaj', [WatkiController::class, 'szukaj'])->name('watkiSzukaj');
// Usuwanie
Route::delete('/watekUsun/{id}', [WatkiController::class, 'destroy'])->name('watekUsun');

/* Wątki - koniec*/


/* Wątki łączenie*/

Route::post('/polaczWatek', [WatkiController::class, 'polaczWatek'])->name('polaczWatek');
Route::post('/odlaczWatek', [WatkiController::class, 'odlaczWatek'])->name('odlaczWatek');

/* Wątki łączenie - koniec*/

/*Zdjęcia*/

// lista wszystkich zdjęć
// sortowanie - wszystkie data dodania
Route::get('/zdjeciaListaDodane', [ZdjeciaController::class, 'indexDodane'])->name('zdjeciaListaDodane');
// Tylko opis
Route::post('/zdjeciaListaKategoria', [ZdjeciaController::class, 'indexKategoria'])->name('zdjeciaListaKategoria');
// przeglądanie roznych kategorii zdjęćw trybie dodawnia/załącznia
Route::post('/zdjeciaListaKategoriaDodawanie', [ZdjeciaController::class, 'indexKategoriaDodawanie'])->name('zdjeciaListaKategoriaDodawanie');

// TYlko info
// dodawanie nowych - formularz
Route::get('/zdjecieNowe', [ZdjeciaController::class, 'nowe'])->name('zdjecieNowe');
// dodawanie nowych - zapis
Route::post('/zdjecieNoweZapis', [ZdjeciaController::class, 'create'])->name('zdjecieNoweZapis');
// Pojedyńczy - edycja
Route::post('/zdjecieEdycja/{id}', [ZdjeciaController::class, 'edit'])->name('zdjecieEdycja');
// Aktualizacja - zapis
Route::post('/zdjecieEdycjaZapis/{id}', [ZdjeciaController::class, 'update'])->name('zdjecieEdycjaZapis');
// Szukanie na liście - tryb przeglądanie
Route::get('/zdjeciaSzukaj', [ZdjeciaController::class, 'szukaj'])->name('zdjeciaSzukaj');
// Szukanie na liście - tryb dodawania
Route::post('/zdjeciaSzukajDodawanie', [ZdjeciaController::class, 'szukajDodawanie'])->name('zdjeciaSzukajDodawanie');

// Usuwanie
Route::delete('/zdjecieUsun/{id}', [ZdjeciaController::class, 'destroy'])->name('zdjecieUsun');
// Dodawanie zdjecia - lista zdjęc do dodania
Route::post('/zdjeciaDodajDo', [ZdjeciaController::class, 'zdjeciaDodajDo'])->name('zdjeciaDodajDo');
// Dodanie konkretnego zdjęcia
Route::post('/zdjecieDodaj', [ZdjeciaController::class, 'zdjecieDodaj'])->name('zdjecieDodaj');

 /* Duże zdjęcia*/
// dodawanie nowych - zapis
Route::post('/zdjecieDuzeZapis/{id}', [ZdjeciaController::class, 'zdjecieDuzeZapis'])->name('zdjecieDuzeZapis');

/*Koniec Zdjęcia*/


/* Pliki - */
Route::get('/plikiLista', [PlikiController::class, 'index'])->name('plikiLista');
/* lsty dla poszczegolnych rodzajow*/
Route::post('/plikiListaRodzaj', [PlikiController::class, 'indexRodzaj'])->name('plikiListaRodzaj');
Route::post('/plikiListaRodzajDodawanie', [PlikiController::class, 'indexRodzajDodawanie'])->name('plikiListaRodzajDodawanie');


// dodawanie nowych - formularz
Route::get('/plikNowy', [PlikiController::class, 'nowy'])->name('plikNowy');
// dodawanie nowych - zapis
Route::post('/plikNowyZapis', [PlikiController::class, 'create'])->name('plikNowyZapis');
// Szukanie na liście
Route::get('/plikiSzukaj', [PlikiController::class, 'szukaj'])->name('plikiSzukaj');
// Pojedyńczy - edycja
Route::post('/plikEdycja/{id}', [PlikiController::class, 'edit'])->name('plikEdycja');
Route::post('/plikEdycjaZapis/{id}', [PlikiController::class, 'update'])->name('plikEdycjaZapis');
Route::delete('/plikUsun/{id}', [WatkiController::class, 'destroy'])->name('plikUsun');
/* Pliki - koniec*/

/* Pliki załączanie*/
// Dodawanie zdjecia - lista zdjęc do dodania
Route::post('/plikiDodawanieLista', [PlikiController::class, 'plikiDodawanieLista'])->name('plikiDodawanieLista');
// Szukanie na liście
Route::post('/plikSzukajDodawanie', [PlikiController::class, 'szukajDodawanie'])->name('plikSzukajDodawanie');
Route::post('/plikZalaczOdlacz', [PlikiController::class, 'plikZalaczOdlacz'])->name('plikZalaczOdlacz');


/* Pliki załączanie- koniec*/


/* Listy*/
// lista wszystkich listów
Route::get('/listyLista', [ListyController::class, 'index'])->name('listyLista');
// Pojedyńczy - edycja
Route::get('/listEdycja/{id}', [ListyController::class, 'edit'])->name('listEdycja');
// Aktualizacja - zapis
Route::post('/listEdycjaZapis/{id}', [ListyController::class, 'update'])->name('listEdycjaZapis');
// Szukanie na liście
Route::get('/listySzukaj', [ListyController::class, 'szukaj'])->name('listySzukaj');
// Usuwanie
Route::delete('/listUsun/{id}', [ListyController::class, 'destroy'])->name('listUsun');
/* Listy - koniec*/

/* Intencje*/
// lista wszystkich listów
Route::get('/intencjeLista', [IntencjeController::class, 'index'])->name('intencjeLista');
// Pojedyńczy - edycja
Route::get('/intencjaEdycja/{id}', [IntencjeController::class, 'edit'])->name('intencjaEdycja');
// Aktualizacja - zapis
Route::post('/intencjaEdycjaZapis/{id}', [IntencjeController::class, 'update'])->name('intencjaEdycjaZapis');
// Szukanie na liście
Route::get('/intencjeSzukaj', [IntencjeController::class, 'szukaj'])->name('intencjeSzukaj');
// Usuwanie
Route::delete('/intencjaUsun/{id}', [IntencjeController::class, 'destroy'])->name('intencjaUsun');
/* Intencje - koniec*/

/* Filmy */
/* lista wszystkich */
Route::get('/filmyLista', [FilmyController::class, 'index'])->name('filmyLista');
// dodawanie nowych - formularz
Route::get('/filmNowy', [FilmyController::class, 'nowy'])->name('filmNowy');
// dodawanie nowych - zapis
Route::post('/filmNowyZapis', [FilmyController::class, 'create'])->name('filmNowyZapis');
// Szukanie na liście
Route::get('/filmySzukaj', [FilmyController::class, 'szukaj'])->name('filmySzukaj');
// Pojedyńczy - edycja
Route::get('/filmEdycja/{id}', [FilmyController::class, 'edit'])->name('filmEdycja');
Route::post('/filmEdycjaZapis/{id}', [FilmyController::class, 'update'])->name('filmEdycjaZapis');
Route::delete('/filmUsun/{id}', [FilmyController::class, 'destroy'])->name('filmUsun');
/* Filmy - koniec*/

/* Strony internetowe */
/* lista wszystkich */
Route::get('/stronyLista', [StronyController::class, 'index'])->name('stronyLista');
// dodawanie nowych - formularz
Route::get('/stronaNowa', [StronyController::class, 'nowy'])->name('stronaNowa');
// dodawanie nowych - zapis
Route::post('/stronaNowaZapis', [StronyController::class, 'create'])->name('stronaNowaZapis');
// Szukanie na liście
Route::get('/stronySzukaj', [StronyController::class, 'szukaj'])->name('stronySzukaj');
// Pojedyńczy - edycja
Route::get('/stronaEdycja/{id}', [StronyController::class, 'edit'])->name('stronaEdycja');
Route::post('/stronaEdycjaZapis/{id}', [StronyController::class, 'update'])->name('stronaEdycjaZapis');
Route::delete('/stronaUsun/{id}', [StronyController::class, 'destroy'])->name('stronaUsun');
/* Strony internetowe - koniec*/

/* Książka - gdzie kupić */
/* lista wszystkich */
Route::get('/ksiegarnieLista', [KsiegarnieController::class, 'index'])->name('ksiegarnieLista');
// dodawanie nowych - formularz
Route::get('/ksiegarniaNowa', [KsiegarnieController::class, 'nowy'])->name('ksiegarniaNowa');
// dodawanie nowych - zapis
Route::post('/ksiegarniaNowaZapis', [KsiegarnieController::class, 'create'])->name('ksiegarniaNowaZapis');
// Szukanie na liście
Route::get('/ksiegarnieSzukaj', [KsiegarnieController::class, 'szukaj'])->name('ksiegarnieSzukaj');
// Pojedyńczy - edycja
Route::get('/ksiegarniaEdycja/{id}', [KsiegarnieController::class, 'edit'])->name('ksiegarniaEdycja');
Route::post('/ksiegarniaEdycjaZapis/{id}', [KsiegarnieController::class, 'update'])->name('ksiegarniaEdycjaZapis');
Route::delete('/ksiegarniaUsun/{id}', [KsiegarnieController::class, 'destroy'])->name('ksiegarniaUsun');
/* Książka - gdzie kupić - koniec*/

/* Biogram */
/* lista wszystkich */
Route::get('/biogramLista', [BiogramController::class, 'index'])->name('biogramLista');
// dodawanie nowych - formularz
Route::get('/biogramNowy', [BiogramController::class, 'nowy'])->name('biogramNowy');
// dodawanie nowych - zapis
Route::post('/biogramNowyZapis', [BiogramController::class, 'create'])->name('biogramNowyZapis');
// Szukanie na liście
Route::get('/biogramSzukaj', [BiogramController::class, 'szukaj'])->name('biogramSzukaj');
// Pojedyńczy - edycja
Route::get('/biogramEdycja/{id}', [BiogramController::class, 'edit'])->name('biogramEdycja');
Route::post('/biogramEdycjaZapis/{id}', [BiogramController::class, 'update'])->name('biogramEdycjaZapis');
Route::delete('/biogramUsun/{id}', [BiogramController::class, 'destroy'])->name('biogramUsun');
/* Biogram - koniec*/

/* Modlitwy */
/* lista wszystkich */
Route::get('/modlitwyLista', [ModlitwyController::class, 'index'])->name('modlitwyLista');
// dodawanie nowych - formularz
Route::get('/modlitwaNowa', [ModlitwyController::class, 'nowy'])->name('modlitwaNowa');
// dodawanie nowych - zapis
Route::post('/modlitwaNowaZapis', [ModlitwyController::class, 'create'])->name('modlitwaNowaZapis');
// Szukanie na liście
Route::get('/modlitwySzukaj', [ModlitwyController::class, 'szukaj'])->name('modlitwySzukaj');
// Pojedyńczy - edycja
Route::get('/modlitwyEdycja/{id}', [ModlitwyController::class, 'edit'])->name('modlitwyEdycja');
Route::post('/modlitwyEdycjaZapis/{id}', [ModlitwyController::class, 'update'])->name('modlitwyEdycjaZapis');
Route::delete('/modlitwymUsun/{id}', [ModlitwyController::class, 'destroy'])->name('modlitwymUsun');
/* Modlitwy - koniec*/

/* Kalendarium */
/* lista wszystkich */
Route::get('/kalendariumLista', [KalendariumController::class, 'index'])->name('kalendariumLista');
// dodawanie nowych - formularz
Route::get('/kalendariumNowe', [KalendariumController::class, 'nowy'])->name('kalendariumNowe');
// dodawanie nowych - zapis
Route::post('/kalendariumNoweZapis', [KalendariumController::class, 'create'])->name('kalendariumNoweZapis');
// Szukanie na liście
Route::get('/kalendariumSzukaj', [KalendariumController::class, 'szukaj'])->name('kalendariumSzukaj');
// Pojedyńczy - edycja
Route::get('/kalendariumEdycja/{id}', [KalendariumController::class, 'edit'])->name('kalendariumEdycja');
Route::post('/kalendariumEdycjaZapis/{id}', [KalendariumController::class, 'update'])->name('kalendariumEdycjaZapis');
Route::delete('/kalendariumUsun/{id}', [KalendariumController::class, 'destroy'])->name('kalendariumUsun');
// kalendarium - pokaż dla konkretnego miesiąca
Route::get('/kalendariumPokazMiesiac', [KalendariumController::class, 'pokazMiesiac'])->name('kalendariumPokazMiesiac');

/* Kalendarium - koniec*/


/* Czy wiesz że */
/* lista wszystkich */
Route::get('/czywieszLista', [CzywieszController::class, 'index'])->name('czywieszLista');
// dodawanie nowych - formularz
Route::get('/czywieszNowe', [CzywieszController::class, 'nowy'])->name('czywieszNowe');
// dodawanie nowych - zapis
Route::post('/czywieszNoweZapis', [CzywieszController::class, 'create'])->name('czywieszNoweZapis');
// Szukanie na liście
Route::get('/czywieszSzukaj', [CzywieszController::class, 'szukaj'])->name('czywieszSzukaj');
// Pojedyńczy - edycja
Route::get('/czywieszEdycja/{id}', [CzywieszController::class, 'edit'])->name('czywieszEdycja');
Route::post('/czywieszEdycjaZapis/{id}', [CzywieszController::class, 'update'])->name('czywieszEdycjaZapis');
Route::delete('/czywieszUsun/{id}', [CzywieszController::class, 'destroy'])->name('czywieszUsun');
/* Czy wiesz że - koniec*/

/* Zasoby */
/* lista wszystkich */
Route::get('/zasobyLista', [ZasobyController::class, 'index'])->name('zasobyLista');
// dodawanie nowych - formularz
Route::get('/zasobNowy', [ZasobyController::class, 'nowy'])->name('zasobNowy');
// dodawanie nowych - zapis
Route::post('/zasobNowyZapis', [ZasobyController::class, 'create'])->name('zasobNowyZapis');
// Szukanie na liście
Route::get('/zasobySzukaj', [ZasobyController::class, 'szukaj'])->name('zasobySzukaj');
// Pojedyńczy - edycja
Route::get('/zasobEdycja/{id}', [ZasobyController::class, 'edit'])->name('zasobEdycja');
Route::post('/zasobEdycjaZapis/{id}', [ZasobyController::class, 'update'])->name('zasobEdycjaZapis');
Route::delete('/zasobyUsun/{id}', [ZasobyController::class, 'destroy'])->name('zasobyUsun');
/* Zasoby - koniec*/


/* Cytat */
/* lista wszystkich */
Route::get('/cytatLista', [CytatController::class, 'index'])->name('cytatLista');
// dodawanie nowych - formularz
Route::get('/cytatNowy', [CytatController::class, 'nowy'])->name('cytatNowy');
// dodawanie nowych - zapis
Route::post('/cytatNowyZapis', [CytatController::class, 'create'])->name('cytatNowyZapis');
// Szukanie na liście
Route::get('/cytatSzukaj', [CytatController::class, 'szukaj'])->name('cytatSzukaj');
// Pojedyńczy - edycja
Route::get('/cytatEdycja/{id}', [CytatController::class, 'edit'])->name('cytatEdycja');
Route::post('/cytatEdycjaZapis/{id}', [CytatController::class, 'update'])->name('cytatEdycjaZapis');
Route::delete('/cytatUsun/{id}', [CytatController::class, 'destroy'])->name('cytatUsun');
/* Cytat - koniec*/

/* Artykuly */
/* lista wszystkich */
Route::get('/artykulyLista', [ArtykulyController::class, 'index'])->name('artykulyLista');
// dodawanie nowych - formularz
Route::get('/artykulNowy', [ArtykulyController::class, 'nowy'])->name('artykulNowy');
// dodawanie nowych - zapis
Route::post('/artykulNowyZapis', [ArtykulyController::class, 'create'])->name('artykulNowyZapis');
// Szukanie na liście
Route::get('/artykulySzukaj', [ArtykulyController::class, 'szukaj'])->name('artykulySzukaj');
// Pojedyńczy - edycja
Route::get('/artykulEdycja/{id}', [ArtykulyController::class, 'edit'])->name('artykulEdycja');
Route::post('/artykulEdycjaZapis/{id}', [ArtykulyController::class, 'update'])->name('artykulEdycjaZapis');
Route::delete('/artykulUsun/{id}', [ArtykulyController::class, 'destroy'])->name('artykulUsun');

/* Koniec artykuly */



/* Biografia */
/* lista wszystkich */
Route::get('/biogafiaLista', [BiografiaController::class, 'index'])->name('biogafiaLista');
// dodawanie nowych - formularz
Route::get('/biogafiaNowy', [BiografiaController::class, 'nowy'])->name('biogafiaNowy');
// dodawanie nowych - zapis
Route::post('/biogafiaNowyZapis', [BiografiaController::class, 'create'])->name('biogafiaNowyZapis');
// Szukanie na liście
Route::get('/biogafiaSzukaj', [BiografiaController::class, 'szukaj'])->name('biogafiaSzukaj');
// Pojedyńczy - edycja
Route::get('/biogafiaEdycja/{id}', [BiografiaController::class, 'edit'])->name('biogafiaEdycja');
Route::post('/biogafiaEdycjaZapis/{id}', [BiografiaController::class, 'update'])->name('biogafiaEdycjaZapis');
Route::delete('/biogafiaUsun/{id}', [BiografiaController::class, 'destroy'])->name('biogafiaUsun');

/* Koniec biografia */




/* test*/
Route::get('/test',
    function (){
$wiad=Wiadomosci::find(1);
$foto=Zdjecia::find(3);
//$foto_id=2;
$foto_id=$foto->id;
$wiad->zdjecia()->detach([$foto_id]);
       // dd($wiad);
        //$wiad->zdjecia()->create(['plik'=>'gdfgdf']);
       // $wiad->zdjecia()->attach($foto_id, ['rodzaj'=>'Galeria']);
      /* // dd($foto->wiadomosc);

       // $wiadomosci = Wiadomosci::all();
       // $zdjecia = Zdjecia::all();
        //dd(Zdjecia::class->zdjeciaGalerie());*/

    }

);

