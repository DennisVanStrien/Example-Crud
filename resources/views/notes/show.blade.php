<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $note->title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-50">
    <div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">{{ $note->title }}</h1>


        <div class="text-gray-700 mb-4">{{ $note->content }}</div>

        <form method="POST" action="{{ route('notes.attachUser', $note) }}" class="mb-4">
            @csrf
            <label for="user_id" class="block font-medium text-gray-700 mb-2">Add user to this note</label>
            <div class="flex items-center">
                <select id="user_id" name="user_id" class="border rounded px-2 py-1">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
                <button type="submit" class="ml-3 px-3 py-2 bg-green-600 text-white rounded" style="background:#16a34a;color:#fff;padding:8px 12px;border-radius:6px;margin-left:12px;cursor:pointer;">Add</button>
            </div>
        </form>

        <p class="font-medium">Users with this note:</p>
        <ul class="mb-4">
            @foreach($note->users as $user)
                <li class="text-sm text-gray-600">{{ $user->name }} ({{ $user->email }})</li>
            @endforeach
        </ul>

        <a href="{{ route('notes.edit', $note) }}" class="inline-block px-3 py-2 bg-yellow-500 text-white rounded" style="background:#f59e0b;color:#000;padding:8px 12px;border-radius:6px;display:inline-block;">Edit</a>
        <form method="POST" action="{{ route('notes.destroy', $note) }}" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="inline-block px-3 py-2 bg-red-600 text-black rounded ml-2" style="background:#dc2626;color:#fff;padding:8px 12px;border-radius:6px;margin-left:8px;">Delete</button>
        </form>
    </div>
</body>
</html>
