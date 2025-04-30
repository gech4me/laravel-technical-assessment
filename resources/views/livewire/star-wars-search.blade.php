<div>
    <form wire:submit.prevent="searchPeople">
        <div class="flex gap-2">
            <input
                    type="text"
                    wire:model="search"
                    placeholder="Search for a Star Wars character..."
                    class="w-full p-2 border rounded"
            />
        </div>
    </form>

    @if ($error)
        <p class="text-red-500 mt-2">{{ $error }}</p>
    @elseif ($searched)
        @if (count($results) > 0)
            <ul class="mt-4 space-y-2">
                @foreach ($results as $person)
                    <li class="border-b pb-2">{{ $person['name'] ?? 'Unknown' }}</li>
                @endforeach
            </ul>
        @else
            <p class="mt-2 text-gray-500">No results found.</p>
        @endif
    @endif
</div>