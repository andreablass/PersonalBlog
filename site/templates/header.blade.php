<x-layout.default>
    <div class="container mx-auto p-6 text-black-600">
        <h1 class="text-2xl font-bold mb-4">Search Results for "{{ $query }}"</h1>

        @if ($articles->isEmpty())
            <p>No results found.</p>
        @else
            <ul>
                @foreach ($articles as $article)
                    <li class="mb-4">
                        <a href="{{ $article->url() }}" class="text-blue-500 hover:underline">
                            {{ $article->title() }}
                        </a>
                        <p class="text-black-600">{{ $article->text() }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</x-layout.default>
