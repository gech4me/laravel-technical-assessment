<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class StarWarsService
{
    protected string $baseUrl = 'https://swapi.py4e.com/api';

    public function searchPeople(string $searchTerm): array
    {
        try {
            if (empty($searchTerm)) {
                return ['results' => []];
            }

            $response = Http::withoutVerifying()->get("{$this->baseUrl}/people", [
                'search' => $searchTerm,
            ]);

            if ($response->successful()) {
                return [
                    'results' => $response->json('results') ?? [],
                    'error' => null,
                ];
            }

            return ['results' => [], 'error' => 'Failed to fetch data from Star Wars API.'];
        } catch (\Throwable $e) {
            return ['results' => [], 'error' => 'Error: ' . $e->getMessage()];
        }
    }
}