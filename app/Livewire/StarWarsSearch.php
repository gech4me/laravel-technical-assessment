<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\View\View;
use App\Services\StarWarsService;

class StarWarsSearch extends Component
{
    public string $search = '';
    public array $results = [];
    public bool $searched = false;
    public ?string $error = null;

    private StarWarsService $starWarsService;

    public function boot(StarWarsService $starWarsService): void
    {
        $this->starWarsService = $starWarsService;
    }

    public function searchPeople(): void
    {
        $this->validate([
            'search' => 'required|min:2',
        ]);

        try {
            $response = $this->starWarsService->searchPeople($this->search);

            $this->results = $response['results'] ?? [];
            $this->error = $response['error'] ?? null;
        } catch (\Throwable $e) {
            $this->results = [];
            $this->error = 'An error occurred: ' . $e->getMessage();
        }

        $this->searched = true;
    }

    public function render(): View
    {
        return view('livewire.star-wars-search');
    }
}