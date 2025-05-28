<?php

namespace Tests\Feature\Livewire;

use Livewire\Livewire;
use Tests\TestCase;
use App\Livewire\StarWarsSearch;

class StarWarsSearchTest extends TestCase
{
    public function test_search_people_validation_fails_on_empty_input(): void
    {
        Livewire::test(StarWarsSearch::class)
                ->call('searchPeople')
                ->assertHasErrors(['search' => 'required']);
    }

    public function test_search_people_validation_fails_if_less_than_two_characters(): void
    {
        Livewire::test(StarWarsSearch::class)
                ->set('search', 'A')
                ->call('searchPeople')
                ->assertHasErrors(['search' => 'min']);
    }

    public function test_search_people_success(): void
    {
        Livewire::test(StarWarsSearch::class)
                ->set('search', 'Luke')
                ->call('searchPeople')
                ->assertSet('searched', true)
                ->assertDontSee('Failed to fetch data from Star Wars API');
    }
}