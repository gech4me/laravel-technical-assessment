<div>
    <form wire:submit.prevent="searchActors">
        <div class="flex gap-2 mb-4">
            <input
                    type="text"
                    wire:model="search"
                    placeholder="Search actors..."
                    class="w-full p-2 border rounded"
            />
        </div>
    </form>

    <div wire:loading wire:target="searchActors" class="text-blue-500 mb-4">
        Searching actors...
    </div>

    @if ($error)
        <p class="text-red-500">{{ $error }}</p>
    @elseif ($searched)
        @if (count($actors) > 0)
            <div class="space-y-6">
                @foreach ($actors as $actor)
                    <div class="p-4 border rounded bg-gray-50">
                        <h3 class="text-lg font-semibold">{{ $actor['name'] }}</h3>

                        @if (!empty($actor['movies']))
                            <ul class="list-disc ml-5 mt-2">
                                @foreach ($actor['movies'] as $movie)
                                    <li>{{ $movie['title'] }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500 text-sm">No movies listed.</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">No actors found.</p>
        @endif
    @endif
</div>