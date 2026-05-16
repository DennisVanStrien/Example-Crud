<div>
    <h2>{{ $bear->name }}</h2>
    <p>{{ $bear->color }}</p>
</div>

<a href="{{ route('bears.index') }}">back to index</a>
<a href="{{ route('bears.edit', $bear->id) }}">edit</a>
