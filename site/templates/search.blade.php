<x-layout.default>
    <div class="container mx-auto p-6 text-black-600">
        <h1 class="text-2xl font-bold mb-4 text-gray-500">Search Results for "{{ $query }}"</h1>

        @if ($results->isEmpty())
        <p>No results found.</p>
        @else
        <x-prose>
            <ul class="mt-4 space-y-4">
                @foreach ($results as $article)
                @php
                $highlightedTitle = preg_replace("/($query)/i", '<span class="underline decoration-pink-400 decoration-4">$1</span>', $article->title());
                $highlightedSubtitle = preg_replace("/($query)/i", '<span class="underline decoration-pink-400 decoration-2">$1</span>', $article->subtitle());
                @endphp

                <a href="{{ $article->url() }}" class="no-underline flex w-full">
                    <div class="flex-1">
                        <div class="text-2xl font-bold mb-3">
                            {!! $highlightedTitle !!}
                        </div>
                        <div class="font-thin font-inter text-gray-600">
                            {!! $highlightedSubtitle !!}
                            {{ $article->greatings() }}
                        </div>
                    </div>
                    @empty(!$article->image())
                    <img src="{{ $article->image()->url() }}" alt="{{ $article->title() }}" class="ml-6 h-28 w-32 object-cover shadow-md">
                    @else
                    <span class="ml-6 flex h-28 w-32 items-center justify-center bg-gray-200 text-gray-400 shadow-md" aria-hidden="true">
                        No image
                    </span>
                    @endempty
                </a>
                <hr class="border-t border-gray-200">
                @endforeach
            </ul>
        </x-prose>
        @endif
    </div>
</x-layout.default>
