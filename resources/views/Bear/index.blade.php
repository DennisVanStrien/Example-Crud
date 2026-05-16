<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bear</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- This is the link to load Tailwind CSS and JavaScript. If you don't need JavaScript, you can remove 'resources/js/app.js'. --}}
</head>
<body>
    <h1>Bear</h1>
    <p> Dit is de index van de bear. Deze hebben GEEN relaties. </p>
    <img src="img/bear.png" alt="Bear Image" class="w-64 h-auto mb-4"> {{-- This is an example of how to add an image. You can replace the src with the path to your own image. You always start from the public map. --}}
    @if ($bears->isNotEmpty()) {{-- We check if the there are any bears. If there are, we display them. Example: If you did not have this check, and you would do the foreach while there are no bears, the website would show an error. --}}

    @foreach ($bears as $bear)
        <div class="bg-gray-200 p-4 mb-4 rounded">
            <h2>{{ $bear->name }}</h2>
            <p>{{ $bear->color }}</p>
            <a href="{{ route('bears.show', $bear->id) }}" class="text-blue-500 hover:underline">Bear bekijken</a>
        </div>

    @endforeach
    @else
        <p>Er zijn momenteel nog GEEN "Bears".</p>
    @endif

    <a href="{{ route('bears.create') }}">Create new Bear</a>

    <br>

    @livewire('bear-index') {{-- This is how you include the Livewire component. You can replace 'bear-index' with the name of your own component. --}}
</body>
</html>
