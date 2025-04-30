<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\ActorService;
use Illuminate\View\View;

class ActorList extends Component
{
    public string $search = '';
    public array $actors = [];
    public bool $searched = false;
    public ?string $error = null;

    private ActorService $actorService;

    public function boot(ActorService $actorService): void
    {
        $this->actorService = $actorService;
    }
    public function mount(): void
    {
        $this->searchActors();
    }

    public function searchActors(): void
    {

        try {
            $actors = $this->actorService->searchActors($this->search);

            if (count($actors) > 0) {
                $this->actors = $actors;
                $this->error = null;
            } else {
                $this->actors = [];
                $this->error = 'No actors found.';
            }
        } catch (\Throwable $e) {
            $this->actors = [];
            $this->error = 'An error occurred: ' . $e->getMessage();
        }

        $this->searched = true;
    }

    public function render(): View
    {
        return view('livewire.actor-list');
    }
}