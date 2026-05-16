Documentation: https://livewire.laravel.com/docs/4.x/installation

## Creating a layout
Command: php artisan livewire:layout
This creates a livewire layout, mostly the same as a normal layout but it includes "@livewireStyles" and "@livewireScripts".
@livewireStyles will make sure the Livewire CSS is prepared and works correctly. This is required to load in the styling livewire requires.
@livewireScripts will make sure the Livewire JavaScript is prepared and function correctly. This is required for actios such as clicking, opening modals, submitting forms and live updates.


## Creating a component + the "Controller"
Command: php artisan make:livewire Name
Example: php artisan make:livewire BearIndex
You can find the component at resources/views/components. Think of it like this is your "view" but for livewire.




## !!!Important!!!
This happened to me too. If php artisan make:livewire name does only create a component in your view folder but never makes the "controller"/a file inside app/http/livewire,
then you might have installed "Livewire volt" instead of "Livewire". If so, your component should have a "⚡" emoji infront of it.
Livewire volt has the "Controller" logic and "view" logic combined into one. You can use this if you'd like, but in this file I'll explain regular Livewire.
Just a heads up for why it might look and/or work different.

To create a component + the "Controller" while volt is installed
Simply add --class behind it, doing this will make a "Controller" and Component ("View") like the usual livewire.
Example: php artisan make:livewire BearIndex -- class
