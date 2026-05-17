# Laravel Artisan - Overzicht Terminal Commando's

Een overzicht van de meest gebruikte `php artisan` commando's voor Laravel-projecten.

---

## Bestanden aanmaken

### Controller
php artisan make:controller NaamController
# Maakt een lege controller aan

php artisan make:controller NaamController --resource
# Maakt een controller aan met alle CRUD-methodes:
# index(), create(), store(), show(), edit(), update(), destroy()

php artisan make:controller NaamController --api
# Zelfde als --resource maar ZONDER create() en edit()
# (die hebben geen zin bij een API, want geen formulieren)

php artisan make:controller NaamController --invokable
# Maakt een controller met enkel één __invoke()-methode
# Handig voor controllers die maar één taak uitvoeren

php artisan make:controller NaamController --model=Naam
# Koppelt de controller aan een model (Route Model Binding)
# Laravel vult de methodes dan automatisch in met het juiste model


### Model
php artisan make:model Naam
# Maakt alleen het Model aan

php artisan make:model Naam -m
# Model + migration (database-tabel aanmaken)

php artisan make:model Naam -c
# Model + controller

php artisan make:model Naam -s
# Model + seeder (testdata)

php artisan make:model Naam -f
# Model + factory (nep-data genereren via Faker)

php artisan make:model Naam --all
# Model + migration + controller + seeder + factory + policy
# Dit is de snelste manier om alles in één keer aan te maken


### Migration
php artisan make:migration create_namen_table
# Maakt een migration aan om een nieuwe tabel te maken
# Conventie: gebruik altijd meervoud voor de tabelnaam

php artisan make:migration add_kolom_to_namen_table
# Maakt een migration aan om een kolom toe te voegen
# Laravel herkent "add_X_to_Y" en vult de tabel automatisch in

php artisan make:migration drop_namen_table
# Maakt een migration aan om een tabel te verwijderen


### Seeder
php artisan make:seeder NaamSeeder
# Maakt een seeder aan om testdata in de database te zetten
# Voeg de seeder toe aan DatabaseSeeder.php om hem automatisch te laten lopen


### Request en Validate
php artisan make:request NaamRequest
# Maakt een Form Request aan voor validatie
# Houdt validatielogica buiten de controller — netter en herbruikbaar

php artisan make:rule NaamRule
# Maakt een custom validatieregel aan
# Gebruik dit als de ingebouwde regels van Laravel niet volstaan


### Middleware
php artisan make:middleware NaamMiddleware
# Maakt middleware aan die HTTP-verzoeken filtert voor/na de controller
# Voorbeelden: controleren of iemand ingelogd is, headers toevoegen, logging


### Policy
php artisan make:policy NaamPolicy
# Maakt een Policy aan voor autorisatielogica
# Bepaalt wie wat mag doen (view, create, update, delete)

php artisan make:policy NaamPolicy --model=Naam
# Policy direct gekoppeld aan een model
# Laravel genereert dan automatisch methodes: viewAny, view, create, update, delete, restore, forceDelete


### Events en Listeners
php artisan make:event NaamEvent
# Maakt een Event aan — een "iets is er gebeurd"-signaal in je app
# Bijvoorbeeld: UserRegistered, OrderPlaced

php artisan make:listener NaamListener
# Maakt een Listener aan die reageert op een Event

php artisan make:listener NaamListener --event=NaamEvent
# Listener direct gekoppeld aan een specifiek Event


### API Resource
php artisan make:resource NaamResource
# Maakt een API Resource aan
# Bepaalt welke velden van een model naar de JSON-response gaan

php artisan make:resource NaamCollection
# Maakt een Resource Collection aan voor lijsten van objecten
# Alternatief: php artisan make:resource Naam --collection


### Blade Components
php artisan make:component NaamComponent
# Maakt een Blade Component aan: een PHP-klasse + een view
# Herbruikbare UI-blokken (bijv. een knop, kaart, modal)

php artisan make:component NaamComponent --view
# Maakt alleen de view aan, zonder bijhorende PHP-klasse
# Handig voor simpele, logicalloze componenten


### Livewire 
php artisan make:livewire NaamComponent
# Maakt een volledig Livewire component aan:
# een PHP-klasse (app/Livewire/) + een Blade view (resources/views/livewire/)

php artisan make:livewire NaamComponent --inline
# Component zonder aparte view — de HTML staat rechtstreeks in de render()-methode
# Handig voor kleine, eenvoudige componenten

