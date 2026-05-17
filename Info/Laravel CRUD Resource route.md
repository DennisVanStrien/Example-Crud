# English version
I am too lazy at the moment to make it.
<br>

# Nederlandse versie
Je kunt met één simpel commando alle CRUD functionaliteiten in je web.php zetten, dit vervangt dus alle zeven losse routes en houdt je code lekker overzichtelijk.
<br>
In plaats van zo alle crud routes neer te zetten: <br>
Route::get('/bears', [BearController::class, 'index'])->name('bears.index'); <br>
Route::get('/bears/create', [BearController::class, 'create'])->name('bears.create'); <br>
Route::post('/bears', [BearController::class, 'store'])->name('bears.store'); <br>
Route::get('/bears/{id}', [BearController::class, 'show'])->name('bears.show'); <br>
Route::get('/bears/{id}/edit', [BearController::class, 'edit'])->name('bears.edit'); <br>
Route::put('/bears/{id}', [BearController::class, 'update'])->name('bears.update'); <br>
Route::delete('/bears/{id}', [BearController::class, 'destroy'])->name('bears.destroy'); <br>
<br> 

Heb je 1 line code: <br>
Route::resource('bears', BearController::class); <br>
<br>

**Let op**: Je bent wel verplicht dan om je aan de standaard conventies van laravel te houden. (Dus je kunt de url niet aanpassen, de index van bear gaat dus ALTIJD /bears zijn.)

### Hoe doe je dit?
Gebruik het volgende commando: <br>
<br>
"php artisan make:model Bear -mcr" (Verander Bear met de model name van jouw model) <br>
<br>
Dit commando maakt je Model, de Migratie voor je model en een Controller die direct is gevuld met de 7 lege CRUD-functies. <br>
**Fun fact: MCR staat voor Model, Migration, Resource.** <br>
Vervolgens voeg je de route handmatig toe aan je web.php: <br>
"Route::resource('bears', BearController::class);" (Verander bears met je model name en de controller met de controller name.) <br>
 <br>
Dat zou alles moeten zijn. Je kan ook nog checken of alles goed staat. Dit kan met het volgende commando: <br>
"php artisan route:list" dit zou alle 7 actieve routes in je terminal moeten laten zien. <br>
