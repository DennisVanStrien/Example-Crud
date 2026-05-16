<div>
    <p> Dit is een livewire index, ja dat is wel cool he. </p>

    <div style="margin-bottom: 16px;">
        <input
            type="text"
            placeholder="Zoek op naam"
            wire:model.live="search"
        >

        <input
            type="text"
            placeholder="Filter op kleur"
            wire:model.live="color"
        >

        <button type="button" wire:click="clearFilters">
            Clear
        </button>
    </div>

    @forelse ($bears as $bear)
        <div>
            <strong>{{ $bear->name }}</strong> - {{ $bear->color }}
        </div>
    @empty
        <p>Geen bears gevonden.</p>
    @endforelse
</div>