php artisan make:livewire NaamComponent --test
# Component + automatisch een test-bestand aanmaken

php artisan make:livewire Folder/NaamComponent
# Component in een submap plaatsen, bijv. Admin/UserTable
# Zowel de klasse als de view worden in de juiste submap gezet

php artisan livewire:copy OudNaam NieuwNaam
# Kopieert een bestaand Livewire component naar een nieuwe naam

php artisan livewire:move OudNaam NieuwNaam
# Verplaatst/hernoemt een Livewire component

php artisan livewire:delete NaamComponent
# Verwijdert een Livewire component (klasse + view)

php artisan livewire:layout
# Maakt een standaard layout-bestand aan (resources/views/components/layouts/app.blade.php)
# Dit is het hoofd-layout bestand dat Livewire full-page components gebruiken

php artisan livewire:publish --config
# Publiceert het Livewire configuratiebestand naar config/livewire.php

php artisan livewire:publish --views
# Publiceert de interne Livewire Blade-views zodat je ze kunt aanpassen


## Files Uitvoeren(migrations, seeders)

### migrations uitvoeren
php artisan migrate
# Voert alle nog niet uitgevoerde migrations uit

php artisan migrate:fresh
# Verwijdert ALLE tabellen en voert alle migrations opnieuw uit
# ⚠️ Let op: alle data gaat verloren

php artisan migrate:fresh --seed
# migrate:fresh + daarna alle seeders uitvoeren
# Ideaal om je database snel opnieuw te vullen met testdata 

php artisan migrate:refresh
# Draait alle migrations terug (rollback) en voert ze daarna opnieuw uit
# Verschil met fresh: gebruikt rollback in plaats van drop

php artisan migrate:refresh --seed
# migrate:refresh + seeders uitvoeren 

php artisan migrate:rollback
# Draait de laatste batch migrations terug

php artisan migrate:rollback --step=3
# Draait een specifiek aantal stappen terug

php artisan migrate:status
# Toont een overzicht van welke migrations al uitgevoerd zijn

php artisan migrate:reset
# Draait ALLE migrations terug (zonder opnieuw uit te voeren)


### Seeders Uitvoeren
php artisan db:seed
# Voert de DatabaseSeeder uit (het startpunt voor alle seeders)

php artisan db:seed --class=NaamSeeder
# Voert enkel één specifieke seeder uit


## Overig

### Routes inzien, Cache en Optimalisatie
php artisan route:list
# Toont een overzicht van alle geregistreerde routes met methode, URI, naam en controller

php artisan route:list --name=naam
# Filtert routes op naam — handig als je veel routes hebt

php artisan route:cache
# Slaat alle routes op in cache (sneller in productie)
# ⚠️ Gebruik dit niet tijdens development — gecachede routes updaten niet automatisch

php artisan route:clear
# Verwijdert de route-cache

php artisan cache:clear
# Verwijdert de applicatiecache (bijv. gecachede queries of waarden)

php artisan config:clear
# Verwijdert de config-cache

php artisan config:cache
# Slaat alle config-bestanden samen op in cache (sneller in productie)

php artisan view:clear
# Verwijdert alle gecompileerde Blade-views
# Handig als views niet lijken te updaten

php artisan optimize
# Combineert config:cache + route:cache + view:cache in één commando
# Gebruik in productie voor maximale snelheid 

php artisan optimize:clear
# Verwijdert alle caches tegelijk (config + route + view + cache)
# Handig bij problemen of na grote wijzigingen 


### Overige Handige Commands
php artisan tinker
# Opent een interactieve PHP-omgeving rechtstreeks in je Laravel app
# Handig om snel queries te testen, modellen aan te maken of data te inspecteren

php artisan serve
# Start een lokale development-server op http://localhost:8000

php artisan list
# Toont een volledig overzicht van alle beschikbare Artisan-commando's

php artisan help make:controller
# Toont uitleg en alle opties van een specifiek commando

php artisan queue:work
# Start een worker die jobs uit de queue verwerkt
# Blijft draaien totdat je hem stopt

php artisan queue:listen
# Zelfde als queue:work, maar herstart automatisch bij wijzigingen
# Handig tijdens development

php artisan storage:link
# Maakt een symbolische link van storage/app/public naar public/storage
# Nodig om geüploade bestanden publiek toegankelijk te maken
