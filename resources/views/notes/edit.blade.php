<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Note</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-50">
    <div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Edit Note</h1>

        <form method="POST" action="{{ route('notes.update', $note) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block font-medium text-gray-700">Title</label>
                <input id="title" name="title" value="{{ old('title', $note->title) }}" required class="mt-1 block w-full border rounded px-2 py-1" />
            </div>
            <div class="mb-4">
                <label for="content" class="block font-medium text-gray-700">Content</label>
                <textarea id="content" name="content" class="mt-1 block w-full border rounded px-2 py-1">{{ old('content', $note->content) }}</textarea>
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-black rounded">Update</button>
        </form>
    </div>
</body>
</html>
