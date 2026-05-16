Documentation: https://livewire.laravel.com/docs/4.x/installation

## Quick heads up before reading this
I encountered bugs while trying to make this and writing it out, so not everything might be the same. But most should, I hope this helps you enough to understand it. You can always ask AI to explain you how things work, or google it.

## Creating a layout
Command: php artisan livewire:layout
This creates a livewire layout, mostly the same as a normal layout but it includes "@livewireStyles" and "@livewireScripts".
@livewireStyles will make sure the Livewire CSS is prepared and works correctly. This is required to load in the styling livewire requires.
@livewireScripts will make sure the Livewire JavaScript is prepared and function correctly. This is required for actions such as clicking, opening modals, submitting forms and live updates.


## Creating the "Controller"
Command: php artisan make:livewire Name
Example: php artisan make:livewire BearIndex
You can find the component at resources/views/components.(Not sure if thats automatically made too) and you can find views inside of resources/views/components. In my case with volt neither got made, so I don't know which of the two is automatically generated while using a command. In my other school project it made a view and a controller using the command. With the view found inside resources/views/livewire and the controller inside app/Livewire. 
You can find the "Controller" in app/Livewire. Think of it like this is the "Controller" of your component.
In this project I will use livewire views instead of components.


## How is the controller connected to the livewire view/component?
The connection is handled inside the Livewire Controller using the render() function.
This is done automatically when both the view and the controller have the same name. For example: The view: customer-search.blade.php & The controller: CustomerSearch.php.
To connect it manually, go to the render() function of the controller and use return view(name). The root is always the 'resources/views' folder. so say you want to connect it to form.blade.php inside of livewire folder inside of views do this:
'return view('livewire.form') like you would in a controller.

## Loading in a livewire view
Simply use @livewire('name').
Example: @livewire('bear-index')

## !!!Important!!!
This happened to me too. If php artisan make:livewire name does only create a component in your view folder but never makes the "controller"/a file inside app/http/livewire,
then you might have installed "Livewire volt" instead of "Livewire". If so, your component should have a "⚡" emoji in front of it.
Livewire volt has the "Controller" logic and "view" logic combined into one. You can use this if you'd like, but in this file I'll explain regular Livewire.
Just a heads up for why it might look and/or work different.

### Solutions I have found that work (A wayaround)
To create a component + the "Controller" while volt is installed
Simply add --class behind it, doing this will make a "Controller" like the usual livewire.
Example: php artisan make:livewire BearIndex --class


## Important 2
You can use livewire views, but I prefer to use livewire components and load those in, in my normal views.
So if you'd like to use livewire views, there won't be much of explaination in here. Check the livewire documentation.
