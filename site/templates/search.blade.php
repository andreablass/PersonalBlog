<x-layout.default>
    <div class="container mx-auto p-6 text-black-600">
        <h1 class="text-2xl font-bold mb-4 text-gray-500">Search Results for "{{ $query }}"</h1>

        @if ($results->isEmpty())
        <p>No results found.</p>
        @else
        <x-prose>
            <ul class="mt-4 space-y-4">
                @foreach ($results as $article)
                <a href="{{ $article->url() }}" class="no-underline flex w-full">
                    <div class="flex-1">
                        <div class="text-2xl font-bold mb-3">
                            {{ $article->title() }}
                        </div>
                        <div class="font-thin font-inter text-gray-600">
                            {{ $article->subtitle() }}
                        </div>
                    </div>
                    <img src="{{ $article->image()->url() }}" alt="{{ $article->title() }}" class="w-32 h-28 object-cover shadow-md ml-6">
                </a>
                <hr class="border-t border-gray-200">
                @endforeach
            </ul>
        </x-prose>
        @endif
    </div>
</x-layout.default>
