<form action="{{ route('bears.update', $bear->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ $bear->name }}">

    <label for="color">Color:</label>
    <input type="text" id="color" name="color" value="{{ $bear->color }}">

    <button type="submit">Update Bear</button>
</form>

<form action="{{ route('bears.destroy', $bear->id) }}" method="POST">
    @csrf
    @method('DELETE')

    <button type="submit">Delete Bear</button>
</form>

<a href="{{ route('bears.show', $bear->id) }}">back to show</a>
<a href="{{ route('bears.index') }}">back to index</a>
