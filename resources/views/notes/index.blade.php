<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Notes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-50">
    <div class="max-w-3xl mx-auto p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Notes</h1>

        <a href="{{ route('notes.create') }}" class="inline-block px-3 py-2 bg-green-500 text-white rounded">Create Note</a>

        <ul class="mt-4">
            @foreach($notes as $note)
                <li class="border rounded p-3 mb-3 bg-white shadow-sm">
                    <a href="{{ route('notes.show', $note) }}" class="text-indigo-600 font-medium">{{ $note->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
