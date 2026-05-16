<form action="{{ route('bears.store') }}" method="POST">
    @csrf

    <label for="name">Name:</label>
    <input type="text" id="name" name="name">

    <label for="color">Color:</label>
    <input type="text" id="color" name="color">

    <button type="submit">Create Bear</button>
</form>

<a href="{{ route('bears.index') }}">back to index</a>
