<?php

namespace App\Services;

use App\Models\Actor;

class ActorService
{
    public function searchActors(string $searchTerm): array
    {
        if (empty($searchTerm)) {
            Actor::with('movies')
                 ->orderBy('name')
                 ->get()->toArray();
        }

        $actors = Actor::with('movies')
                       ->where('name', 'like', '%' . $searchTerm . '%')
                       ->orderBy('name')
                       ->get();

        return $actors->toArray();
    }
}