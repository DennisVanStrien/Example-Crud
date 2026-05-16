<?php

namespace App\Livewire;

use App\Models\Bear;
use Livewire\Component;

class BearIndex extends Component
{
    public string $search = ''; // added a new property for filtering by name. On default its an empty string, which means no filter.
    public string $color = ''; // added a new property for filtering by color. On default its an empty string, which means no filter.

    public function render()
    {
        $query = Bear::query(); // Start with all bears.

        if ($this->search !== '') {
            $query->where('name', 'like', '%' . $this->search . '%'); // Only show bears with a matching name.
        }

        if ($this->color !== '') {
            $query->where('color', 'like', '%' . $this->color . '%'); // Only show bears with a matching color.
        }

        return view('livewire.bear-index', [
            'bears' => $query->orderBy('name')->get(), // Get the filtered bears and send them to the view.
        ]); // Load the Livewire view.
    }

    public function clearFilters(): void
    {
        $this->reset(['search', 'color']);
    }
}
