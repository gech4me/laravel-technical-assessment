<?php

namespace Tests\Feature\Livewire;

use Livewire\Livewire;
use Tests\TestCase;
use App\Models\Actor;
use App\Models\Movie;
use App\Livewire\ActorList;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActorListTest extends TestCase
{
    use RefreshDatabase;

    public function test_search_actors_validation_fails_on_empty_input(): void
    {
        Livewire::test(ActorList::class)
                ->call('searchActors')
                ->assertHasErrors(['search' => 'required']);
    }

    public function test_search_actors_validation_fails_if_less_than_two_characters(): void
    {
        Livewire::test(ActorList::class)
                ->set('search', 'B')
                ->call('searchActors')
                ->assertHasErrors(['search' => 'min']);
    }

    public function test_search_actors_success(): void
    {
        $actor = Actor::factory()->create(['name' => 'Bruce Wayne']);
        Movie::factory()->count(3)->create(['actor_id' => $actor->id]);

        Livewire::test(ActorList::class)
                ->set('search', 'Bruce')
                ->call('searchActors')
                ->assertSet('searched', true)
                ->assertDontSee('No actors found');
    }
}